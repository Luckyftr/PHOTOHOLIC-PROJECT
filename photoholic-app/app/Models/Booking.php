<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // jangan lupa import User

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'studio',
        'tanggal',
        'sesi',
        'jumlah_sesi',
        'waktu',
        'harga_sesi',
        'subtotal',
        'metode_pembayaran',
        'status',
        'id_transaksi',
        'tanggal_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

