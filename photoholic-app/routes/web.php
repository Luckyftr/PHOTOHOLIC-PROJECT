<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminStudioController;



/*
|--------------------------------------------------------------------------
| Public Routes (tidak perlu login)
|--------------------------------------------------------------------------
*/

// Halaman pembuka
Route::get('', function () {
    return view('pembuka');
});
Route::get('/pembuka2', function () {
    return view('pembuka2');
});

// Halaman login
Route::get('/masuk', [AuthController::class, 'showMasuk'])->name('masuk'); // menampilkan form login
Route::post('/masuk', [AuthController::class, 'masukAksi'])->name('masuk.aksi'); // memvalidasi input user

// admin login
/*Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin-beranda', function () {
        return view('admin-beranda');
    })->name('admin.dashboard'); // <- name the route
});*/



Route::get('/admin-beranda', function () {
    return view('admin-beranda');
});

Route::get('/test-session', function () {
    session(['foo' => 'bar']);
    dd(session()->all());
});
//admin pemesanan

Route::get('/daftar-pemesanan-admin', [BookingController::class, 'adminIndex'])->name('admin.bookings');

Route::get('/admin/pemesanan/{id}', [BookingController::class, 'adminShow'])
    ->name('admin.booking.show');


//admin studio
Route::get('/studio-admin', [StudioController::class, 'adminAvailableStudio'])->name('admin.studio');

Route::get(
    '/admin/studio/{id}/edit',
    [StudioController::class, 'edit']
)->name('admin.studio.edit');

Route::patch('/admin/studio/{id}/toggle', 
    [StudioController::class, 'toggleStatus']
)->name('admin.studio.toggle');

Route::get('/studio-admin/{id}/edit', [StudioController::class, 'edit'])
    ->name('admin.studio.edit');

Route::put('/studio-admin/{id}', [StudioController::class, 'update'])
    ->name('admin.studio.update');

Route::get('/admin/studio/tambah', [StudioController::class, 'create'])->name('admin.studio.create');
Route::post('/admin/studio/tambah', [StudioController::class, 'store'])->name('admin.studio.store');

//admin-pembayaran
Route::get('/pembayaran-admin', [BookingController::class, 'adminPaymentIndex']);


//admin profil
Route::get('/lainya-admin', [AdminController::class, 'index_admin']); // tampil profil

//admin kelola pengguna
Route::get('/admin/kelola-pengguna', [AdminController::class, 'adminKelolaPengguna'])
    ->name('admin.users.index');
Route::post('/admin/users/update', [AdminController::class, 'updateUser'])
    ->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])
    ->name('admin.users.destroy');



// Halaman registrasi
Route::get('/daftar', [RegisterController::class, 'showDaftar'])->name('daftar'); // form daftar
Route::post('/daftar', [RegisterController::class, 'daftar'])->name('daftar.aksi'); // simpan data user

Route::get('/daftar-berhasil', function () {
    return view('daftar-berhasil');
});

// Lupa password
Route::get('/lupaPW', function () {
    return view('lupaPW');
});
Route::get('/lupaPW2', function () {
    return view('lupaPW2');
});

// Step 1: Form input email
Route::get('/lupa-password', [ForgotPasswordController::class, 'emailForm'])
    ->name('lupa.password'); 
// Step 1: Proses verifikasi email
Route::post('/lupa-password', [ForgotPasswordController::class, 'verifyEmail'])
    ->name('lupa.password.verify'); 
// Step 2: Form set password baru
Route::get('/lupa-password/reset/{token}', [ForgotPasswordController::class, 'resetForm'])
    ->name('lupa.password.reset'); 
// Step 2: Proses update password
Route::post('/lupa-password/reset', [ForgotPasswordController::class, 'resetPassword'])
    ->name('lupa.password.update'); 

Route::get('/lupaPW-berhasil', function () {
    return view('lupaPW-berhasil');
});

// Ubah password dari profil
Route::get('/ubahPW', function () {
    return view('ubahPW');
});
Route::get('/ubahPW2', function () {
    return view('ubahPW2');
});
Route::get('/ubahPW-berhasil', function () {
    return view('ubahPW-berhasil');
});

