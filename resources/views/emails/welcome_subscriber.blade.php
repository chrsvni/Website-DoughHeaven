<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sahabat Manis DoughHeaven!</title>
    <style>
        body { margin: 0; padding: 0; background-color: #faeee7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #334155; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #faeee7; padding-bottom: 40px; }
        .main-card { background-color: #ffffff; max-width: 600px; margin: 30px auto; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(231, 91, 122, 0.12); }
        .header { background: linear-gradient(135deg, #e75b7a 0%, #ff8da1 100%); padding: 36px 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 26px; font-weight: 800; letter-spacing: -0.5px; }
        .content { padding: 35px 30px; }
        .content h2 { color: #1e293b; font-size: 20px; margin-top: 0; }
        .content p { font-size: 14.5px; line-height: 1.65; color: #475569; }
        .voucher-box { background: #fff8f6; border: 2px dashed #f8b4c4; border-radius: 14px; padding: 20px; text-align: center; margin: 25px 0; }
        .voucher-title { font-size: 13px; font-weight: 700; color: #e75b7a; text-transform: uppercase; letter-spacing: 1px; }
        .voucher-code { font-size: 26px; font-weight: 800; color: #e75b7a; letter-spacing: 3px; margin: 8px 0; }
        .voucher-desc { font-size: 12.5px; color: #64748b; margin: 0; }
        .btn-cta { display: inline-block; background: #e75b7a; color: #ffffff !important; text-decoration: none; padding: 13px 30px; border-radius: 50px; font-weight: 700; font-size: 14px; margin: 15px 0 25px; box-shadow: 0 4px 14px rgba(231, 91, 122, 0.3); }
        .footer { text-align: center; font-size: 12px; color: #94a3b8; padding: 0 20px; }
        .footer a { color: #e75b7a; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <!-- Header Banner -->
            <div class="header">
                <div style="font-size: 40px; margin-bottom: 6px;">🍩</div>
                <h1>DoughHeaven Bakery</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #ffe4e9;">Surga Donat Artisanal & Pastry Bandung</p>
            </div>

            <!-- Email Body Content -->
            <div class="content">
                <h2>Hai Sahabat Manis! 👋</h2>
                <p>
                    Terima kasih banyak sudah mendaftarkan emailmu (<strong>{{ $subscriber->email }}</strong>) ke newsletter <strong>DoughHeaven</strong>.
                </p>
                <p>
                    Mulai sekarang, kamu yang pertama kali akan tahu saat kami merilis varian donat baru, diskon flash sale, dan resep manis dari dapur kami setiap pekannya.
                </p>

                <!-- Voucher Box -->
                <div class="voucher-box">
                    <div class="voucher-title">🎁 Hadiah Sambutan Khusus Untukmu</div>
                    <div class="voucher-code">{{ $voucherCode }}</div>
                    <p class="voucher-desc">Gunakan kode ini saat memesan via WhatsApp untuk mendapatkan <strong>Diskon 10%</strong> pada pesanan pertamamu!</p>
                </div>

                <div style="text-align: center;">
                    <a href="{{ route('menu') }}" target="_blank" class="btn-cta">
                        Lihat Menu Donat Favorit &rarr;
                    </a>
                </div>

                <p style="font-size: 13px; color: #64748b; margin-top: 20px;">
                    Punya pertanyaan seputar katering acara atau pesanan custom? Balas saja email ini atau hubungi tim dapur kami di outlet Melong Asih Bandung.
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
                Email ini dikirim karena alamat {{ $subscriber->email }} didaftarkan pada situs DoughHeaven.<br>
                Jika kamu tidak merasa mendaftar atau ingin berhenti menerima kabar manis ini,<br>
                kamu dapat <a href="{{ route('newsletter.unsubscribe', $subscriber->token_unsubscribe ?? 'none') }}">berhenti berlangganan di sini</a> kapan saja.
            </p>
            <p>&copy; {{ date('Y') }} DoughHeaven Bakery. Jl. Melong Asih No. 1, Kota Bandung, Jawa Barat.</p>
        </div>
    </div>
</body>
</html>
