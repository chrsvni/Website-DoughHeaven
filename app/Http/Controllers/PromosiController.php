<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use App\Models\Produk;
use Illuminate\Http\Request;

class PromosiController extends Controller
{
    public function index()
    {
        $promosis = Promosi::with('produks')->latest()->get();
        return view('admin.pages.promosi.index', compact('promosis'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('admin.pages.promosi.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_promosi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_promosi' => 'required|string|max:100',
            'jatuh_tempo' => 'nullable|date',
            'produk_ids' => 'nullable|array',
        ]);

        $promosi = Promosi::create($request->only(['nama_promosi', 'deskripsi', 'kategori_promosi', 'jatuh_tempo']));

        // Relasi produk
        if ($request->has('produk_ids') && !empty($request->produk_ids)) {
            $promosi->produks()->sync($request->produk_ids);
        }

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $promosi = Promosi::with('produks')->findOrFail($id);
        return view('admin.pages.promosi.show', compact('promosi'));
    }

    public function edit($id)
    {
        $promosi = Promosi::with('produks')->findOrFail($id);
        $produks = Produk::all();
        return view('admin.pages.promosi.edit', compact('promosi', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_promosi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_promosi' => 'required|string|max:100',
            'jatuh_tempo' => 'nullable|date',
            'produk_ids' => 'nullable|array',
        ]);

        $promosi = Promosi::findOrFail($id);
        $promosi->update($request->only(['nama_promosi', 'deskripsi', 'kategori_promosi', 'jatuh_tempo']));

        // Sinkronisasi produk
        if ($request->has('produk_ids') && !empty($request->produk_ids)) {
            $promosi->produks()->sync($request->produk_ids);
        } else {
            $promosi->produks()->detach(); // kosongkan jika tidak dipilih
        }

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $promosi = Promosi::findOrFail($id);
        $promosi->produks()->detach();
        $promosi->delete();

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil dihapus.');
    }
}
