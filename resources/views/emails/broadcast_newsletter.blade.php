<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectTitle }}</title>
    <style>
        body { margin: 0; padding: 0; background-color: #faeee7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #334155; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #faeee7; padding-bottom: 40px; }
        .main-card { background-color: #ffffff; max-width: 600px; margin: 30px auto; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(231, 91, 122, 0.12); }
        .header { background: linear-gradient(135deg, #e75b7a 0%, #ff8da1 100%); padding: 32px 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
        .badge { display: inline-block; padding: 4px 14px; border-radius: 50px; font-size: 11.5px; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; background: rgba(255,255,255,0.25); color: #ffffff; letter-spacing: 0.5px; }
        .content { padding: 35px 30px; }
        .content h2 { color: #1e293b; font-size: 21px; margin-top: 0; line-height: 1.4; }
        .content p { font-size: 14.5px; line-height: 1.7; color: #475569; }
        .highlight-box { background: #fff8f6; border-left: 4px solid #e75b7a; border-radius: 0 12px 12px 0; padding: 18px 20px; margin: 20px 0; font-size: 14px; color: #334155; }
        .btn-cta { display: inline-block; background: #e75b7a; color: #ffffff !important; text-decoration: none; padding: 13px 32px; border-radius: 50px; font-weight: 700; font-size: 14px; margin: 20px 0; box-shadow: 0 4px 14px rgba(231, 91, 122, 0.3); }
        .footer { text-align: center; font-size: 12px; color: #94a3b8; padding: 0 20px; }
        .footer a { color: #e75b7a; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <!-- Header Banner -->
            <div class="header">
                @if ($type === 'promo')
                    <div class="badge">🔥 Kabar Promo Spesial</div>
                @elseif ($type === 'blog')
                    <div class="badge">📖 Cerita & Resep Dapur</div>
                @else
                    <div class="badge">✨ Pengumuman Manis</div>
                @endif
                <div style="font-size: 36px; margin-bottom: 4px;">🍩</div>
                <h1>DoughHeaven Bakery</h1>
                <p style="margin: 4px 0 0; font-size: 13.5px; color: #ffe4e9;">Kabar Terbaru Dari Dapur Manis Kami</p>
            </div>

            <!-- Email Body Content -->
            <div class="content">
                <h2>{{ $subjectTitle }}</h2>
                
                <div class="highlight-box">
                    {!! nl2br(e($messageContent)) !!}
                </div>

                @if ($actionUrl)
                    <div style="text-align: center;">
                        <a href="{{ $actionUrl }}" target="_blank" class="btn-cta">
                            {{ $actionText }} &rarr;
                        </a>
                    </div>
                @endif

                <p style="font-size: 13.5px; color: #64748b; margin-top: 25px;">
                    Nikmati sajian donat segar buatan tangan kami hari ini di outlet Melong Asih atau pesan langsung untuk diantar ke rumahmu!
                </p>

                <p style="margin-bottom: 0;">
                    Salam manis hangat,<br>
                    <strong>Tim Dapur DoughHeaven 💖</strong>
                </p>
            </div>
        </div>

        <!-- Footer Unsubscribe -->
        <div class="footer">
            <p>
                Email ini dikirimkan ke <strong>{{ $subscriber->email }}</strong> sebagai pelanggan newsletter DoughHeaven.<br>
                Ingin berhenti menerima update? <a href="{{ route('newsletter.unsubscribe', $subscriber->token_unsubscribe ?? 'none') }}">Berhenti berlangganan di sini</a>.
            </p>
            <p>&copy; {{ date('Y') }} DoughHeaven Bakery Bandung &bull; Fresh Daily Artisanal Donuts</p>
        </div>
    </div>
</body>
</html>
