<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use App\Models\Blog;

class BerandaController extends Controller
{
    public function index()
    {
        $studios = Studio::orderBy('name')->get();
        $blogs = Blog::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('beranda', compact('studios', 'blogs'));
    }
}
