<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Booking;

return new class extends Migration
{
    public function up(): void
    {
        // Ambil semua booking yang queue_number kosong
        $bookings = Booking::whereNull('queue_number')->orderBy('tanggal')->orderBy('id')->get();

        // Group berdasarkan tanggal dan studio untuk hitung nomor antrian
        $grouped = $bookings->groupBy(function($item){
            return $item->tanggal.'-'.$item->studio;
        });

        foreach ($grouped as $key => $group) {
            $count = 1;
            foreach ($group as $booking) {
                // Ambil kode studio berdasarkan nama
                $studioCode = match($booking->studio) {
                    'Classy'    => 'A',
                    'Lavatory'  => 'B',
                    'Oven'      => 'C',
                    'Spotlight' => 'D',
                    default     => 'X',
                };

                $booking->queue_number = $studioCode . str_pad($count, 3, '0', STR_PAD_LEFT);
                $booking->save();
                $count++;
            }
        }
    }

    public function down(): void
    {
        // Jika rollback, kosongkan kembali queue_number
        \App\Models\Booking::query()->update(['queue_number' => null]);
    }
};
