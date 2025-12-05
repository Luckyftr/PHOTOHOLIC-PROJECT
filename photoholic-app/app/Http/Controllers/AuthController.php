<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     * Route: GET /masuk
     */
    public function showMasuk()
    {
        return view('/masuk'); 
    }

    /**
     * Memproses login user
     * - Memvalidasi input email dan password
     * - Mengecek kredensial user
     * - Jika sukses, regenerasi session dan redirect ke beranda
     * - Jika gagal, kembali ke form login dengan error
     * Route: POST /masuk
     */
    public function masukAksi(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('beranda'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    /**
     * Logout user
     * - Menghapus session
     * - Menghapus token CSRF
     * - Redirect ke halaman login
     * Route: POST /keluar
     */
    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk');
    }
}
