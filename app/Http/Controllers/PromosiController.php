<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use App\Models\Produk;
use App\Models\Subscriber;
use App\Mail\BroadcastNewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
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

        // Siaran otomatis ke seluruh pelanggan aktif jika dicentang
        $broadcastMsg = '';
        if ($request->boolean('kirim_newsletter')) {
            $activeSubscribers = Subscriber::active()->get();
            $sent = 0;
            foreach ($activeSubscribers as $sub) {
                try {
                    Mail::to($sub->email)->send(new BroadcastNewsletterMail(
                        $sub,
                        '🔥 Promo Baru: ' . $promosi->nama_promosi . '!',
                        "Halo Sahabat Manis DoughHeaven!\n\nAda promo manis baru di DoughHeaven: " . $promosi->nama_promosi . " (" . $promosi->kategori_promosi . ").\n\n" . ($promosi->deskripsi ?: 'Segera pesan donat favoritmu sebelum promo berakhir!') . ($promosi->jatuh_tempo ? "\n\nBerlaku hingga: " . \Carbon\Carbon::parse($promosi->jatuh_tempo)->format('d M Y') : ''),
                        route('promos'),
                        'Lihat Promo di Website',
                        'promo'
                    ));
                    $sent++;
                } catch (\Throwable $e) {
                    Log::error("Failed to send promo newsletter to {$sub->email}: " . $e->getMessage());
                }
            }
            if ($sent > 0) {
                $broadcastMsg = " dan email notifikasi berhasil dikirim ke {$sent} pelanggan";
            }
        }

        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil ditambahkan' . $broadcastMsg . '.');
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

    /**
     * Halaman promosi publik untuk pengunjung/user
     */
    public function publicPromos()
    {
        $promosis = Promosi::with('produks')->latest()->get();

        // Ambil semua promo yang memiliki kategori Flash Sale (case-insensitive & trimmed)
        $featuredPromos = $promosis->filter(function ($item) {
            return strtolower(trim($item->kategori_promosi)) === 'flash sale';
        })->values();

        // Jika tidak ada promo Flash Sale sama sekali, ambil 3 promo terbaru sebagai fallback
        if ($featuredPromos->isEmpty() && $promosis->isNotEmpty()) {
            $featuredPromos = $promosis->take(3)->values();
        }

        return view('user.pages.promos', compact('promosis', 'featuredPromos'));
    }
}
