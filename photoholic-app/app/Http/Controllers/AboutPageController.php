<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutPage;


class AboutPageController extends Controller
{
        public function show()
    {
        $about_pages = AboutPage::first();
        return view('tentang-kami', compact('about_pages'));
    }

    // ADMIN EDIT VIEW
    public function edit()
    {
        $about_pages = AboutPage::first();
        return view('admin-kelola-tentang-kami', compact('about_pages'));
    }

    // ADMIN UPDATE
    public function update(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'subtitle'    => 'required',
            'description' => 'required',
            'vision'      => 'required',
            'mission'     => 'required',
            'contact'     => 'required',
        ]);

        // only one about page row
        $about_pages = AboutPage::first();

        if (!$about_pages) {
            $about_pages = new AboutPage();
        }

        $about_pages->update($request->all());

        return redirect()->back()->with('success', 'Tentang Kami berhasil diperbarui');
    }
}
