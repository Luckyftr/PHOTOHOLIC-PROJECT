<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    // Step 1: tampilkan form input email
    public function emailForm()
    {
        return view('ubahPW'); // Blade untuk input email
    }

    // Step 1: verifikasi email
    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Auth::user();

        if ($request->email !== $user->email) {
            return back()->withErrors(['email' => 'Email tidak cocok dengan akun Anda']);
        }

        // redirect ke form set password baru
        return redirect()->route('ubah.password.reset')->with('email', $user->email);
    }

    // Step 2: tampilkan form set password baru
    public function resetForm(Request $request)
    {
        $email = session('email');
        if (!$email) {
            return redirect()->route('ubah.password')
                             ->withErrors(['email' => 'Harap verifikasi email terlebih dahulu']);
        }

        return view('ubahPW2', compact('email'));
    }

    // Step 2: update password
    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Pastikan email sama dengan user login
        if ($request->email !== $user->email) {
            return back()->withErrors(['email' => 'Email tidak cocok dengan akun Anda']);
        }

        // Cek kata sandi lama
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Kata sandi lama salah']);
        }

        // Update password baru
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/ubahPW-berhasil')->with('success', 'Password berhasil diubah');
    }
}
