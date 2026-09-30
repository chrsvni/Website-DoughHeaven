@extends('user.layouts.app')

@section('title', 'Promo & Penawaran Spesial | DoughHeaven')
@section('meta_description', 'Temukan berbagai promosi donat menarik, bundle hemat, dan diskon flash sale eksklusif di DoughHeaven Bandung. Nikmati donat premium dengan harga terbaik!')
@section('meta_keywords', 'promo donat bandung, diskon doughheaven, paket donat hemat, flash sale donat')

@section('content')
    <!-- Hero Banner -->
    <section class="pt-24 pb-12 relative overflow-hidden" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-pink-600 text-xs md:text-sm font-bold shadow-sm mb-4 border border-pink-200">
                <span>🏷️</span> Penawaran Spesial & Diskon Dapur Kami
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-3 tracking-tight">
                Promo Manis <span class="text-pink-600">DoughHeaven</span>
            </h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Manjakan diri dan orang tersayang dengan pilihan donat favorit berkualitas premium. Cek promo aktif hari ini dan pesan langsung sebelum kehabisan!
            </p>
        </div>

        <div class="absolute -top-20 -left-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
    </section>

    <!-- Main Container -->
    <div class="py-10" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Flash Sale Hero Slider (Redesigned & Vue Driven) -->
            @if(isset($featuredPromos) && $featuredPromos->isNotEmpty())
                <section class="mb-16">
                    <div class="relative bg-gradient-to-r from-pink-600 via-rose-600 to-pink-700 text-white rounded-3xl shadow-2xl p-6 sm:p-10 md:p-12 overflow-hidden border border-pink-400/40 min-h-[380px] flex items-center">
                        
                        <!-- Background Accents -->
                        <div class="absolute -right-8 -bottom-10 opacity-10 text-[180px] select-none pointer-events-none">
                            🍩
                        </div>
                        <div class="absolute top-0 right-1/4 w-96 h-96 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute bottom-0 left-10 w-64 h-64 bg-yellow-400/10 rounded-full blur-2xl pointer-events-none"></div>

                        <!-- Top Status Bar Inside Banner -->
                        <div class="absolute top-5 left-6 right-6 flex items-center justify-between z-20">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 bg-yellow-400 text-gray-950 text-xs font-black uppercase px-3.5 py-1 rounded-full shadow-md">
                                    <i class="fas fa-bolt text-xs text-amber-900"></i>
                                    <span>FLASH SALE</span>
                                </span>
                                <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-white text-xs font-semibold border border-white/20">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Penawaran Terbatas</span>
                                </span>
                            </div>

                            @if($featuredPromos->count() > 1)
                                <div class="bg-black/30 backdrop-blur-md text-yellow-300 px-3.5 py-1 rounded-full text-xs font-bold border border-white/15 flex items-center gap-1">
                                    <span>Promo @{{ flashSaleSlide + 1 }}</span>
                                    <span class="text-white/60">/</span>
                                    <span>{{ $featuredPromos->count() }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Slides Content Container -->
                        <div class="w-full pt-10 pb-6 sm:py-6 relative z-10">
                            @foreach($featuredPromos as $index => $fp)
                                <div v-show="flashSaleSlide === {{ $index }}"
                                    class="transition-all duration-500 ease-in-out">
                                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                                        
                                        <!-- Left Column: Copywriting & Action Buttons (7 Cols) -->
                                        <div class="lg:col-span-7 text-left space-y-4">
                                            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight leading-tight text-white drop-shadow-md">
                                                {{ $fp->nama_promosi }}
                                            </h2>

                                            <p class="text-pink-100 text-sm sm:text-base leading-relaxed max-w-xl">
                                                {{ $fp->deskripsi ?: 'Nikmati varian donat favorit pilihan dengan diskon istimewa langsung dari dapur DoughHeaven.' }}
                                            </p>

                                            <!-- Badges: Expiration & Inclusions -->
                                            <div class="flex flex-wrap items-center gap-2.5 pt-1 pb-2">
                                                @if($fp->jatuh_tempo)
                                                    <span class="inline-flex items-center gap-1.5 bg-black/30 backdrop-blur-md text-yellow-300 px-3.5 py-1.5 rounded-full text-xs font-bold border border-yellow-400/30">
                                                        <i class="far fa-clock"></i>
                                                        <span>Berlaku s/d: {{ $fp->jatuh_tempo->translatedFormat('d F Y') }}</span>
                                                    </span>
                                                @endif

                                                @if($fp->produks->isNotEmpty())
                                                    <span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md text-white px-3.5 py-1.5 rounded-full text-xs font-semibold border border-white/20">
                                                        <span>🍩 {{ $fp->produks->count() }} Donat Termasuk</span>
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Action Buttons -->
                                            <div class="flex flex-wrap items-center gap-3 pt-2">
                                                <a href="https://wa.me/6289667817609?text={{ urlencode('Halo DoughHeaven, saya ingin mengklaim promo Flash Sale: ' . $fp->nama_promosi) }}"
                                                    target="_blank"
                                                    class="bg-yellow-400 hover:bg-yellow-300 text-gray-950 font-black px-7 py-3 rounded-full text-xs sm:text-sm shadow-xl hover:shadow-yellow-400/40 transition duration-200 flex items-center gap-2 transform hover:-translate-y-0.5">
                                                    <i class="fab fa-whatsapp text-base text-emerald-700"></i>
                                                    <span>Klaim Promo via WhatsApp</span>
                                                </a>
                                                <a href="{{ route('menu') }}"
                                                    class="bg-white/20 hover:bg-white text-white hover:text-pink-700 font-bold px-6 py-3 rounded-full text-xs sm:text-sm backdrop-blur-md border border-white/40 transition duration-200 flex items-center gap-2 transform hover:-translate-y-0.5">
                                                    <span>Lihat Menu Donat</span>
                                                    <i class="fas fa-arrow-right text-xs"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Right Column: Visual Product Showcase (5 Cols) -->
                                        <div class="lg:col-span-5">
                                            @if($fp->produks->isNotEmpty())
                                                <div class="bg-black/20 backdrop-blur-md border border-white/25 rounded-2xl p-5 shadow-2xl space-y-3">
                                                    <div class="flex items-center justify-between pb-2 border-b border-white/15">
                                                        <span class="text-xs font-extrabold uppercase tracking-wider text-yellow-300 flex items-center gap-1.5">
                                                            <i class="fas fa-cookie-bite"></i> Menu dalam Paket
                                                        </span>
                                                        <span class="text-[11px] text-pink-200 font-semibold">
                                                            {{ $fp->produks->count() }} Varian
                                                        </span>
                                                    </div>

                                                    <div class="space-y-2.5">
                                                        @foreach($fp->produks->take(2) as $prod)
                                                            <div class="flex items-center gap-3 bg-white/10 hover:bg-white/15 transition p-2.5 rounded-xl border border-white/10">
                                                                <img src="{{ asset('storage/' . $prod->gambar) }}" alt="{{ $prod->nama_produk }}"
                                                                    class="w-12 h-12 rounded-lg object-cover shadow-sm flex-shrink-0"
                                                                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=150&q=80';">
                                                                <div class="flex-1 min-w-0">
                                                                    <h4 class="text-xs sm:text-sm font-bold text-white truncate">
                                                                        {{ $prod->nama_produk }}
                                                                    </h4>
                                                                    <span class="text-[11px] text-pink-200 truncate block">
                                                                        {{ $prod->kategori ? $prod->kategori->nama_kategori : 'Donat Artisanal' }}
                                                                    </span>
                                                                </div>
                                                                <span class="text-xs font-black text-yellow-300 whitespace-nowrap">
                                                                    Rp {{ number_format($prod->harga, 0, ',', '.') }}
                                                                </span>
                                                            </div>
                                                        @endforeach

                                                        @if($fp->produks->count() > 2)
                                                            <div class="text-center pt-1 text-xs text-yellow-200 font-bold">
                                                                +{{ $fp->produks->count() - 2 }} varian donat lezat lainnya
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <div class="bg-black/20 backdrop-blur-md border border-white/25 rounded-2xl p-8 text-center shadow-xl">
                                                    <span class="text-6xl block mb-3">🍩</span>
                                                    <h4 class="font-black text-white text-lg mb-1">DoughHeaven Special</h4>
                                                    <p class="text-xs text-pink-100 max-w-xs mx-auto">
                                                        Donat artisanal lembut dengan ragi alami dan balutan cokelat Belgia premium.
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Previous (<) and Next (>) Arrow Buttons -->
                        @if($featuredPromos->count() > 1)
                            <button type="button" @click="prevFlashSale" aria-label="Promo sebelumnya"
                                class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 w-11 h-11 bg-black/30 hover:bg-white text-white hover:text-pink-600 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-md border border-white/30 z-30 shadow-xl cursor-pointer group">
                                <i class="fas fa-chevron-left text-sm transform group-hover:-translate-x-0.5 transition"></i>
                            </button>
                            <button type="button" @click="nextFlashSale" aria-label="Promo berikutnya"
                                class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 w-11 h-11 bg-black/30 hover:bg-white text-white hover:text-pink-600 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-md border border-white/30 z-30 shadow-xl cursor-pointer group">
                                <i class="fas fa-chevron-right text-sm transform group-hover:translate-x-0.5 transition"></i>
                            </button>

                            <!-- Slide Indicator Dots -->
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center items-center gap-2 z-20">
                                @foreach($featuredPromos as $index => $fp)
                                    <button type="button" @click="setFlashSale({{ $index }})" aria-label="Slide {{ $index + 1 }}"
                                        class="h-2 rounded-full transition-all duration-300 focus:outline-none cursor-pointer"
                                        :class="{ 'w-7 bg-yellow-400': flashSaleSlide === {{ $index }}, 'w-2 bg-white/40 hover:bg-white/80': flashSaleSlide !== {{ $index }} }">
                                    </button>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </section>
            @endif

            <!-- 3 Easy Steps to Claim Promo -->
            <section class="mb-16">
                <div class="bg-pink-50/60 rounded-3xl p-8 border border-pink-100">
                    <div class="text-center max-w-xl mx-auto mb-8">
                        <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-white px-3 py-1 rounded-full border border-pink-200">
                            Panduan Praktis
                        </span>
                        <h3 class="text-xl sm:text-2xl font-black text-gray-900 mt-2">Cara Mudah Klaim Promo</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-2xl shadow-xs border border-pink-100 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black text-sm flex-shrink-0">
                                1
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm mb-1">Pilih Promo Pilihanmu</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Cari paket promo atau diskon donat yang sesuai dengan selera Anda hari ini.</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl shadow-xs border border-pink-100 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black text-sm flex-shrink-0">
                                2
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm mb-1">Klik Klaim via WhatsApp</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Format pesan otomatis akan langsung terbuka dan terhubung ke admin kami.</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl shadow-xs border border-pink-100 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black text-sm flex-shrink-0">
                                3
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm mb-1">Donat Segar Siap Dinikmati</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Ambil pesanan di toko atau dikirim kilat ke rumah dengan harga hemat!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- All Active Promos Grid (From Database) -->
            <section class="mb-16">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 pb-4 border-b-2 border-pink-100">
                    <div>
                        <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                            Daftar Lengkap
                        </span>
                        <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Semua Promo Aktif</h2>
                        <p class="text-gray-500 text-sm mt-1">Gunakan penawaran ini saat memesan donat DoughHeaven.</p>
                    </div>
                    <span class="mt-3 sm:mt-0 text-xs font-bold text-pink-600 bg-pink-50 px-4 py-2 rounded-full border border-pink-200 self-start sm:self-auto">
                        {{ $promosis->count() }} Promo Tersedia
                    </span>
                </div>

                @if(isset($promosis) && $promosis->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($promosis as $promosi)
                            @php
                                $badgeStyle = 'bg-pink-100 text-pink-700 border-pink-200';
                                if ($promosi->kategori_promosi == 'Flash Sale') {
                                    $badgeStyle = 'bg-red-100 text-red-700 border-red-200';
                                } elseif ($promosi->kategori_promosi == 'Bundle Deals') {
                                    $badgeStyle = 'bg-emerald-100 text-emerald-700 border-emerald-200';
                                } elseif ($promosi->kategori_promosi == 'Gift Sets') {
                                    $badgeStyle = 'bg-purple-100 text-purple-700 border-purple-200';
                                } elseif ($promosi->kategori_promosi == 'Loyalty Program') {
                                    $badgeStyle = 'bg-blue-100 text-blue-700 border-blue-200';
                                }
                            @endphp

                            <div class="bg-white rounded-3xl shadow-sm hover:shadow-2xl border border-pink-100/80 overflow-hidden flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-2 group"
                                style="background-color: #fffffe;">
                                <div class="p-7">
                                    <!-- Card Header: Category & Deadline -->
                                    <div class="flex items-center justify-between gap-2 mb-4">
                                        <span class="text-xs font-extrabold px-3 py-1 rounded-full border shadow-xs {{ $badgeStyle }}">
                                            {{ $promosi->kategori_promosi }}
                                        </span>
                                        @if($promosi->jatuh_tempo)
                                            <span class="text-[11px] text-gray-500 flex items-center gap-1 font-semibold bg-gray-50 px-2.5 py-1 rounded-md">
                                                <i class="far fa-clock text-pink-500"></i>
                                                s/d {{ $promosi->jatuh_tempo->format('d M Y') }}
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-pink-600 transition leading-snug">
                                        {{ $promosi->nama_promosi }}
                                    </h3>

                                    <p class="text-gray-600 text-xs md:text-sm mb-5 leading-relaxed">
                                        {{ $promosi->deskripsi ?: 'Nikmati penawaran istimewa untuk pembelian menu donat lezat DoughHeaven.' }}
                                    </p>

                                    <!-- Included Products -->
                                    @if($promosi->produks->isNotEmpty())
                                        <div class="pt-4 border-t border-gray-100">
                                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block mb-2">
                                                Varian Donat yang Termasuk:
                                            </span>
                                            <div class="space-y-2">
                                                @foreach($promosi->produks->take(3) as $prod)
                                                    <div class="flex items-center justify-between text-xs bg-pink-50/70 border border-pink-100/70 px-3 py-2 rounded-xl text-gray-800">
                                                        <span class="font-medium truncate flex items-center">
                                                            <span class="mr-2">🍩</span>
                                                            {{ $prod->nama_produk }}
                                                        </span>
                                                        <span class="font-bold text-pink-600 ml-2 whitespace-nowrap">
                                                            Rp {{ number_format($prod->harga, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                                @if($promosi->produks->count() > 3)
                                                    <span class="text-[11px] text-pink-600 font-bold pl-1 block">
                                                        +{{ $promosi->produks->count() - 3 }} varian donat lainnya
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Action Footer -->
                                <div class="p-7 pt-0 mt-auto">
                                    <a href="https://wa.me/6289667817609?text={{ urlencode('Halo DoughHeaven, saya ingin menggunakan promo: ' . $promosi->nama_promosi) }}"
                                        target="_blank"
                                        class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-pink-500/25 transition duration-200 flex items-center justify-center gap-2 text-xs md:text-sm">
                                        <i class="fab fa-whatsapp text-base"></i>
                                        <span>Gunakan Promo Ini</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="max-w-md mx-auto text-center py-16 bg-white rounded-3xl shadow-sm border border-dashed border-pink-300 p-8">
                        <span class="text-4xl block mb-2">🍩</span>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Belum Ada Promo Berjalan</h3>
                        <p class="text-gray-500 text-xs mb-4">
                            Saat ini belum ada promo aktif di database. Nantikan kejutan diskon berikutnya!
                        </p>
                        <a href="{{ route('menu') }}" class="bg-pink-600 text-white text-xs font-bold px-6 py-2.5 rounded-full inline-block shadow">
                            Lihat Menu Reguler
                        </a>
                    </div>
                @endif
            </section>

            <!-- Student & Community Perks Banner -->
            <section class="mb-16">
                <div class="rounded-3xl p-8 sm:p-10 border border-pink-200/80 shadow-md flex flex-col md:flex-row items-center justify-between gap-6"
                    style="background-color: #faeee7;">
                    <div class="text-left max-w-xl">
                        <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-white px-3 py-1 rounded-full border border-pink-200 inline-block mb-3">
                            🎓 Diskon Pelajar & Mahasiswa
                        </span>
                        <h3 class="text-2xl font-black text-gray-900 mb-2">Diskon Spesial 15% Setiap Hari!</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Cukup tunjukkan Kartu Pelajar atau Kartu Mahasiswa (KTM) aktif Anda saat berbelanja di outlet Melong Asih Bandung untuk langsung mendapatkan potongan harga 15%.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('ulasan.create') }}"
                            class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-full text-xs sm:text-sm shadow-md transition inline-flex items-center gap-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kunjungi Outlet Bandung</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Terms & Conditions Accordion -->
            <section class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-pink-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="text-pink-600">📜</span>
                        <span>Syarat & Ketentuan Promosi DoughHeaven</span>
                    </h3>
                    <details class="cursor-pointer group">
                        <summary class="font-semibold text-xs sm:text-sm text-gray-700 hover:text-pink-600 transition list-none flex items-center justify-between py-2 border-b border-gray-100">
                            <span>Ketentuan Umum Penggunaan Promo</span>
                            <span class="text-pink-600 group-open:rotate-180 transition transform duration-200"><i class="fas fa-chevron-down"></i></span>
                        </summary>
                        <ul class="list-disc pl-5 mt-4 space-y-2 text-gray-600 text-xs sm:text-sm leading-relaxed">
                            <li>Semua promosi berlaku untuk pembelian dine-in, takeaway di outlet Jl. Melong Asih Bandung, maupun pemesanan via WhatsApp.</li>
                            <li>Promo tidak dapat digabungkan dengan voucher diskon lain kecuali disebutkan secara khusus.</li>
                            <li>Ketersediaan varian produk promo mengikuti ketersediaan stok donat segar harian di dapur DoughHeaven.</li>
                            <li>DoughHeaven berhak menyesuaikan atau menghentikan periode promo sewaktu-waktu sesuai dengan ketentuan operasional toko.</li>
                        </ul>
                    </details>
                </div>
            </section>
        </div>
    </div>
@endsection
