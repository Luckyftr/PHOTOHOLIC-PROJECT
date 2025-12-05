<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user
     * - Mengambil data user yang sedang login
     * - Menampilkan view 'profil' dengan data user
     * Route: GET /profil
     */
    public function index() {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    /**
     * Menampilkan halaman edit profil
     * - Mengambil data user yang sedang login
     * - Menampilkan view 'edit-profile' dengan data user
     * Route: GET /edit-profile
     */
    public function edit() {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    /**
     * Memproses update data profil
     * - Validasi input: name, username, email, phone, foto_profil
     * - Jika ada foto baru, hapus foto lama (kecuali default) dan simpan foto baru
     * - Update nama, email, dan nomor telepon
     * - Simpan ke database dan redirect ke halaman profil dengan pesan sukses
     * Route: POST /edit-profile
     */
    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update foto jika ada upload baru
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika bukan default
            if ($user->foto_profil && $user->foto_profil != 'default.png') {
                Storage::delete('public/profil/' . $user->foto_profil);
            }

            $fileName = time().'_'.$request->file('foto_profil')->getClientOriginalName();
            $request->file('foto_profil')->storeAs('public/profil', $fileName);
            $user->foto_profil = $fileName;
        }

        // Update data user lainnya
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        return redirect('/profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
