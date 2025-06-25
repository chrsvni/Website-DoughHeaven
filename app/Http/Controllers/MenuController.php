<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        $kategoris = Kategori::all();

        if ($request->has('kategori')) {
            $produks = Produk::where('kategori_id', $request->kategori)->with('kategori')->get();
        } else {
            $produks = Produk::with('kategori')->get();
        }

        return view('user.pages.menu', compact('produks', 'kategoris'));
    }
}
