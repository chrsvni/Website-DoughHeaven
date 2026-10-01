<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subscriber;
use App\Mail\BroadcastNewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->latest()->paginate(10);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    public function create()
    {
        $kategoris = (new Blog)->getKategoriOptions();
        return view('admin.pages.blog.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:whats_new,whats_fun,whats_good',
            'deskripsi' => 'required|string',
            'isi_blog' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'isi_blog' => $request->isi_blog,
        ];

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $fileName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('blog-images', $fileName, 'public');
            $data['gambar'] = $gambarPath;
        }

        $blog = Blog::create($data);

        // Siaran otomatis ke seluruh pelanggan aktif jika dicentang
        $broadcastMsg = '';
        if ($request->boolean('kirim_newsletter')) {
            $activeSubscribers = Subscriber::active()->get();
            $sent = 0;
            foreach ($activeSubscribers as $sub) {
                try {
                    Mail::to($sub->email)->send(new BroadcastNewsletterMail(
                        $sub,
                        '📖 Cerita Baru DoughHeaven: ' . $blog->judul,
                        "Halo Sahabat Manis DoughHeaven!\n\nKami baru saja menerbitkan cerita manis dan inspirasi baru dari dapur kami:\n\n\"" . $blog->judul . "\"\n\n" . ($blog->deskripsi ?: Str::limit(strip_tags($blog->isi_blog), 160)) . "\n\nYuk baca cerita lengkapnya langsung di website kami!",
                        route('halblog.detail', $blog->slug),
                        'Baca Artikel Selengkapnya',
                        'blog'
                    ));
                    $sent++;
                } catch (\Throwable $e) {
                    Log::error("Failed to send blog newsletter to {$sub->email}: " . $e->getMessage());
                }
            }
            if ($sent > 0) {
                $broadcastMsg = " dan email notifikasi berhasil dikirim ke {$sent} pelanggan";
            }
        }

        return redirect()->route('blog.index')->with('success', 'Blog berhasil ditambahkan' . $broadcastMsg . '.');
    }

    public function show($id)
    {
        $blog = Blog::with('user')->findOrFail($id);
        return view('admin.pages.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $kategoris = (new Blog)->getKategoriOptions();
        return view('admin.pages.blog.edit', compact('blog', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|in:whats_new,whats_fun,whats_good',
            'deskripsi' => 'required|string',
            'isi_blog' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'isi_blog' => $request->isi_blog,
        ];

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
                Storage::disk('public')->delete($blog->gambar);
            }

            $gambar = $request->file('gambar');
            $fileName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('blog-images', $fileName, 'public');
            $data['gambar'] = $gambarPath;
        }

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Hapus gambar jika ada
        if ($blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
            Storage::disk('public')->delete($blog->gambar);
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus.');
    }

    // Method untuk upload gambar via AJAX (untuk rich text editor - opsional)
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('blog-content-images', $imageName, 'public');

            return response()->json([
                'uploaded' => true,
                'url' => Storage::url($imagePath)
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'Upload failed']
        ]);
    }
}
