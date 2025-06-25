<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HalblogController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');

        // Featured Post - hanya tampil saat tidak ada filter kategori
        $featuredPost = null;
        if (!$kategori) {
            $featuredPost = Blog::orderBy('tanggal', 'desc')->first();
        }

        // Query untuk blog posts
        $query = Blog::query();

        if ($kategori && $kategori != 'all') {
            $query->where('kategori', $kategori);
        } else {
            // Jika tidak ada filter kategori, exclude featured post dari list artikel
            if ($featuredPost) {
                $query->where('id', '!=', $featuredPost->id);
            }
        }

        $halblogs = $query->orderBy('tanggal', 'desc')->get();

        $kategoris = Blog::select('kategori')->distinct()->pluck('kategori');

        return view('user.pages.blogs', compact('halblogs', 'featuredPost', 'kategoris'));
    }

    public function detail($slug)
    {
        $halblog = Blog::where('slug', $slug)->first();

        if (!$halblog) {
            abort(404, 'Blog post not found');
        }

        return view('user.pages.showblogs', compact('halblog'));
    }
}