// Halaman umum
Route::get('/beranda', function () {
    return view('beranda');
});


/*Route::get('/studio', function () {
    return view('studio');
});*/
//customer studio
Route::get('/studio', [StudioController::class, 'AvailableStudio'])
    ->name('studio.index');

//admin pesan studio
Route::get('/admin-pesan-studio', [AdminStudioController::class, 'AdminAvailableStudio'])
    ->name('admin.studio.index');
Route::get('/admin/booking/create/{studio}', [AdminStudioController::class, 'Admincreate'])
    ->name('admin.booking.create');
Route::post('/admin/booking/store', [AdminStudioController::class, 'adminstore'])
    ->name('admin.booking.store');
Route::get('/admin/booking/{id}/invoice', [AdminStudioController::class, 'admininvoice'])
    ->name('admin.booking.invoice');



// blog user 
Route::get('/blog', [BlogController::class, 'userIndex']);

//blog admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/blog', [BlogController::class, 'adminIndex']);
    Route::post('/admin/blog', [BlogController::class, 'store']);
    Route::put('/admin/blog/{id}', [BlogController::class, 'update']);
    Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy']);
});


Route::get('/pemesanan', [BookingController::class, 'myBookings']); // form booking

/*Route::get('/pemesanan', function () {
    return view('pemesanan');
});*/

Route::get('/ketersediaan', function () {
    return view('ketersediaan');
});
Route::get('/ketersediaan', [BookingController::class, 'checkAvailability'])->name('ketersediaan');

Route::get('/pesan-sekarang', function () {
    return view('pesan-sekarang');
});
Route::get('/bayar-berhasil', function () {
    return view('bayar-berhasil');
});
Route::get('/bayar-gagal', function () {
    return view('bayar-gagal');
});
Route::get('/bukti-bayar', function () {
    return view('bukti-bayar');
});
Route::get('/rincian-pemesanan/{id}', [BookingController::class, 'rincian'])
    ->name('booking.rincian');

    
Route::get('/ganti-akun', function () {
    return view('ganti-akun');
});
Route::get('/faq', function () {
    return view('faq');
});
// Tentang Kami
Route::get('/tentang-kami', [AboutPageController::class, 'show']);

// tentang kami admin
Route::get('/admin/tentang-kami', [AboutPageController::class, 'edit']);
Route::post('/admin/tentang-kami/update', [AboutPageController::class, 'update'])
    ->name('admin.about.update');


// Rating aplikasi
Route::get('/rating-apk', function () {
    return view('rating-apk');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (harus login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar');

    // Profil user
    Route::get('/profil', [ProfileController::class, 'index']); // tampil profil
    Route::get('/edit-profile', [ProfileController::class, 'edit']); // form edit profil
    Route::post('/edit-profile', [ProfileController::class, 'update']); // update data profil

    // Ubah password dari profil
    Route::get('/profil/ubah-password', [ChangePasswordController::class, 'emailForm'])
        ->name('ubah.password');
    Route::post('/profil/ubah-password', [ChangePasswordController::class, 'verifyEmail'])
        ->name('ubah.password.verify');
    Route::get('/profil/ubah-password/reset', [ChangePasswordController::class, 'resetForm'])
        ->name('ubah.password.reset');
    Route::post('/profil/ubah-password/reset', [ChangePasswordController::class, 'resetPassword'])
        ->name('ubah.password.update');

    // Booking studio
    Route::get('/booking/create/{studio}', [BookingController::class, 'create'])->name('booking.create'); // form booking
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store'); // simpan booking
    Route::get('/booking/{id}/invoice', [BookingController::class, 'invoice'])->name('booking.invoice'); // faktur
    Route::get('/payment/qris/{id}', [BookingController::class, 'qris'])->name('payment.qris'); // QRIS
    Route::post('/payment/confirm/{id}', [BookingController::class, 'confirmPayment'])->name('payment.confirm'); // konfirmasi
    Route::get('/bayar-berhasil/{id}', [BookingController::class, 'paymentReceipt'])->name('pembayaran.bukti'); // bukti pembayaran
});
