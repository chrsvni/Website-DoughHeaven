@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Kirim Email Siaran (Broadcast)</h2>
            <p>Kirimkan kabar promosi diskon, pengumuman artikel blog baru, atau pesan manis ke seluruh pelanggan setia DoughHeaven.</p>
        </div>
        <div>
            <a href="{{ route('subscribers.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                <i class="bi bi-arrow-left mr-1"></i> Kembali ke Daftar Pelanggan
            </a>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #ef4444;">
            <i class="bi bi-exclamation-triangle-fill mr-2" style="font-size: 16px;"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Form Siaran (Kolom Utama) -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="card-title font-weight-bold text-dark mb-0" style="font-size: 16px;">
                        <i class="bi bi-send-fill mr-2" style="color: #e75b7a;"></i>
                        Formulir Siaran Email Massal
                    </div>
                    <span class="badge-pill-custom badge-success-soft" style="font-size: 12px;">
                        <i class="bi bi-broadcast mr-1"></i> Penerima: {{ $totalActive }} Pelanggan Aktif
                    </span>
                </div>

                <form action="{{ route('subscribers.send-broadcast') }}" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        <!-- Tipe Siaran -->
                        <div class="form-group mb-3 p-0">
                            <label for="type" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Kategori Siaran <span class="text-danger">*</span>
                            </label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required onchange="handleTypeChange()">
                                <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>✨ Pengumuman Bebas / Pesan Toko</option>
                                <option value="promo" {{ old('type') == 'promo' ? 'selected' : '' }}>🔥 Promosi & Diskon Baru</option>
                                <option value="blog" {{ old('type') == 'blog' ? 'selected' : '' }}>📖 Cerita & Artikel Blog Baru</option>
                            </select>
                            @error('type')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Template Cepat dari Promo / Blog yang ada -->
                        <div id="quickSelectPromo" class="form-group mb-3 p-0" style="display: none;">
                            <label class="font-weight-bold text-dark" style="font-size: 13px;">
                                <i class="bi bi-lightning-charge-fill text-warning mr-1"></i> Pilih dari Promo Toko (Opsional):
                            </label>
                            <select class="form-control" id="promoSelector" onchange="autoFillPromo(this)">
                                <option value="">-- Pilih Promo untuk Mengisi Otomatis --</option>
                                @foreach ($promosis as $pr)
                                    <option value="{{ $pr->nama_promosi }}" 
                                        data-desc="{{ $pr->deskripsi }}"
                                        data-kategori="{{ $pr->kategori_promosi }}"
                                        data-tempo="{{ $pr->jatuh_tempo ? \Carbon\Carbon::parse($pr->jatuh_tempo)->translatedFormat('d F Y') : '' }}"
                                        data-url="{{ route('promos') }}">
                                        🍩 {{ $pr->nama_promosi }} ({{ $pr->kategori_promosi }}){{ $pr->jatuh_tempo ? ' - s/d ' . \Carbon\Carbon::parse($pr->jatuh_tempo)->format('d M Y') : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="quickSelectBlog" class="form-group mb-3 p-0" style="display: none;">
                            <label class="font-weight-bold text-dark" style="font-size: 13px;">
                                <i class="bi bi-lightning-charge-fill text-warning mr-1"></i> Pilih dari Artikel Blog (Opsional):
                            </label>
                            <select class="form-control" id="blogSelector" onchange="autoFillBlog(this)">
                                <option value="">-- Pilih Artikel untuk Mengisi Otomatis --</option>
                                @foreach ($blogs as $bl)
                                    <option value="{{ $bl->judul }}" 
                                        data-desc="{{ $bl->deskripsi ?: Str::limit(strip_tags($bl->isi_blog), 160) }}" 
                                        data-url="{{ route('halblog.detail', $bl->slug) }}">
                                        📖 {{ $bl->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subjek Email -->
                        <div class="form-group mb-3 p-0">
                            <label for="subject" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Judul / Subjek Email <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-envelope-open"></i></span>
                                </div>
                                <input type="text" name="subject" id="subject" 
                                    class="form-control @error('subject') is-invalid @enderror" 
                                    value="{{ old('subject') }}" placeholder="Contoh: 🍩 Promo Spesial Akhir Pekan: Beli 6 Gratis 2!" required>
                            </div>
                            @error('subject')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                            <small class="text-muted d-block mt-1">Judul yang menarik akan membuat pelanggan tertarik membuka email Anda.</small>
                        </div>

                        <!-- Pesan Siaran -->
                        <div class="form-group mb-3 p-0">
                            <label for="message" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Isi Pesan Siaran <span class="text-danger">*</span>
                            </label>
                            <textarea name="message" id="message" rows="6" 
                                class="form-control @error('message') is-invalid @enderror" 
                                placeholder="Tuliskan detail promosi, pengumuman menarik, atau cerita manis donat untuk pelanggan..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Tombol Aksi (Teks) -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="action_text" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Teks Tombol Aksi (CTA)
                                    </label>
                                    <input type="text" name="action_text" id="action_text" 
                                        class="form-control @error('action_text') is-invalid @enderror" 
                                        value="{{ old('action_text', 'Lihat Selengkapnya di Website') }}" placeholder="Contoh: Klaim Promo Sekarang">
                                    @error('action_text')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Aksi (URL Tujuan) -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="action_url" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Tautan / URL Tombol Aksi
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                        </div>
                                        <input type="url" name="action_url" id="action_url" 
                                            class="form-control @error('action_url') is-invalid @enderror" 
                                            value="{{ old('action_url', route('promos')) }}" placeholder="https://...">
                                    </div>
                                    @error('action_url')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action d-flex justify-content-between align-items-center">
                        <a href="{{ route('subscribers.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-dh-primary font-weight-bold" onclick="return confirm('Kirimkan email siaran ini sekarang ke {{ $totalActive }} pelanggan aktif?')">
                            <i class="bi bi-send-fill mr-1.5"></i> Kirim Siaran Email Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Tips Email Marketing -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-3" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="font-weight-bold text-dark mb-3 d-flex align-items-center">
                        <i class="bi bi-lightbulb-fill mr-2" style="color: #e75b7a;"></i>
                        Tips Email Marketing Efektif
                    </h5>

                    <ul class="list-unstyled space-y-3 mb-0" style="font-size: 12.5px; line-height: 1.55; color: #475569;">
                        <li class="mb-2.5 d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success mr-2 mt-0.5"></i>
                            <span><strong>Gunakan Emoji di Judul:</strong> Judul seperti 🍩 atau 🎁 meningkatkan persentase email dibuka pelanggan (*Open Rate*).</span>
                        </li>
                        <li class="mb-2.5 d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success mr-2 mt-0.5"></i>
                            <span><strong>Beri Kejelasan Manfaat:</strong> Cantumkan langsung potongan diskon atau batas waktu promo (misal: "Hanya Akhir Pekan Ini").</span>
                        </li>
                        <li class="mb-2.5 d-flex align-items-start">
                            <i class="bi bi-check-circle-fill text-success mr-2 mt-0.5"></i>
                            <span><strong>Ajakan Tindakan Jelas (CTA):</strong> Arahkan pembaca langsung ke halaman menu donat atau nomor WhatsApp toko.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-shield-check text-primary mr-2 mt-0.5"></i>
                            <span><strong>Anti-Spam & Sopan:</strong> Setiap email yang dikirim sudah otomatis dilengkapi tautan berhenti berlangganan (*unsubscribe*).</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleTypeChange() {
        var type = document.getElementById('type').value;
        var promoBox = document.getElementById('quickSelectPromo');
        var blogBox = document.getElementById('quickSelectBlog');
        var actionUrl = document.getElementById('action_url');
        var actionText = document.getElementById('action_text');

        if (type === 'promo') {
            promoBox.style.display = 'block';
            blogBox.style.display = 'none';
            actionUrl.value = "{{ route('promos') }}";
            actionText.value = "Klaim Promo Donat Sekarang";
        } else if (type === 'blog') {
            promoBox.style.display = 'none';
            blogBox.style.display = 'block';
            actionUrl.value = "{{ route('halblog.index') }}";
            actionText.value = "Baca Artikel Selengkapnya";
        } else {
            promoBox.style.display = 'none';
            blogBox.style.display = 'none';
            actionUrl.value = "{{ route('menu') }}";
            actionText.value = "Lihat Menu Donat Hari Ini";
        }
    }

    function autoFillPromo(select) {
        var option = select.options[select.selectedIndex];
        if (option.value) {
            var kategori = option.getAttribute('data-kategori');
            var desc = option.getAttribute('data-desc');
            var tempo = option.getAttribute('data-tempo');
            
            document.getElementById('subject').value = "🔥 Promo Spesial DoughHeaven: " + option.value + "!";
            
            var msg = "Halo Sahabat Manis DoughHeaven!\n\nAda kabar gembira dan penawaran lezat baru untuk Anda:\n✨ " + option.value;
            if (kategori) {
                msg += " (" + kategori + ")";
            }
            msg += "\n\n";
            
            if (desc) {
                msg += desc + "\n\n";
            }
            
            if (tempo) {
                msg += "⏳ Promo ini berlaku hingga: " + tempo + ".\n\n";
            }
            
            msg += "Yuk segera pesan donat favoritmu di gerai DoughHeaven terdekat atau kunjungi website kami sebelum kehabisan!";
            
            document.getElementById('message').value = msg;
            document.getElementById('action_url').value = option.getAttribute('data-url');
            document.getElementById('action_text').value = "Lihat & Klaim Promo Sekarang";
        }
    }

    function autoFillBlog(select) {
        var option = select.options[select.selectedIndex];
        if (option.value) {
            var desc = option.getAttribute('data-desc');
            document.getElementById('subject').value = "📖 Cerita Baru DoughHeaven: " + option.value;
            
            var msg = "Halo Sahabat Manis DoughHeaven!\n\nKami baru saja membagikan cerita dan inspirasi manis baru dari dapur kami:\n\n\"" + option.value + "\"\n\n";
            if (desc) {
                msg += desc + "\n\n";
            }
            msg += "Yuk baca cerita selengkapnya langsung di website DoughHeaven!";
            
            document.getElementById('message').value = msg;
            document.getElementById('action_url').value = option.getAttribute('data-url');
            document.getElementById('action_text').value = "Baca Cerita Selengkapnya";
        }
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', function() {
        handleTypeChange();
    });
</script>
@endsection
