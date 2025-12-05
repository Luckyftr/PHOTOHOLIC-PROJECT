<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran
     * Route: GET /daftar
     */
    public function showDaftar()
    {
        return view('daftar'); // tanpa slash depan
    }

    /**
     * Memproses pendaftaran user baru
     * - Memvalidasi input username, email, phone, password, dan persetujuan terms
     * - Membuat user baru di database dengan password yang sudah di-hash
     * - Redirect ke halaman daftar-berhasil dengan pesan sukses
     * Route: POST /daftar
     */
    public function daftar(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|min:10|max:15',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/daftar-berhasil')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}
