@extends('user.layouts.app')

@section('title', 'Blog & Cerita Dapur | DoughHeaven')
@section('meta_description', 'Baca artikel menarik seputar dunia donat artisanal, tips kuliner, panduan resep, dan cerita di balik dapur DoughHeaven Bandung.')
@section('meta_keywords', 'blog donat, tips kuliner, artikel doughheaven, resep donat empuk, cerita bakery bandung')

@section('content')
    <!-- Hero Section -->
    <section class="pt-24 pb-14 relative overflow-hidden" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-pink-600 text-xs md:text-sm font-bold shadow-sm mb-4 border border-pink-200">
                <span>📖</span> DoughHeaven Journal & Stories
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 tracking-tight">
                Kisah Manis & <span class="text-pink-600">Tips Dapur Kami</span>
            </h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Temukan rahasia kelembutan donat, inspirasi pairing kopi & fruit latte, serta berita terbaru langsung dari balik counter DoughHeaven.
            </p>
        </div>

        <div class="absolute -top-20 -left-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
    </section>

    <!-- Blog Categories Navigation (Sticky & Never Cut Off) -->
    <section class="sticky-filter-bar py-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-start md:justify-center overflow-x-auto md:flex-wrap gap-2.5 py-1 no-scrollbar px-1">
                <a href="{{ route('halblog.index') }}"
                    class="px-5 py-2.5 rounded-full text-xs md:text-sm font-bold whitespace-nowrap transition-all duration-300 flex items-center gap-2 shadow-xs flex-shrink-0
                    {{ !request('kategori') ? 'bg-pink-600 text-white shadow-md shadow-pink-500/30 ring-2 ring-pink-600 ring-offset-2' : 'bg-gray-100 text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                    <span>✨</span>
                    <span>Semua Artikel</span>
                </a>

                @foreach ($kategoris as $kategori)
                    <a href="{{ route('halblog.index', ['kategori' => $kategori]) }}"
                        class="px-5 py-2.5 rounded-full text-xs md:text-sm font-bold whitespace-nowrap transition-all duration-300 flex items-center gap-2 shadow-xs flex-shrink-0
                        {{ request('kategori') == $kategori ? 'bg-pink-600 text-white shadow-md shadow-pink-500/30 ring-2 ring-pink-600 ring-offset-2' : 'bg-gray-100 text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                        <span>🍩</span>
                        <span>{{ ucwords(str_replace('_', ' ', $kategori)) }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Post (Shown when no category filter) -->
    @if ($featuredPost && !request('kategori'))
        <section class="py-12" style="background-color: #fffffe;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                            Paling Hangat
                        </span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mt-2">Artikel Unggulan</h2>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-pink-50/70 to-white rounded-3xl overflow-hidden shadow-lg border border-pink-100/80 transition duration-300 hover:shadow-2xl">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Image -->
                        <div class="lg:w-1/2 relative overflow-hidden h-72 lg:h-auto min-h-[320px]">
                            <img src="{{ asset('storage/' . $featuredPost->gambar) }}"
                                alt="{{ $featuredPost->judul }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition duration-700"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=800&q=80';">
                            <span class="absolute top-4 left-4 bg-pink-600 text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-md">
                                {{ $featuredPost->kategori_label ?? ucwords(str_replace('_', ' ', $featuredPost->kategori)) }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="lg:w-1/2 p-8 sm:p-12 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                                    <span><i class="far fa-calendar-alt text-pink-500 mr-1.5"></i> {{ \Carbon\Carbon::parse($featuredPost->tanggal)->format('d F Y') }}</span>
                                    <span>•</span>
                                    <span><i class="far fa-clock text-pink-500 mr-1.5"></i> 3 menit baca</span>
                                </div>

                                <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4 leading-snug hover:text-pink-600 transition">
                                    <a href="{{ route('halblog.detail', $featuredPost->slug) }}">
                                        {{ $featuredPost->judul }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6">
                                    {{ Str::limit(strip_tags($featuredPost->deskripsi), 200) }}
                                </p>
                            </div>

                            <div class="pt-6 border-t border-pink-100 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-pink-600 text-white font-bold flex items-center justify-center text-sm shadow">
                                        DH
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-gray-800 text-xs">Tim DoughHeaven</h5>
                                        <span class="text-[11px] text-gray-400">Bakery Journalist</span>
                                    </div>
                                </div>

                                <a href="{{ route('halblog.detail', $featuredPost->slug) }}"
                                    class="bg-pink-600 hover:bg-pink-700 text-white text-xs md:text-sm font-bold px-6 py-2.5 rounded-full shadow-md hover:shadow-pink-500/30 transition flex items-center gap-2">
                                    <span>Baca Artikel</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Blog Posts Grid -->
    <section class="py-16" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                    @if(request('kategori'))
                        Koleksi Artikel: <span class="text-pink-600">{{ ucwords(str_replace('_', ' ', request('kategori'))) }}</span>
                    @else
                        Semua Artikel & Cerita
                    @endif
                </h2>
                <p class="text-gray-600 text-sm mt-1">Simak ulasan inspiratif dan tips seputar dunia roti & pastry.</p>
            </div>

            @if($halblogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($halblogs as $blog)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1.5 border border-pink-100/70 group">
                            <div>
                                <!-- Image with hover zoom -->
                                <div class="relative overflow-hidden aspect-[16/10] bg-pink-50">
                                    <img src="{{ asset('storage/' . $blog->gambar) }}"
                                        alt="{{ $blog->judul }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
                                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=600&q=80';">
                                    <span class="absolute top-3 left-3 bg-pink-600 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow-md">
                                        {{ $blog->kategori_label ?? ucwords(str_replace('_', ' ', $blog->kategori)) }}
                                    </span>
                                </div>

                                <div class="p-6">
                                    <div class="flex items-center gap-2.5 text-xs text-gray-400 mb-2.5">
                                        <span><i class="far fa-calendar-alt text-pink-500 mr-1"></i> {{ \Carbon\Carbon::parse($blog->tanggal)->format('d F Y') }}</span>
                                        <span>•</span>
                                        <span><i class="far fa-clock text-pink-500 mr-1"></i> 3 mnt baca</span>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900 mb-2.5 line-clamp-2 group-hover:text-pink-600 transition leading-snug">
                                        <a href="{{ route('halblog.detail', $blog->slug) }}">
                                            {{ $blog->judul }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 text-xs md:text-sm line-clamp-3 leading-relaxed">
                                        {{ $blog->deskripsi }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-6 pt-0 border-t border-gray-100 flex items-center justify-between mt-4">
                                <span class="text-xs text-gray-400 font-medium">DoughHeaven Bandung</span>
                                <a href="{{ route('halblog.detail', $blog->slug) }}"
                                    class="text-xs font-bold text-pink-600 hover:text-pink-700 flex items-center gap-1.5 transition">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination if applicable -->
                @if(method_exists($halblogs, 'links'))
                    <div class="mt-12 flex justify-center">
                        {{ $halblogs->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-pink-300 max-w-md mx-auto">
                    <span class="text-4xl block mb-2">📝</span>
                    <h4 class="font-bold text-gray-800 mb-1">Belum Ada Artikel</h4>
                    <p class="text-xs text-gray-500 mb-4">Artikel untuk kategori ini sedang dipersiapkan oleh tim editor kami.</p>
                    <a href="{{ route('halblog.index') }}" class="text-xs font-bold text-pink-600 hover:underline">
                        &larr; Lihat Semua Artikel
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter & Sweet Perks Section -->
    <section class="py-16 bg-gradient-to-r from-pink-600 to-pink-700 text-white relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="text-4xl block mb-3">💌</span>
            <h2 class="text-3xl md:text-4xl font-black mb-3">Tetap Terhubung dengan Dapur Manis Kami</h2>
            <p class="text-pink-100 text-sm md:text-base mb-8 max-w-xl mx-auto leading-relaxed">
                Dapatkan voucher diskon rahasia, pengumuman varian donat baru, dan tips baking langsung ke email Anda setiap minggu.
            </p>
            @if (session('newsletter_success'))
                <div class="max-w-md mx-auto mb-6 p-4 rounded-2xl bg-white text-emerald-800 shadow-xl border-2 border-emerald-400 text-left animate-fade-in flex items-start gap-3">
                    <span class="text-2xl flex-shrink-0">🎉</span>
                    <div>
                        <div class="font-bold text-sm text-emerald-900 mb-0.5">Langganan Berhasil!</div>
                        <p class="text-xs text-emerald-700 leading-relaxed">{{ session('newsletter_success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('newsletter_info'))
                <div class="max-w-md mx-auto mb-6 p-4 rounded-2xl bg-white text-blue-800 shadow-xl border-2 border-blue-300 text-left animate-fade-in flex items-start gap-3">
                    <span class="text-2xl flex-shrink-0">🍩</span>
                    <div>
                        <div class="font-bold text-sm text-blue-900 mb-0.5">Informasi Sahabat Manis</div>
                        <p class="text-xs text-blue-700 leading-relaxed">{{ session('newsletter_info') }}</p>
                    </div>
                </div>
            @endif

            @error('email')
                <div class="max-w-md mx-auto mb-4 p-3 rounded-2xl bg-white/95 text-pink-700 text-xs font-bold text-center shadow-lg">
                    ⚠️ {{ $message }}
                </div>
            @enderror

            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row justify-center max-w-md mx-auto gap-2">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email Anda..." required
                    class="px-5 py-3 rounded-full text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white flex-1 shadow-md">
                <button type="submit" class="bg-gray-900 hover:bg-black text-white text-sm font-bold px-6 py-3 rounded-full transition shadow-md whitespace-nowrap transform hover:scale-105 active:scale-95 duration-200">
                    Langganan Gratis
                </button>
            </form>
            <p class="text-pink-200 text-xs mt-3">Kami menghargai privasi Anda. Tanpa spam, batalkan langganan kapan saja.</p>
        </div>

        <div class="absolute -top-16 -left-16 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -right-16 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
    </section>
@endsection
