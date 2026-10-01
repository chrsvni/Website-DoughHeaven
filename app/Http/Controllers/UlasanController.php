<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::latest()->get();
        return view('admin.pages.ulasan.index', compact('ulasans'));
    }

    public function create()
    {
        return view('user.pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $ulasan = Ulasan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'isi' => $request->isi,
            'tampilkan' => false, // Review baru tidak langsung tampil sampai disetujui admin
        ]);

        return redirect()->back()->with('success', 'Ulasan Anda berhasil dikirim dan akan tampil setelah disetujui admin.');
    }

    public function toggleTampilkan($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->tampilkan = !$ulasan->tampilkan;
        $ulasan->save();

        $statusText = $ulasan->tampilkan 
            ? 'berhasil ditampilkan di halaman publik!' 
            : 'berhasil disembunyikan dari halaman publik.';

        return redirect()->route('ulasan.index')->with('success', 'Status ulasan dari ' . $ulasan->nama . ' ' . $statusText);
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
