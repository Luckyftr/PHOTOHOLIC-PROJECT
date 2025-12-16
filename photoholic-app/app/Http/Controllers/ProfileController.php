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
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ HANDLE PHOTO UPLOAD
        if ($request->hasFile('foto_profil')) {

            // delete old photo (except default)
            if ($user->foto_profil && $user->foto_profil !== 'default.png') {
                Storage::disk('public')->delete('profil/' . $user->foto_profil);
            }

            // save new photo
            $filename = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->storeAs('profil', $filename, 'public');

            $user->foto_profil = $filename;
        }

        // update other fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
