@extends('user.layouts.app')

@section('title', 'Our Story | DoughHeaven - Perjalanan & Cerita Dapur Kami')
@section('meta_description', 'Kenali perjalanan cinta dan dedikasi di balik kelembutan donat DoughHeaven dari dapur Bandung sejak 2020.')
@section('meta_keywords', 'sejarah doughheaven, tentang kami, pembuat donat bandung, artisan donut bakery')

@section('content')
    <!-- Hero Section -->
    <section class="pt-24 pb-16 relative overflow-hidden" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-pink-600 text-xs md:text-sm font-bold shadow-sm mb-6 border border-pink-200">
                    <span>🍩</span> Dari Dapur Bandung untuk Indonesia
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    Kisah Manis di Balik <br class="hidden sm:inline">
                    <span class="text-pink-600">Setiap Gigitan Sempurna</span>
                </h1>
                <div class="w-20 h-1.5 bg-pink-500 mx-auto rounded-full mb-6"></div>
                <p class="text-base md:text-lg text-gray-600 leading-relaxed">
                    Setiap donat yang Anda nikmati hari ini adalah buah dari ratusan percobaan adonan, kehangatan oven subuh hari, dan mimpi sederhana: menyebarkan kebahagiaan lewat donat terbaik.
                </p>
            </div>
        </div>

        <!-- Decorative background shapes -->
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-pink-200/50 rounded-full blur-3xl pointer-events-none"></div>
    </section>

    <!-- The Origin Story (Awal Perjalanan) -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <!-- Image Grid -->
                <div class="w-full lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="rounded-2xl overflow-hidden shadow-lg h-56">
                                <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                    alt="Baking Process" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                            </div>
                            <div class="bg-pink-600 text-white p-6 rounded-2xl shadow-lg flex flex-col justify-center">
                                <span class="text-3xl font-black mb-1">100%</span>
                                <span class="text-sm font-semibold">Artisanal Handcrafted Dough</span>
                            </div>
                        </div>
                        <div class="space-y-4 pt-6">
                            <div class="bg-pink-50 p-6 rounded-2xl border border-pink-100 flex flex-col justify-center">
                                <span class="text-3xl font-black text-pink-600 mb-1">2020</span>
                                <span class="text-xs text-gray-600 font-medium">Tahun Pertama Kami Menyapa Bandung</span>
                            </div>
                            <div class="rounded-2xl overflow-hidden shadow-lg h-56">
                                <img src="https://images.unsplash.com/photo-1517433367423-c7e5b0f35086?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                    alt="Fresh Donuts" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="w-full lg:w-1/2">
                    <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                        Awal Mula
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 mb-6 leading-tight">
                        Dari Dapur Kecil Rumahan, <br>
                        Menuju Hati Pecinta Donat
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                        DoughHeaven bermula di pertengahan tahun 2020. Di tengah masa-masa yang menantang, kami ingin menghadirkan sesuatu yang menghibur hati: donat hangat dengan adonan yang tidak berminyak, empuk, dan memiliki aroma mentega yang menenangkan.
                    </p>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6">
                        Bermodalkan mixer kecil dan satu wajan penggoreng suhu teratur, resep pertama kami diuji berulang kali sampai menemukan keseimbangan antara kerenyahan tipis di luar dan kelembutan layaknya awan di dalam.
                    </p>

                    <!-- Founder Quote -->
                    <div class="p-5 rounded-2xl border-l-4 border-pink-500 shadow-sm" style="background-color: #faeee7;">
                        <p class="italic text-sm text-gray-700 mb-2">
                            "Bagi kami, donat yang sempurna adalah donat yang ketika Anda gigit, membuat Anda memejamkan mata sejenak dan tersenyum."
                        </p>
                        <span class="text-xs font-bold text-pink-600 block">- Cheria Apiani, Founder of DoughHeaven</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The 4-Step Craftsmanship (Rahasia Dapur Kami) -->
    <section class="py-20" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-white px-3 py-1 rounded-full border border-pink-200">
                    Proses Pembuatan
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Rahasia Tekstur Selembut Awan
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-3"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Kami menolak jalan pintas. Setiap donat melewati 4 tahapan artisan dengan ketelitian tinggi sebelum disajikan ke meja Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-pink-100 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center font-black text-lg mb-4">
                            01
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Pemilihan Bahan Pilihan</h3>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Tepung gandum impor berprotein tinggi dipadukan dengan butter New Zealand kualitas terbaik untuk aroma mentega murni.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-semibold text-pink-600">
                        🌾 100% Halal Certified
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-pink-100 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center font-black text-lg mb-4">
                            02
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">18 Jam Cold Proofing</h3>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Fermentasi dingin lambat semalaman di chiller khusus agar mikro rongga udara terbentuk sempurna tanpa bau ragi berlebih.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-semibold text-pink-600">
                        ❄️ Temperature Controlled
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-pink-100 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center font-black text-lg mb-4">
                            03
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Golden Fry 175°C</h3>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Digoreng dengan minyak kelapa murni pada suhu presisi 175°C hanya selama 90 detik per sisi agar tekstur garing tanpa menyerap minyak.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-semibold text-pink-600">
                        🔥 Non-Greasy Guarantee
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-pink-100 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center font-black text-lg mb-4">
                            04
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-2">Artisan Hand Glazing</h3>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Setiap donat dicelup manual ke dalam lelehan cokelat couverture Belgia atau selai stroberi segar dan dihias satu per satu.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] font-semibold text-pink-600">
                        🍓 Fresh Homemade Glaze
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Philosophy Cards -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                    Nilai & Prinsip Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Janji Manis DoughHeaven
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-3"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Tiga nilai utama yang menjadi pedoman tim kami dari awal berdiri hingga hari ini.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 flex flex-col justify-between"
                    style="background-color: #faeee7;">
                    <div>
                        <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm mb-6">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Kebaikan Bahan Alami</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Kami menolak bahan kimia pengawet, pemanis buatan, atau minyak daur ulang. Donat yang kami sajikan aman dan menyehatkan untuk seluruh keluarga Anda.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-pink-200/60 text-xs font-bold text-pink-600">
                        #PureFlourPassion
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 flex flex-col justify-between"
                    style="background-color: #faeee7;">
                    <div>
                        <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm mb-6">
                            <i class="fas fa-sun"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Selalu Baru Setiap Hari</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Kami tidak pernah menyimpan donat kemarin untuk dijual hari ini. Setiap pagi adalah batch adonan baru yang dipanggang segar dengan cinta.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-pink-200/60 text-xs font-bold text-pink-600">
                        #BakedDailyBandung
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 flex flex-col justify-between"
                    style="background-color: #faeee7;">
                    <div>
                        <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm mb-6">
                            <i class="fas fa-smile-beam"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Menebar Senyuman</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Donat adalah bahasa universal kebahagiaan. Dari ulang tahun, syukuran kantor, hingga traktiran sahabat — kami senang menjadi bagian dari momen Anda.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-pink-200/60 text-xs font-bold text-pink-600">
                        #SpreadTheSweetness
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-pink-600 tracking-widest uppercase bg-white px-3 py-1 rounded-full border border-pink-200">
                    Artisan & Baker
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-3">
                    Keluarga di Balik Oven
                </h2>
                <div class="w-16 h-1 bg-pink-500 mx-auto rounded-full mb-3"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Orang-orang berdedikasi yang bangun sebelum fajar demi memastikan setiap kotak donat DoughHeaven tiba dengan sempurna.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 group">
                    <div class="mb-4 relative w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-pink-100 group-hover:border-pink-500 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Cheria Apiani" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Cheria Apiani</h3>
                    <p class="text-xs font-bold text-pink-600 mb-2">Founder & Head Pastry</p>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Pencetus racikan adonan ragi alami dan inovasi rasa donat DoughHeaven.
                    </p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 group">
                    <div class="mb-4 relative w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-pink-100 group-hover:border-pink-500 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Michael Thompson" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Michael S.</h3>
                    <p class="text-xs font-bold text-pink-600 mb-2">Fermentation Master</p>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Menjaga ketepatan suhu ruang fermentasi dan kelembutan serat donat.
                    </p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 group">
                    <div class="mb-4 relative w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-pink-100 group-hover:border-pink-500 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Sarah Wijaya" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Sarah Wijaya</h3>
                    <p class="text-xs font-bold text-pink-600 mb-2">Master Glazer & Topping</p>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Tangan terampil di balik celupan glaze estetik dan tampilan donat cantik.
                    </p>
                </div>

                <!-- Team Member 4 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-pink-100 group">
                    <div class="mb-4 relative w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-pink-100 group-hover:border-pink-500 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="David Chen" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">David Pratama</h3>
                    <p class="text-xs font-bold text-pink-600 mb-2">Customer Experience</p>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Menjamin setiap pesanan dikemas rapi dan terkirim tepat waktu ke tangan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing Invitation -->
    <section class="py-20" style="background-color: #fffffe;">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-5xl mb-4 block">✨</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                Mau Tahu Rahasia Terbesar Kami?
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-8 leading-relaxed">
                "Donat paling lezat adalah donat yang dinikmati bersama orang-orang tersayang."
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('menu') }}"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-8 py-3.5 rounded-full shadow-lg hover:shadow-pink-500/30 transition inline-flex items-center justify-center gap-2">
                    <i class="fas fa-utensils"></i>
                    <span>Pilih Menu Donat Favorit</span>
                </a>
                <a href="{{ route('ulasan.create') }}"
                    class="bg-pink-50 hover:bg-pink-100 text-pink-700 font-bold px-8 py-3.5 rounded-full border border-pink-200 transition inline-flex items-center justify-center gap-2">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Kunjungi Toko di Melong Asih</span>
                </a>
            </div>
        </div>
    </section>
@endsection
