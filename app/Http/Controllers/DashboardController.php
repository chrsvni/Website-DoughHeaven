<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count();
        $jumlahPromosi = Promosi::count();
        $jumlahBlog = Blog::count();
        $jumlahUlasan = Ulasan::count();

        return view('admin.pages.dashboard', compact('jumlahProduk', 'jumlahPromosi', 'jumlahBlog', 'jumlahUlasan'));
    }
}
