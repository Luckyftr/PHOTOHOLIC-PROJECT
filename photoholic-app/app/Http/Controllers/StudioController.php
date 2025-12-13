<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use Illuminate\Support\Str;

class StudioController extends Controller
{
    /**
     * Display all studios
     */
    public function AvailableStudio()
    {
        $studios = Studio::orderBy('code')->get();
        return view('studio', compact('studios'));
    }

    /**
     * Show add studio form (admin)
     */
    public function create()
    {
        return view('tambah-studio-admin');
    }

    /**
     * Store new studio (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // AUTO GENERATE CODE (A, B, C...)
        $lastCode = Studio::orderBy('code', 'desc')->value('code');
        $newCode  = $lastCode ? chr(ord($lastCode) + 1) : 'A';

        // UPLOAD IMAGE
        $filename = Str::slug($request->nama)
            . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(
            public_path('asset/Studio-foto'),
            $filename
        );

        // SAVE DATABASE
        Studio::create([
            'code' => $newCode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $filename,
        ]);

        return redirect('/studio-admin')
            ->with('success', 'Studio berhasil ditambahkan');
    }
}
