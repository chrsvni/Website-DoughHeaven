@extends('user.layouts.app')

@section('title', 'Menu Donat & Sweet Delights | DoughHeaven')
@section('meta_description', 'Pilihan lengkap donat artisanal lembut, bomboloni isi lumer, dan pastry manis DoughHeaven Bandung. Pesan mudah via WhatsApp.')
@section('meta_keywords', 'menu donat, bomboloni bandung, harga donat doughheaven, paket donat bandung')

@section('content')
    <!-- Hero Banner -->
    <section class="pt-24 pb-14 relative overflow-hidden" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-pink-600 text-xs md:text-sm font-bold shadow-sm mb-4 border border-pink-200">
                <span>🍩</span> Menu Segar Panggang Tiap Pagi
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 tracking-tight">
                Daftar Menu <span class="text-pink-600">DoughHeaven</span>
            </h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Pilih varian favoritmu dari donat klasik, balutan glaze Belgian chocolate pekat, hingga bomboloni dengan isian krim melimpah.
            </p>
        </div>

        <div class="absolute -top-20 -left-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
    </section>

    <!-- Category Filter Bar (Sticky & Never Cut Off) -->
    <section class="sticky-filter-bar py-3.5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-start md:justify-center overflow-x-auto md:flex-wrap gap-2 sm:gap-2.5 py-1 no-scrollbar px-1">
                <!-- All Items -->
                <a href="{{ route('menu') }}"
                    class="px-5 py-2.5 rounded-full text-xs md:text-sm font-bold whitespace-nowrap transition-all duration-300 flex items-center gap-2 shadow-xs flex-shrink-0
                    {{ !request('kategori') ? 'bg-pink-600 text-white shadow-md shadow-pink-500/30 ring-2 ring-pink-600 ring-offset-2' : 'bg-gray-100 text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                    <span>🍩</span>
                    <span>Semua Menu</span>
                </a>

                <!-- Dynamic Categories -->
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('menu', ['kategori' => $kategori->id]) }}"
                        class="px-5 py-2.5 rounded-full text-xs md:text-sm font-bold whitespace-nowrap transition-all duration-300 flex items-center gap-2 shadow-xs flex-shrink-0
                        {{ request('kategori') == $kategori->id ? 'bg-pink-600 text-white shadow-md shadow-pink-500/30 ring-2 ring-pink-600 ring-offset-2' : 'bg-gray-100 text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                        <span>✨</span>
                        <span>{{ $kategori->nama_kategori }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Menu Items Grid -->
    <section class="py-16" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $activeKategori = request('kategori') ? $kategoris->where('id', request('kategori'))->first() : null;
            @endphp

            @if($activeKategori)
                <!-- Filtered Category View -->
                <div class="mb-12 text-center">
                    <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                        Kategori Terpilih
                    </span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-2">{{ $activeKategori->nama_kategori }}</h2>
                    <p class="text-gray-500 text-sm mt-1 max-w-lg mx-auto">
                        {{ $activeKategori->deskripsi ?: 'Koleksi istimewa dengan cita rasa unik khas dapur DoughHeaven.' }}
                    </p>
                </div>

                @php
                    $kategoriProduks = $produks->where('kategori_id', $activeKategori->id);
                @endphp

                @if($kategoriProduks->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($kategoriProduks as $produk)
                            @include('user.pages.menu-card', ['produk' => $produk])
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-pink-50/50 rounded-3xl border border-dashed border-pink-200 max-w-md mx-auto">
                        <span class="text-4xl block mb-2">🧁</span>
                        <h4 class="font-bold text-gray-800 mb-1">Belum Ada Donat di Kategori Ini</h4>
                        <p class="text-xs text-gray-500 mb-4">Varian baru sedang disiapkan oleh pastry chef kami.</p>
                        <a href="{{ route('menu') }}" class="text-xs font-bold text-pink-600 hover:underline">
                            &larr; Lihat Kategori Lainnya
                        </a>
                    </div>
                @endif

            @else
                <!-- Grouped by Category or Full Grid -->
                @foreach ($kategoris as $kategori)
                    @php
                        $kategoriProduks = $produks->where('kategori_id', $kategori->id);
                    @endphp

                    @if($kategoriProduks->isNotEmpty())
                        <div class="mb-16">
                            <div class="flex items-center justify-between pb-4 mb-8 border-b-2 border-pink-100">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-base">
                                        🍩
                                    </span>
                                    <div>
                                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $kategori->nama_kategori }}</h2>
                                        @if($kategori->deskripsi)
                                            <p class="text-xs md:text-sm text-gray-500">{{ $kategori->deskripsi }}</p>
                                        @endif
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-pink-600 bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                                    {{ $kategoriProduks->count() }} Pilihan
                                </span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach ($kategoriProduks as $produk)
                                    @include('user.pages.menu-card', ['produk' => $produk])
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>

    <!-- Custom Event & Catering Banner -->
    <section class="py-16" style="background-color: #faeee7;">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-pink-200/80 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-left max-w-lg">
                    <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-pink-50 px-3 py-1 rounded-full border border-pink-200 inline-block mb-3">
                        🎉 Custom Order & Catering
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3 leading-snug">
                        Butuh Donat Tower untuk Ulang Tahun & Acara Spesial?
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami melayani pemesanan paket donat box besar, donat tower kustom warna & ucapan, serta catering hampers pernikahan di seluruh area Bandung.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="https://wa.me/6289667817609?text={{ urlencode('Halo DoughHeaven, saya ingin konsultasi pemesanan donat untuk acara / catering custom.') }}"
                        target="_blank"
                        class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-pink-500/30 transition flex items-center gap-3">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Konsultasi via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
