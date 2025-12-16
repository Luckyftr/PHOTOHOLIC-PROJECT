<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;


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

}
