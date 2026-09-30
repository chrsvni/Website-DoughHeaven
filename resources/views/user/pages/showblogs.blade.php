@extends('user.layouts.app')

@section('title', $halblog->judul . ' | DoughHeaven Blog')
@section('meta_description', $halblog->getExcerpt(160))
@section('meta_keywords', 'blog donat, artikel DoughHeaven, ' . $halblog->judul)

@section('content')
    <!-- Breadcrumb -->
    <section class="pt-24 pb-6" style="background-color: #faeee7;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center text-xs md:text-sm text-gray-500 gap-2">
                <a href="{{ route('home') }}" class="hover:text-pink-600 transition flex items-center gap-1">
                    <i class="fas fa-home text-xs"></i>
                    <span>Home</span>
                </a>
                <span>/</span>
                <a href="{{ route('halblog.index') }}" class="hover:text-pink-600 transition">Blog</a>
                <span>/</span>
                <span class="text-pink-600 font-semibold truncate max-w-[200px] sm:max-w-xs">{{ $halblog->judul }}</span>
            </nav>
        </div>
    </section>

    <!-- Article Header -->
    <section class="pt-8 pb-12" style="background-color: #fffffe;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="mb-8">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="bg-pink-600 text-white text-xs font-bold px-3.5 py-1 rounded-full shadow-sm">
                        {{ $halblog->kategori_label ?? ucwords(str_replace('_', ' ', $halblog->kategori)) }}
                    </span>
                    <span class="text-xs text-gray-500 flex items-center gap-1.5">
                        <i class="far fa-calendar-alt text-pink-500"></i>
                        {{ \Carbon\Carbon::parse($halblog->tanggal)->format('d F Y') }}
                    </span>
                    <span class="text-xs text-gray-500 flex items-center gap-1.5">
                        <i class="far fa-clock text-pink-500"></i>
                        3 menit baca
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-gray-900 mb-6 leading-tight">
                    {{ $halblog->judul }}
                </h1>

                <p class="text-base sm:text-lg text-gray-600 leading-relaxed font-normal border-l-4 border-pink-400 pl-4 py-1" style="background-color: #faeee7;">
                    {{ $halblog->deskripsi }}
                </p>

                <!-- Author info -->
                <div class="flex items-center gap-3.5 mt-6 pt-6 border-t border-gray-100">
                    <div class="w-11 h-11 bg-pink-600 text-white font-bold rounded-full flex items-center justify-center text-sm shadow">
                        DH
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">
                            {{ $halblog->user ? $halblog->user->name : 'Tim DoughHeaven' }}
                        </h4>
                        <p class="text-xs text-gray-400">Pastry Journalist & Bakery Creator</p>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-10 rounded-3xl overflow-hidden shadow-xl aspect-[16/9] border border-pink-100">
                <img src="{{ $halblog->gambar_url }}"
                     alt="{{ $halblog->judul }}"
                     class="w-full h-full object-cover"
                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=1200&q=80';">
            </div>

            <!-- Article Body -->
            <div class="text-gray-800 text-base sm:text-lg leading-relaxed space-y-6">
                {!! nl2br(e($halblog->isi_blog)) !!}
            </div>

            <!-- Share Section -->
            <div class="mt-14 pt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <h4 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                        <i class="fas fa-share-alt text-pink-500"></i>
                        <span>Bagikan artikel manis ini:</span>
                    </h4>
                    <div class="flex items-center gap-2.5">
                        <a href="https://wa.me/?text={{ urlencode($halblog->judul . ' - ' . request()->fullUrl()) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full text-xs font-bold transition shadow-sm">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-xs font-bold transition shadow-sm">
                            <i class="fab fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Menu CTA Callout -->
            <div class="mt-12 p-8 rounded-3xl border border-pink-200/80 shadow-md flex flex-col sm:flex-row items-center justify-between gap-6"
                style="background-color: #faeee7;">
                <div class="text-center sm:text-left">
                    <span class="text-2xl block mb-1">🍩</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Ingin Mencicipi Donat Hangat Kami?</h3>
                    <p class="text-xs sm:text-sm text-gray-600">Pesan langsung dari dapur kami dan nikmati kelembutan donat artisanal hari ini.</p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('menu') }}"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-full text-sm shadow-md transition inline-flex items-center gap-2">
                        <span>Pesan Menu Sekarang</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Back to Blog Link -->
            <div class="mt-10 text-center">
                <a href="{{ route('halblog.index') }}"
                    class="text-xs font-bold text-pink-600 hover:text-pink-800 inline-flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Daftar Artikel</span>
                </a>
            </div>
        </div>
    </section>
@endsection
