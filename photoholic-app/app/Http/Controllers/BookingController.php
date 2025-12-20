<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Studio;
use App\Models\User;

class BookingController extends Controller
{
    // Halaman form booking
    public function create($code)
    {
        // Ambil studio dari database berdasarkan kode
    $studio = Studio::where('code', $code)->firstOrFail();

    return view('pesan-sekarang', [
        'studioCode' => $studio->code,
        'studioName' => $studio->nama,
        'studioImage' => $studio->gambar,
        'studioDescription' => $studio->deskripsi,
        'studioPrice' => $studio->harga,
    ]);

    }

    // Store booking
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sesi'    => 'required|integer|min:1',
            'waktu'   => 'required',
            'studio' => 'required|exists:studios,code',
        ]);

        $studioCode = $request->studio;
        $studio = Studio::where('code', $request->studio)->firstOrFail();
        $studioName = $studio->nama;


        $jumlah_sesi = $request->sesi;
        $harga_per_sesi = $studio->harga;
        $subtotal = $harga_per_sesi * $jumlah_sesi;

        // Hitung jam selesai
        $jam_mulai = $request->waktu;
        $durasi = $jumlah_sesi * 5; // 5 menit per sesi
        $jam_selesai = date('H:i', strtotime("+{$durasi} minutes", strtotime($jam_mulai)));

        // Cek bentrok slot 5 menit
        $existing = Booking::where('tanggal', $request->tanggal)
                           ->where('studio', $studioName)
                           ->get();

        foreach ($existing as $b) {
            [$mulai, $selesai] = explode(' - ', $b->waktu);
            if (!($jam_selesai <= $mulai || $jam_mulai >= $selesai)) {
                return back()->withErrors([
                    'waktu' => "Slot {$jam_mulai} - {$jam_selesai} sudah dibooking.",
                ])->withInput();
            }
        }

        // Hitung nomor antrian otomatis
        $count = Booking::where('tanggal', $request->tanggal)
                        ->where('studio', $studioName)
                        ->count();

        $queueNumber = $studioCode . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Simpan booking PENDING
        $booking = Booking::create([
            'user_id'        => auth()->id(),
            'studio_id'      => $studio->id,
            'studio'         => $studioName,
            'tanggal'        => $request->tanggal,
            'sesi'           => $jumlah_sesi,
            'jumlah_sesi'    => $jumlah_sesi,
            'waktu'          => $jam_mulai . ' - ' . $jam_selesai,
            'harga_sesi'     => $harga_per_sesi,
            'subtotal'       => $subtotal,
            'queue_number'   => $queueNumber,
            'metode_pembayaran' => 'QRIS',
            'status'         => 'pending',
        ]);

        return redirect()->route('booking.invoice', $booking->id);
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'studio' => 'required|exists:studios,code',
            'sesi' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        $studio = Studio::where('code', $request->studio)->firstOrFail();


        $studioName = $studio->nama;
        $jamMulai = $request->waktu;
        $durasi = $request->sesi * 5; // 5 menit per sesi
        $jamSelesai = date('H:i', strtotime("+{$durasi} minutes", strtotime($jamMulai)));

        // Ambil semua booking studio pada tanggal yang dipilih
        $existing = Booking::where('studio', $studioName)
                        ->where('tanggal', $request->tanggal)
                        ->get();

        $isAvailable = true;
        foreach ($existing as $b) {
            [$mulai, $selesai] = explode(' - ', $b->waktu);
            if (!($jamSelesai <= $mulai || $jamMulai >= $selesai)) {
                $isAvailable = false;
                break;
            }
        }

        // Buat array tanggal untuk slider (hari ini + 6 hari ke depan)
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = now()->addDays($i);
            $dates[] = [
                'day' => $date->locale('id')->isoFormat('dddd'),
                'num' => $date->format('d'),
                'full' => $date->format('Y-m-d'),
            ];
        }

        return view('ketersediaan', [
            'studioName' => $studioName,
            'tanggal' => $request->tanggal,
            'jamMulai' => $jamMulai,
            'jamSelesai' => $jamSelesai,
            'isAvailable' => $isAvailable,
            'dates' => $dates,
            'studioCode' => $request->studio,
            'sesi' => $request->sesi,
        ]);
    }



    // Faktur sementara
    public function invoice($id)
    {
        $booking = Booking::findOrFail($id);
        return view('faktur', compact('booking'));
    }

    // Halaman QRIS
    public function qris($id)
    {
        $booking = Booking::findOrFail($id);
        return view('qris', compact('booking'));
    }

    public function paymentReceipt($id)
    {
        $booking = Booking::with('user')->findOrFail($id);

        $payment = [
            'method' => $booking->metode_pembayaran ?? 'QRIS',
            'transaction_id' => $booking->id_transaksi ?? '-',
            'paid_at' => $booking->tanggal_bayar ?? now(),
        ];

        return view('bayar-berhasil', compact('booking', 'payment'));
    }

    // Konfirmasi admin
    public function confirmPayment($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'lunas',
            'tanggal_bayar' => now(),
        ]);

        return redirect()->route('pembayaran.bukti', ['id' => $booking->id]);
    }

    public function myBookings()
    {
        $bookings = Booking::with('studioRel')
            ->where('user_id', auth()->id())
            ->where('status', 'lunas')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pemesanan', compact('bookings'));
    }

    public function rincian($id)
    {
        $booking = Booking::findOrFail($id);

        return view('rincian-pemesanan', compact('booking'));
    }

    public function adminIndex()
    {
        $bookings = Booking::with(['user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('daftar-pemesanan-admin', compact('bookings'));
    }

    public function adminShow($id)
    {
        $booking = Booking::with(['studioRel', 'user'])->findOrFail($id);

        return view('admin-rincian-pemesanan', compact('booking'));
    }

    public function adminPaymentIndex()
    {
        $bookings = Booking::with('user')
            ->where('status', 'lunas')
            ->orderByDesc('created_at')
            ->get();

        return view('pembayaran-admin', compact('bookings'));
    }


}
