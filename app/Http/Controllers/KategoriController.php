<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.pages.kategori-produk.index', compact('kategoris'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.pages.kategori-produk.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produk,nama_kategori',
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.pages.kategori-produk.edit', compact('kategori'));
    }

    /**
     * Memperbarui kategori di database.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produk,nama_kategori,' . $kategori->id,
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
