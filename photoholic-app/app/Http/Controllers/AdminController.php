<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;




class AdminController extends Controller
{
    public function index_admin()
    {
        $user = Auth::user(); // Ambil user yang login
        return view('lainya-admin', compact('user')); 
    }

    public function adminKelolaPengguna()
    {
        $users = User::orderBy('name')->get();
        return view('admin-kelola-pengguna', compact('users'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:users,id',
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'role'  => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($request->id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role'  => $request->role,
        ]);

        return response()->json(['success' => true]);
    }

    public function blogStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'instagram_url' => 'required|url',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('blogs', 'public');

        Blog::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'instagram_url' => $request->instagram_url,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Blog berhasil ditambahkan');
    }

    public function destroyUser(User $user)
    {
        try {
            $user->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }

    public function beranda()
    {
        $today = Carbon::today();

        /* =========================
        STAT CARDS
        ========================== */

        // Total booking lunas hari ini
        $totalBookingToday = Booking::whereDate('created_at', today())
            ->where('status', 'lunas')
            ->count();

        // Total pendapatan bulan ini
        $totalPendapatanThisMonth = Booking::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('status', 'lunas')
            ->sum('subtotal');

        // Studio terpopuler hari ini
        $studioTerpopuler = Booking::select('studio', DB::raw('COUNT(*) as total'))
            ->where('status', 'lunas')
            ->groupBy('studio')
            ->orderByDesc('total')
            ->first();

        // Total pengguna
        $totalUsers = User::count();

        /* =========================
        CHART DATA
        ========================== */

        // DAILY (hari ini per jam)
        $dailySalesRaw = Booking::selectRaw("strftime('%H', created_at) as hour, COUNT(*) as total")
            ->whereDate('created_at', $today)
            ->where('status', 'lunas')
            ->groupBy('hour')
            ->pluck('total', 'hour');

        $dailyData = [];
        for ($hour = 11; $hour <= 23; $hour++) {
            $key = str_pad($hour, 2, '0', STR_PAD_LEFT);
            $dailyData[] = $dailySalesRaw[$key] ?? 0;
        }

        // WEEKLY (minggu ini per hari)
        $weeklySalesRaw = Booking::selectRaw("strftime('%w', created_at) as day, COUNT(*) as total")
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])
            ->where('status', 'lunas')
            ->groupBy('day')
            ->pluck('total', 'day');

        $weeklyData = [];
        for ($day = 0; $day <= 6; $day++) {
            $weeklyData[] = $weeklySalesRaw[$day] ?? 0;
        }

        // MONTHLY (bulan ini per tanggal)
        $daysInMonth = Carbon::now()->daysInMonth;

        $monthlySalesRaw = Booking::selectRaw("strftime('%d', created_at) as day, COUNT(*) as total")
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('status', 'lunas')
            ->groupBy('day')
            ->pluck('total', 'day');

        $daysInMonth = now()->daysInMonth;
        $monthlyData = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $key = str_pad($i, 2, '0', STR_PAD_LEFT);
            $monthlyData[] = $monthlySalesRaw[$key] ?? 0;
        }



        /* =========================
        SEND TO VIEW
        ========================== */

        return view('admin-beranda', [
            'totalBookingToday'   => $totalBookingToday,
            'totalPendapatanThisMonth'=> $totalPendapatanThisMonth,
            'studioTerpopuler'    => $studioTerpopuler?->studio ?? '-',
            'totalUsers'          => $totalUsers,

            // Chart
            'dailyData'   => $dailyData,
            'weeklyData'  => $weeklyData,
            'monthlyData' => $monthlyData,
        ]);
    }

}
