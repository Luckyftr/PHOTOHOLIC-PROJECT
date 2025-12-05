<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Step 1: tampilkan form email
    public function emailForm() {
        return view('lupaPW'); // nama file Blade kamu
    }

    // Step 1: verifikasi email
    public function verifyEmail(Request $request) {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar']);
        }

        // buat token sementara
        $token = Str::random(64);

        // simpan token di tabel password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        // redirect ke form reset password
        return redirect()->route('lupa.password.reset', ['token' => $token])
                         ->with('email', $user->email);    
    }

    // Step 2: tampilkan form set password baru
    public function resetForm($token) {
        $email = session('email'); // ambil email dari session atau query
        return view('lupaPW2', compact('token', 'email')); // nama file Blade kamu
    }

    // Step 2: update password
    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // cek token
        $reset = DB::table('password_resets')
                   ->where('email', $request->email)
                   ->where('token', $request->token)
                   ->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Token tidak valid atau sudah kadaluarsa']);
        }

        // update password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // hapus token setelah reset
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/lupaPW-berhasil')->with('success', 'Password berhasil diubah, silakan login.');
    }
}
