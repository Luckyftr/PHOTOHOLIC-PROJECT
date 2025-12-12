<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index_admin()
    {
        $user = Auth::user(); // Ambil user yang login
        return view('lainya-admin', compact('user')); 
    }
}
