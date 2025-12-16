<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // ================= ADMIN =================

    public function adminIndex()
    {
        $blogs = Blog::latest()->get();
        return view('admin-kelola-blog', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'instagram_url' => 'required',
            'status' => 'required',
        ]);

        Blog::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'instagram_url' => $request->instagram_url,
            'status' => $request->status,
            'image' => 'default.jpg',
        ]);

        return response()->json(['success' => true]);
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'instagram_url' => $request->instagram_url,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }


    public function destroy($id, Blog $blog)
    {
        Blog::findOrFail($id)->delete();
        try {
        $blog->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }

    // ================= USER =================

    public function userIndex()
    {
        $blogs = Blog::where('status', 'published')->latest()->get();
        return view('blog', compact('blogs'));
    }

    // ================= HELPER =================

    private function detectPlatform($link)
    {
        if (str_contains($link, 'instagram')) return 'Instagram';
        if (str_contains($link, 'tiktok')) return 'TikTok';
        return 'Link';
    }
}

