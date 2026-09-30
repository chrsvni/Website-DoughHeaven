@extends('user.layouts.app')

@section('title', 'Home | DoughHeaven - Heavenly Donuts & Sweet Delights')
@section('meta_description', 'Nikmati donat artisanal terbaik di Bandung dari DoughHeaven. Dibuat hangat dan segar setiap hari dengan bahan premium pilihan.')
@section('meta_keywords', 'donat bandung, doughheaven, donat artisanal, dessert enak bandung, bakery bandung')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="pt-16 relative">
        <div class="relative h-screen min-h-[580px] max-h-[820px] overflow-hidden">
            <!-- Background Slideshow -->
            <div class="w-full h-full">
                <div v-for="(slide, index) in heroSlides" :key="slide.id" v-show="currentSlide === index"
                    class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
                    :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }">

                    <!-- IMAGE -->
                    <template v-if="slide.type === 'image'">
                        <img :src="slide.src" :alt="slide.alt" class="w-full h-full object-cover scale-105 transform animate-pulse duration-[8000ms]" />
                    </template>

                    <!-- VIDEO -->
                    <template v-else-if="slide.type === 'video'">
                        <video :src="slide.src" class="w-full h-full object-cover" autoplay muted loop playsinline></video>
                    </template>

                    <!-- Dark Gradient Overlay for optimal legibility -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/55 to-black/40"></div>
                </div>
            </div>

            <!-- Slide Navigation Buttons -->
            <button @click="prevSlide" aria-label="Slide Sebelumnya"
                class="absolute left-4 md:left-8 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-pink-600 text-white backdrop-blur-md rounded-full flex items-center justify-center transition-all duration-300 focus:outline-none z-20 shadow-lg border border-white/20 group">
                <i class="fas fa-chevron-left text-lg transform group-hover:-translate-x-0.5 transition"></i>
            </button>
            <button @click="nextSlide" aria-label="Slide Berikutnya"
                class="absolute right-4 md:right-8 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-pink-600 text-white backdrop-blur-md rounded-full flex items-center justify-center transition-all duration-300 focus:outline-none z-20 shadow-lg border border-white/20 group">
                <i class="fas fa-chevron-right text-lg transform group-hover:translate-x-0.5 transition"></i>
            </button>

            <!-- Slide Indicator Dots -->
            <div class="absolute bottom-16 md:bottom-20 left-0 right-0 flex justify-center space-x-2.5 z-20">
                <button v-for="(slide, index) in heroSlides" :key="'dot-' + slide.id" @click="currentSlide = index"
                    class="h-2.5 rounded-full transition-all duration-500 focus:outline-none"
                    :class="{ 'w-8 bg-pink-500': currentSlide === index, 'w-2.5 bg-white/60 hover:bg-white': currentSlide !== index }">
                </button>
            </div>

            <!-- Text Overlay & CTA -->
            <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
                <div class="text-center max-w-3xl mx-auto">
                    <!-- Top Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/15 backdrop-blur-md border border-white/30 text-white text-xs md:text-sm font-medium mb-6 shadow-sm animate-bounce">
                        <span class="text-yellow-300">✨</span>
                        <span>100% Handcrafted Artisanal Donuts in Bandung</span>
                        <span class="text-pink-300 font-bold">• Fresh Daily</span>
                    </div>

                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight drop-shadow-md">
                        Where Every Bite Feels Like <span class="text-pink-400 underline decoration-pink-500 underline-offset-8">Heaven</span>
                    </h1>

                    <p class="text-base md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto leading-relaxed drop-shadow">
                        Nikmati kelembutan donat bertekstur awan dengan fermentasi alami 18 jam, diselimuti cokelat Belgia murni dan glaze buah asli.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('menu') }}"
                            class="w-full sm:w-auto bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-pink-500/40 transform hover:-translate-y-0.5 transition duration-300 flex items-center justify-center gap-2">
                            <span>Jelajahi Menu Donat</span>
                            <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                        <a href="{{ route('promos') }}"
                            class="w-full sm:w-auto bg-white/20 hover:bg-white text-white hover:text-pink-600 font-bold px-8 py-4 rounded-full backdrop-blur-md border border-white/40 shadow-lg transform hover:-translate-y-0.5 transition duration-300 flex items-center justify-center gap-2">
                            <span>Lihat Promo Spesial</span>
                            <span class="text-xs bg-pink-500 text-white px-2 py-0.5 rounded-full">Hemat!</span>
                        </a>
                    </div>

                    <!-- Customer Rating Pill -->
                    <div class="mt-8 inline-flex items-center gap-3 bg-black/40 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10 text-xs md:text-sm text-gray-200">
                        <div class="flex text-yellow-400 text-xs">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="font-bold text-white">4.9 / 5.0</span>
                        <span class="text-gray-400">|</span>
                        <span>Dicintai 1.500+ Pelanggan Bandung</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Quick Badges Strip -->
        <div class="max-w-6xl mx-auto px-4 -mt-8 relative z-30">
            <div class="bg-white rounded-2xl shadow-xl p-5 md:p-6 grid grid-cols-2 md:grid-cols-4 gap-4 border border-pink-100">
                <div class="flex items-center gap-3.5 p-2">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center text-pink-600 text-xl flex-shrink-0">
                        <i class="fas fa-bread-slice"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">Fresh from Oven</h4>
                        <p class="text-xs text-gray-500">Matang segar setiap pagi</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5 p-2">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center text-pink-600 text-xl flex-shrink-0">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">100% Halal & Alami</h4>
                        <p class="text-xs text-gray-500">Bahan mutu premium</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5 p-2">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center text-pink-600 text-xl flex-shrink-0">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">Tanpa Pengawet</h4>
                        <p class="text-xs text-gray-500">Aman untuk keluarga</p>
                    </div>
                </div>

                <div class="flex items-center gap-3.5 p-2">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center text-pink-600 text-xl flex-shrink-0">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">Instant Delivery</h4>
                        <p class="text-xs text-gray-500">Kirim cepat se-Bandung</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why DoughHeaven (4 Pillars) -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200/60">
                    Keistimewaan Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 mb-4">
                    Mengapa Memilih DoughHeaven?
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Kami memadukan teknik artisan pastry Eropa dengan cita rasa yang akrab di lidah, menghasilkan donat yang tak tertandingi kelezatannya.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gradient-to-b from-pink-50/50 to-white p-8 rounded-2xl border border-pink-100/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1.5 text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-pink-600 group-hover:text-white transition duration-300 shadow-md shadow-pink-100">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">18 Jam Slow Fermentation</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Adonan didiamkan dalam suhu terkontrol selama 18 jam agar ragi bekerja optimal, menciptakan rongga udara halus yang lembut seperti spons.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-b from-pink-50/50 to-white p-8 rounded-2xl border border-pink-100/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1.5 text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-pink-600 group-hover:text-white transition duration-300 shadow-md shadow-pink-100">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Belgian Chocolate & Puree Alami</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami hanya menggunakan cokelat murni couverture Belgia dan sari buah stroberi asli tanpa tambahan sirup perisa buatan.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-b from-pink-50/50 to-white p-8 rounded-2xl border border-pink-100/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1.5 text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-pink-600 group-hover:text-white transition duration-300 shadow-md shadow-pink-100">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Kemasan Cantik & Aman</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Setiap donat dikemas dalam box estetik bertema pastel yang kokoh, siap menjadi hantaran istimewa untuk orang terkasih.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommended Menu Section -->
    <section class="py-20" style="background-color: #faeee7">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-white px-3 py-1 rounded-full border border-pink-200">
                        Pilihan Terfavorit
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">
                        Menu Rekomendasi Chef
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base mt-2 max-w-xl">
                        Varian yang paling banyak dipesan dan memenangkan hati pelanggan setia DoughHeaven setiap hari.
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('menu') }}"
                        class="inline-flex items-center gap-2 text-sm font-bold text-pink-600 hover:text-pink-700 bg-white px-5 py-2.5 rounded-full shadow-sm hover:shadow transition">
                        <span>Lihat Semua Menu ({{ \App\Models\Produk::count() }})</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($favoriteMenus as $menu)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between border border-pink-100/60 group">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Product Image -->
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_produk }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=600&q=80';">
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                                <span class="bg-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                    <i class="fas fa-star text-[10px] text-yellow-300"></i> Rekomendasi
                                </span>
                            </div>

                            @if($menu->kategori)
                                <span class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-gray-700 text-xs font-semibold px-2.5 py-1 rounded-md shadow-sm">
                                    {{ $menu->kategori->nama_kategori }}
                                </span>
                            @endif
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-pink-600 transition">
                                    {{ $menu->nama_produk }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                                    {{ $menu->deskripsi }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-gray-100">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-xs text-gray-400 block font-medium">Harga Satuan</span>
                                        <span class="text-2xl font-black text-pink-600">
                                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-block text-xs bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded">
                                            Tersedia Hari Ini
                                        </span>
                                    </div>
                                </div>

                                <a href="https://wa.me/6289667817609?text={{ urlencode('Halo DoughHeaven, saya ingin memesan menu ' . $menu->nama_produk . ' (Rp ' . number_format($menu->harga, 0, ',', '.') . ')') }}"
                                    target="_blank"
                                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-4 rounded-xl shadow-md hover:shadow-pink-500/25 transition duration-200 flex items-center justify-center gap-2 text-sm">
                                    <i class="fab fa-whatsapp text-base"></i>
                                    <span>Pesan via WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 bg-white rounded-2xl border border-dashed border-pink-300">
                        <span class="text-4xl">🍩</span>
                        <p class="text-gray-500 mt-2 font-medium">Belum ada donat yang ditandai rekomendasi di admin panel.</p>
                        <a href="{{ route('menu') }}" class="text-pink-600 text-sm font-bold mt-2 inline-block">Lihat Semua Menu &rarr;</a>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('menu') }}"
                    class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold px-8 py-3.5 rounded-full shadow-lg hover:shadow-pink-500/30 transition duration-300 inline-flex items-center gap-2">
                    <span>Lihat Daftar Menu Selengkapnya</span>
                    <i class="fas fa-utensils text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Our Sweet Story Teaser -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <!-- Image with Floating Badge -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="DoughHeaven Story" class="rounded-3xl shadow-2xl object-cover w-full h-[420px]">
                        
                        <!-- Floating Stamp -->
                        <div class="absolute -bottom-6 -right-4 sm:right-6 bg-white p-4 rounded-2xl shadow-xl border border-pink-100 flex items-center gap-3">
                            <div class="w-12 h-12 bg-pink-600 text-white rounded-xl flex items-center justify-center text-xl font-black">
                                4+
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm leading-tight">Tahun Manis</h4>
                                <p class="text-xs text-gray-500">Menebar Bahagia di Bandung</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="w-full lg:w-1/2">
                    <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                        Cerita & Filosofi
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 mb-6 leading-snug">
                        Dibuat dengan Cinta, <br class="hidden sm:inline">Disajikan untuk Senyuman Anda.
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                        Berawal dari dapur rumahan di Kota Bandung pada tahun 2020, DoughHeaven lahir dengan satu komitmen sederhana: membuktikan bahwa donat berkualitas restoran bintang lima bisa dinikmati dengan hangat dan terjangkau oleh siapa saja.
                    </p>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-8">
                        Kami tidak pernah berkompromi dalam pemilihan bahan. Mulai dari ragi alami terbaik hingga lelehan cokelat murni tanpa minyak jenuh tambahan.
                    </p>

                    <!-- Stats Row -->
                    <div class="grid grid-cols-3 gap-4 mb-8 py-4 border-y border-pink-100">
                        <div>
                            <span class="text-2xl md:text-3xl font-extrabold text-pink-600 block">30+</span>
                            <span class="text-xs text-gray-500 font-medium">Varian Donat</span>
                        </div>
                        <div>
                            <span class="text-2xl md:text-3xl font-extrabold text-pink-600 block">18 Jam</span>
                            <span class="text-xs text-gray-500 font-medium">Slow Fermentasi</span>
                        </div>
                        <div>
                            <span class="text-2xl md:text-3xl font-extrabold text-pink-600 block">100%</span>
                            <span class="text-xs text-gray-500 font-medium">Bahan Alami</span>
                        </div>
                    </div>

                    <a href="{{ url('/story') }}"
                        class="inline-flex items-center gap-2 bg-pink-600 hover:bg-pink-700 text-white font-bold px-7 py-3 rounded-full shadow-md hover:shadow-pink-500/25 transition">
                        <span>Baca Kisah Selengkapnya</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section (Dynamic from Database) -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                    Penawaran Terbatas
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Promo & Diskon Spesial
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-3"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Nikmati sajian donat terfavorit dengan harga lebih hemat melalui penawaran aktif di bawah ini.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($latestPromos as $promo)
                    <div class="rounded-2xl shadow-md p-6 sm:p-8 transform hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between border border-pink-200/80 relative overflow-hidden group"
                        style="background-color: #faeee7;">
                        
                        <!-- Watermark Icon -->
                        <div class="absolute -right-4 -bottom-4 text-pink-200/40 text-8xl pointer-events-none group-hover:scale-110 transition duration-500">
                            🍩
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="text-xs font-extrabold px-3.5 py-1.5 rounded-full bg-pink-600 text-white shadow-sm">
                                    {{ $promo->kategori_promosi }}
                                </span>
                                @if($promo->jatuh_tempo)
                                    <span class="text-xs text-red-600 font-bold bg-white/80 px-2.5 py-1 rounded-md border border-red-200">
                                        <i class="far fa-clock mr-1"></i> s/d {{ $promo->jatuh_tempo->format('d M Y') }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-pink-600 transition">
                                {{ $promo->nama_promosi }}
                            </h3>

                            <p class="text-sm leading-relaxed mb-6" style="color: #594a4e;">
                                {{ $promo->deskripsi ?: 'Penawaran istimewa untuk pembelian menu donat lezat DoughHeaven.' }}
                            </p>

                            @if($promo->produks->isNotEmpty())
                                <div class="mb-6 pt-3 border-t border-pink-200/70">
                                    <span class="text-[11px] font-bold text-gray-600 uppercase tracking-wider block mb-2">Menu Termasuk:</span>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($promo->produks->take(3) as $prod)
                                            <span class="inline-flex items-center text-xs bg-white px-3 py-1 rounded-lg text-gray-700 font-medium border border-pink-200 shadow-sm">
                                                🍩 {{ $prod->nama_produk }}
                                            </span>
                                        @endforeach
                                        @if($promo->produks->count() > 3)
                                            <span class="text-xs text-pink-600 font-bold self-center pl-1">+{{ $promo->produks->count() - 3 }} lainnya</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-pink-200/80 flex items-center justify-between relative z-10">
                            <span class="text-xs text-gray-600 font-medium">
                                {{ $promo->jatuh_tempo ? 'Berlaku s/d ' . $promo->jatuh_tempo->translatedFormat('d F Y') : 'Penawaran Terbatas' }}
                            </span>
                            <a href="{{ route('promos') }}"
                                class="text-xs font-bold text-pink-600 hover:text-pink-700 bg-white px-4 py-2 rounded-full shadow-sm hover:shadow flex items-center gap-1 transition">
                                <span>Klaim Promo</span>
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-12 bg-pink-50/60 rounded-2xl border border-dashed border-pink-300">
                        <p class="text-gray-500 text-sm">Nantikan promo terbaru dan kejutan manis berikutnya dari DoughHeaven!</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('promos') }}"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-8 py-3.5 rounded-full shadow-md hover:shadow-pink-500/25 transition duration-300 inline-flex items-center gap-2">
                    <span>Lihat Semua Promo & Penawaran</span>
                    <i class="fas fa-tags text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Stories & Bakery Tips (Dynamic Blog) -->
    @if(isset($latestBlogs) && $latestBlogs->isNotEmpty())
        <section class="py-20" style="background-color: #faeee7;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                    <div>
                        <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-white px-3 py-1 rounded-full border border-pink-200">
                            Blog & Cerita Dapur
                        </span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">
                            Kabar Manis & Tips Kuliner
                        </h2>
                        <p class="text-gray-600 text-sm md:text-base mt-2 max-w-xl">
                            Simak artikel informatif seputar donat, tips penyimpanan, dan kisah di balik kreasi kami.
                        </p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('halblog.index') }}"
                            class="inline-flex items-center gap-2 text-sm font-bold text-pink-600 hover:text-pink-700 bg-white px-5 py-2.5 rounded-full shadow-sm hover:shadow transition">
                            <span>Baca Semua Artikel</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestBlogs as $blog)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group border border-pink-100/60">
                            <div>
                                <div class="relative overflow-hidden aspect-[16/10]">
                                    <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->judul }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500"
                                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=600&q=80';">
                                    <span class="absolute top-3 left-3 bg-pink-600 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">
                                        {{ $blog->kategori_label ?? ucwords(str_replace('_', ' ', $blog->kategori)) }}
                                    </span>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ \Carbon\Carbon::parse($blog->tanggal)->format('d F Y') }}</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-pink-600 transition">
                                        {{ $blog->judul }}
                                    </h3>
                                    <p class="text-gray-600 text-xs md:text-sm line-clamp-3 leading-relaxed">
                                        {{ $blog->deskripsi }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-6 pt-0">
                                <a href="{{ route('halblog.detail', $blog->slug) }}"
                                    class="text-xs font-bold text-pink-600 hover:text-pink-700 inline-flex items-center gap-1.5 transition">
                                    <span>Baca Artikel Penuh</span>
                                    <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Testimonials Section -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                    Kata Mereka
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Apa Kata Donut Lovers?
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-3"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Kepuasan dan senyuman di setiap gigitan adalah alasan kami bangun sebelum fajar setiap hari.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(isset($ulasans) && $ulasans->isNotEmpty())
                    @foreach($ulasans as $ulasan)
                        <div class="p-8 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between border border-pink-100/70"
                            style="background-color: #faeee7;">
                            <div>
                                <div class="flex text-yellow-400 text-sm mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 text-base mb-2">"{{ $ulasan->subjek }}"</h4>
                                <p class="text-gray-600 text-sm italic leading-relaxed mb-6">
                                    "{{ $ulasan->isi }}"
                                </p>
                            </div>
                            <div class="flex items-center gap-3 pt-4 border-t border-pink-200/60">
                                <div class="w-10 h-10 rounded-full bg-pink-600 text-white font-bold flex items-center justify-center text-sm shadow-sm">
                                    {{ strtoupper(substr($ulasan->nama, 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-800 text-sm">{{ $ulasan->nama }}</h5>
                                    <span class="text-[11px] text-pink-600 font-medium">Pelanggan Terverifikasi</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-8 rounded-2xl shadow-sm border border-pink-100" style="background-color: #faeee7;">
                        <div class="flex text-yellow-400 text-sm mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">"Donat Paling Lembut di Bandung!"</h4>
                        <p class="text-gray-600 text-sm italic mb-6">
                            "Original Glazed-nya beneran melting di lidah. Gak berminyak dan manisnya pas banget buat teman ngopi sore."
                        </p>
                        <h5 class="font-bold text-gray-800 text-sm">- Sarah Wijaya</h5>
                    </div>
                @endif
            </div>

            <!-- Feedback CTA -->
            <div class="mt-12 text-center bg-pink-50/60 rounded-2xl p-6 max-w-xl mx-auto border border-pink-100">
                <p class="text-sm text-gray-700 font-medium mb-3">
                    Sudah mencoba donat DoughHeaven? Ceritakan pengalaman manismu kepada kami!
                </p>
                <a href="{{ route('ulasan.create') }}"
                    class="inline-flex items-center gap-2 text-xs font-bold text-pink-600 hover:text-white bg-white hover:bg-pink-600 border border-pink-300 px-5 py-2.5 rounded-full transition shadow-sm">
                    <i class="fas fa-pen-nib"></i>
                    <span>Tulis Ulasan & Unek-unek Manis</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Ambiance Gallery Section -->
    <section class="py-20" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-white px-3 py-1 rounded-full border border-pink-200">
                    Galeri & Suasana
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Outlet & Hangout Space
                </h2>
                <p class="text-gray-600 text-sm md:text-base">
                    Kunjungi store kami di Jl. Melong Asih Bandung. Tempat hangat untuk bersantai, bekerja, dan bercengkerama.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative overflow-hidden rounded-2xl aspect-square shadow-lg group">
                    <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Interior"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <span class="text-white font-bold text-sm">✨ Sudut Hangat Bakery</span>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl aspect-square shadow-lg group">
                    <img src="https://plus.unsplash.com/premium_photo-1672846027103-a50797886f99?q=80&w=2070&auto=format&fit=crop"
                        alt="DoughHeaven Display"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <span class="text-white font-bold text-sm">🍩 Display Donat Segar Tiap Hari</span>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl aspect-square shadow-lg group">
                    <img src="https://images.unsplash.com/photo-1556745753-b2904692b3cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Seating"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <span class="text-white font-bold text-sm">☕ Coffee & Pastry Corner</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
