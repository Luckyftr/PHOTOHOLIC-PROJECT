<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // pelanggan yang booking
        $table->string('studio');              // contoh: Classy
        $table->date('tanggal');
        $table->string('sesi');               // contoh: 1 Sesi
        $table->string('waktu');              // contoh: 15:00 - 15:05 WIB
        $table->integer('harga_sesi');
        $table->integer('jumlah_sesi');
        $table->integer('subtotal');
        $table->string('metode_pembayaran')->nullable();
        $table->string('status')->default('pending'); // pending / lunas
        $table->string('id_transaksi')->nullable();
        $table->date('tanggal_bayar')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
