<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\User;

class AdminStudioController extends Controller{

    public function AdminAvailableStudio()
    {
        $studios = Studio::orderBy('code')->get();
        return view('admin-pesan-studio', compact('studios'));
    }

    public function Admincreate($code)
    {
        // Ambil studio dari database berdasarkan kode
    $studios = Studio::where('code', $code)->firstOrFail();

    return view('admin-pesan-sekarang', [
        'studioCode' => $studios->code,
        'studioName' => $studios->nama,
        'studioImage' => $studios->gambar,
        'studioDescription' => $studios->deskripsi,
        'studioPrice' => $studios->harga,
    ]);

    }

      public function admininvoice($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin-faktur', compact('booking'));
    }

    public function adminqris($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin-qris', compact('booking'));
    }

      public function adminpaymentReceipt($id)
        {
            $booking = Booking::with('user')->findOrFail($id);

            $payment = [
                'method' => $booking->metode_pembayaran ?? 'QRIS',
                'transaction_id' => $booking->id_transaksi ?? '-',
                'paid_at' => $booking->tanggal_bayar ?? now(),
            ];

            return view('admin-bayar-berhasil', compact('booking', 'payment'));
        }

        public function adminstore(Request $request)
        {
            $request->validate([
                'tanggal' => 'required|date',
                'sesi'    => 'required|integer|min:1',
                'waktu'   => 'required',
                'studio'  => 'required|exists:studios,code',
                'metode_pembayaran' => 'required|in:TUNAI,QRIS',
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

            $isTunai = $request->metode_pembayaran === 'TUNAI';

            $status = $isTunai ? 'lunas' : 'pending';
            $tanggalBayar = $isTunai ? now() : null;

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
                'metode_pembayaran' => $request->metode_pembayaran,
                'status'         => $status,
                'tanggal_bayar'  => $tanggalBayar,
            ]);


            if ($booking->metode_pembayaran === 'QRIS') {
                return redirect()->route('admin.booking.invoice', $booking->id);
            }

            return redirect()->route('pembayaran.bukti', $booking->id);
        }


}