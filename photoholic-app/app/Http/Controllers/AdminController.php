<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function index_admin()
    {
        $user = Auth::user(); // Ambil user yang login
        return view('lainya-admin', compact('user')); 
    }

    public function adminKelolaPengguna()
    {
        $users = User::orderBy('name')->get();
        return view('admin-kelola-pengguna', compact('users'));
    }
}
