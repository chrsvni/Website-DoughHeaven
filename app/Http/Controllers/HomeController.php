<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Ulasan;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $favoriteMenus = Produk::where('rekomendasi', '=', 'rekomendasi')->with('kategori')->get();
        // Ambil 2 promosi paling baru yang ada di database
        $latestPromos = Promosi::with('produks')->latest()->take(2)->get();
        // Ambil ulasan nyata pelanggan untuk ditampilkan di homepage
        $ulasans = Ulasan::latest()->take(3)->get();
        // Ambil artikel blog terbaru
        $latestBlogs = Blog::latest('tanggal')->take(3)->get();

        return view('user.pages.home', compact('favoriteMenus', 'latestPromos', 'ulasans', 'latestBlogs'));
    }
}

