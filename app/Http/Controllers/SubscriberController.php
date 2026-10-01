<?php

namespace App\Http\Controllers;

use App\Mail\BroadcastNewsletterMail;
use App\Mail\WelcomeSubscriberMail;
use App\Models\Blog;
use App\Models\Promosi;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    /**
     * Handle user newsletter subscription from public site.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Silakan masukkan alamat email Anda.',
            'email.email' => 'Format email yang dimasukkan tidak valid.',
        ]);

        $email = strtolower(trim($request->email));
        $subscriber = Subscriber::where('email', $email)->first();

        if ($subscriber) {
            if ($subscriber->isActive()) {
                return redirect()->back()->with('newsletter_info', 'Email Anda sudah terdaftar sebagai Sahabat Manis DoughHeaven! Pantau kotak masuk Anda untuk kejutan manis.');
            } else {
                // Aktifkan kembali langganan yang sempat nonaktif
                $subscriber->status = 'aktif';
                if (! $subscriber->token_unsubscribe) {
                    $subscriber->token_unsubscribe = Str::random(32);
                }
                $subscriber->save();
            }
        } else {
            // Pelanggan baru
            $subscriber = Subscriber::create([
                'email' => $email,
                'status' => 'aktif',
                'token_unsubscribe' => Str::random(32),
            ]);
        }

        // Kirim email sambutan manis & voucher diskon
        try {
            Mail::to($subscriber->email)->send(new WelcomeSubscriberMail($subscriber, 'SWEETWELCOME10'));
        } catch (\Throwable $e) {
            Log::error('Error sending welcome email to subscriber: ' . $e->getMessage());
        }

        return redirect()->back()->with('newsletter_success', 'Hore! Anda resmi bergabung di Sahabat Manis DoughHeaven 🍩. Cek email Anda untuk menyambut voucher diskon rahasia!');
    }

    /**
     * Handle user unsubscribe request via email token.
     */
    public function unsubscribe(string $token)
    {
        $subscriber = Subscriber::where('token_unsubscribe', $token)->first();

        if ($subscriber) {
            $subscriber->status = 'nonaktif';
            $subscriber->save();
            $email = $subscriber->email;
        } else {
            $email = 'Anda';
        }

        return view('user.pages.unsubscribed', compact('email'));
    }

    /**
     * Display a listing of subscribers in admin panel.
     */
    public function index(Request $request)
    {
        $query = Subscriber::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where('email', $like, "%{$search}%");
        }

        if ($request->filled('status') && in_array($request->status, ['aktif', 'nonaktif'])) {
            $query->where('status', $request->status);
        }

        $subscribers = $query->latest()->paginate(15)->withQueryString();

        $totalSubscribers = Subscriber::count();
        $totalAktif = Subscriber::where('status', 'aktif')->count();
        $totalNonaktif = Subscriber::where('status', 'nonaktif')->count();

        return view('admin.pages.subscribers.index', compact(
            'subscribers',
            'totalSubscribers',
            'totalAktif',
            'totalNonaktif'
        ));
    }

    /**
     * Show form to compose and send broadcast email to all active subscribers.
     */
    public function broadcastForm()
    {
        $totalActive = Subscriber::active()->count();
        $promosis = Promosi::latest()->take(10)->get();
        $blogs = Blog::latest('tanggal')->take(10)->get();

        return view('admin.pages.subscribers.broadcast', compact('totalActive', 'promosis', 'blogs'));
    }

    /**
     * Process and dispatch broadcast email to all active subscribers.
     */
    public function sendBroadcast(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:promo,blog,general',
            'action_url' => 'nullable|url|max:255',
            'action_text' => 'nullable|string|max:100',
        ], [
            'subject.required' => 'Judul / subjek email siaran wajib diisi.',
            'message.required' => 'Isi pesan siaran wajib diisi.',
            'action_url.url' => 'Format URL tombol aksi harus valid (misal: https://...)',
        ]);

        $activeSubscribers = Subscriber::active()->get();

        if ($activeSubscribers->isEmpty()) {
            return back()->withInput()->with('error', 'Belum ada pelanggan aktif untuk menerima siaran email ini.');
        }

        $sentCount = 0;
        foreach ($activeSubscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(new BroadcastNewsletterMail(
                    $subscriber,
                    $request->subject,
                    $request->message,
                    $request->action_url,
                    $request->action_text,
                    $request->type
                ));
                $sentCount++;
            } catch (\Throwable $e) {
                Log::error("Failed to send broadcast email to {$subscriber->email}: " . $e->getMessage());
            }
        }

        return redirect()->route('subscribers.index')->with('success', "Siaran email berhasil dikirim ke {$sentCount} pelanggan aktif DoughHeaven!");
    }

    /**
     * Toggle active/inactive status of a subscriber in admin panel.
     */
    public function toggleStatus(string $id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->status = ($subscriber->status === 'aktif') ? 'nonaktif' : 'aktif';
        $subscriber->save();

        $pesan = $subscriber->status === 'aktif' ? 'diaktifkan kembali' : 'dinonaktifkan';
        return redirect()->route('subscribers.index')->with('success', "Status langganan {$subscriber->email} berhasil {$pesan}.");
    }

    /**
     * Remove the specified subscriber from storage.
     */
    public function destroy(string $id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $email = $subscriber->email;
        $subscriber->delete();

        return redirect()->route('subscribers.index')->with('success', "Email {$email} berhasil dihapus dari daftar pelanggan.");
    }

    /**
     * Export all subscribers as CSV download.
     */
    public function exportCsv()
    {
        $subscribers = Subscriber::latest()->get();
        $filename = 'pelanggan_doughheaven_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($subscribers) {
            $handle = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));
            
            // Header row
            fputcsv($handle, ['ID', 'Email Pelanggan', 'Status Langganan', 'Tanggal Bergabung']);

            foreach ($subscribers as $s) {
                fputcsv($handle, [
                    $s->id,
                    $s->email,
                    ucfirst($s->status),
                    $s->created_at ? $s->created_at->format('Y-m-d H:i:s') : '-',
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
