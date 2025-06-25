<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $favoriteMenus = Produk::where('rekomendasi', 'rekomendasi')->get();
        return view('user.pages.home', compact('favoriteMenus'));
    }
}

