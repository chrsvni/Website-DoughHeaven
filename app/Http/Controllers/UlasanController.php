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

        $ulasan = Ulasan::create($request->only(['nama', 'email', 'subjek', 'isi']));

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim.');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
