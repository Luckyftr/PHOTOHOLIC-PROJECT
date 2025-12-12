<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Halaman form booking
    public function create()
    {
        return view('pesan-sekarang');
    }

    // Store booking
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sesi'    => 'required|integer|min:1',
            'waktu'   => 'required',
            'studio'  => 'required|in:A,B,C,D',
        ]);

        $studioCode = $request->studio;
        $studioName = match($studioCode) {
            'A' => 'Classy',
            'B' => 'Lavatory',
            'C' => 'Oven',
            'D' => 'Spotlight',
        };

        $jumlah_sesi = $request->sesi;
        $harga_per_sesi = 45000;
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
}
