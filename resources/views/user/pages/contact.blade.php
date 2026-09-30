@extends('user.layouts.app')

@section('title', 'Hubungi Kami & Kirim Ulasan | DoughHeaven')
@section('meta_description', 'Hubungi tim DoughHeaven Bandung untuk pemesanan katering, pertanyaan produk, atau kirimkan ulasan manis Anda.')
@section('meta_keywords', 'kontak doughheaven, alamat doughheaven bandung, review donat doughheaven, customer service bakery')

@section('content')
    <!-- Hero Banner -->
    <section class="pt-24 pb-14 relative overflow-hidden" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-pink-600 text-xs md:text-sm font-bold shadow-sm mb-4 border border-pink-200">
                <span>💬</span> Kami Senang Mendengar dari Anda
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 tracking-tight">
                Hubungi Kami & <span class="text-pink-600">Beri Ulasan</span>
            </h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Punya pertanyaan seputar pesanan custom, katering acara, atau ingin menyampaikan kesan manismu? Kirimkan pesan sekarang!
            </p>
        </div>

        <div class="absolute -top-20 -left-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
    </section>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="max-w-4xl mx-auto px-4 mt-8">
            <div class="bg-emerald-50 border-2 border-emerald-400 text-emerald-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-md animate-fade-in">
                <i class="fas fa-check-circle text-2xl text-emerald-600 flex-shrink-0"></i>
                <div>
                    <h5 class="font-bold text-sm">Pesan Berhasil Terkirim!</h5>
                    <p class="text-xs">{{ session('success') }} Terima kasih atas ulasan dan masukan Anda untuk DoughHeaven.</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Quick Info Cards -->
    <section class="py-12" style="background-color: #fffffe;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Location -->
                <div class="p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-lg transition text-center group"
                    style="background-color: #faeee7;">
                    <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-xl mx-auto mb-4 shadow-sm group-hover:bg-pink-600 group-hover:text-white transition">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-1">Kunjungi Outlet</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Jl. Melong Asih No. 1<br>Kota Bandung, Jawa Barat
                    </p>
                    <span class="inline-block mt-3 text-[11px] font-bold text-pink-600 bg-white px-2.5 py-1 rounded-full shadow-xs">
                        Tersedia Parkir & Dine-in
                    </span>
                </div>

                <!-- WhatsApp & Call -->
                <div class="p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-lg transition text-center group"
                    style="background-color: #faeee7;">
                    <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-xl mx-auto mb-4 shadow-sm group-hover:bg-pink-600 group-hover:text-white transition">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-1">WhatsApp & Telepon</h3>
                    <p class="text-xs text-gray-600 leading-relaxed font-semibold">
                        +62 89667817609
                    </p>
                    <a href="https://wa.me/6289667817609" target="_blank"
                        class="inline-block mt-3 text-[11px] font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1 rounded-full shadow-xs transition">
                        Chat WhatsApp &rarr;
                    </a>
                </div>

                <!-- Email -->
                <div class="p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-lg transition text-center group"
                    style="background-color: #faeee7;">
                    <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-xl mx-auto mb-4 shadow-sm group-hover:bg-pink-600 group-hover:text-white transition">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-1">Email Resmi</h3>
                    <p class="text-xs text-gray-600 leading-relaxed font-semibold">
                        hello@doughheaven.com
                    </p>
                    <span class="inline-block mt-3 text-[11px] font-bold text-gray-500 bg-white px-2.5 py-1 rounded-full shadow-xs">
                        Dibalas dalam 24 Jam
                    </span>
                </div>

                <!-- Operating Hours -->
                <div class="p-6 rounded-2xl border border-pink-100 shadow-sm hover:shadow-lg transition text-center group"
                    style="background-color: #faeee7;">
                    <div class="w-14 h-14 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-xl mx-auto mb-4 shadow-sm group-hover:bg-pink-600 group-hover:text-white transition">
                        <i class="far fa-clock"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-base mb-1">Jam Buka Dapur</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Sen - Jum: 07.00 - 20.00<br>
                        Sab - Min: 08.00 - 21.00
                    </p>
                    <span class="inline-block mt-3 text-[11px] font-bold text-emerald-700 bg-emerald-100 px-2.5 py-1 rounded-full shadow-xs">
                        ● Buka Setiap Hari
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-16" style="background-color: #faeee7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Form Box (7 cols) -->
                <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-pink-100">
                    <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-pink-50 px-3 py-1 rounded-full border border-pink-200 inline-block mb-3">
                        Formulir Pesan & Ulasan
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-2">
                        Kirimkan Pesan Anda
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 mb-8">
                        Isi form di bawah untuk bertanya seputar donat atau mengirim ulasan pengalaman berbelanja di DoughHeaven.
                    </p>

                    <form action="{{ route('ulasan.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="nama" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                    Nama Lengkap <span class="text-pink-600">*</span>
                                </label>
                                <input type="text" id="nama" name="nama"
                                    placeholder="Contoh: Sarah Wijaya"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                                    required>
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                    Alamat Email <span class="text-pink-600">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                    placeholder="nama@email.com"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="subjek" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Subjek Pesan <span class="text-pink-600">*</span>
                            </label>
                            <input type="text" id="subjek" name="subjek"
                                placeholder="Contoh: Ulasan Donat Matcha / Tanya Pesanan Katering"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                                required>
                        </div>

                        <div>
                            <label for="isi" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Isi Pesan / Ulasan Anda <span class="text-pink-600">*</span>
                            </label>
                            <textarea id="isi" name="isi" rows="5"
                                placeholder="Tuliskan pengalaman manismu, pertanyaan detail, atau saran untuk DoughHeaven..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                                required></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-pink-500/30 transition duration-300 flex items-center justify-center gap-2 text-sm">
                            <i class="fas fa-paper-plane"></i>
                            <span>Kirim Pesan & Ulasan</span>
                        </button>
                    </form>
                </div>

                <!-- Map & Hours Box (5 cols) -->
                <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                    <!-- Google Map Embed (Bandung Melong Asih) -->
                    <div class="bg-white p-6 rounded-3xl shadow-xl border border-pink-100 flex-1 flex flex-col">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-extrabold text-gray-900 text-base flex items-center gap-2">
                                <i class="fas fa-map-marked-alt text-pink-600"></i>
                                <span>Peta Lokasi Outlet</span>
                            </h3>
                            <a href="https://maps.google.com/?q=Jl.+Melong+Asih+Bandung" target="_blank"
                                class="text-xs font-bold text-pink-600 hover:underline">
                                Buka di Maps &rarr;
                            </a>
                        </div>

                        <div class="h-64 sm:h-72 w-full rounded-2xl overflow-hidden shadow-inner border border-gray-200">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.435017992764!2d107.5615655767578!3d-6.917958988236714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5ff4d3ea2d3%3A0x633d7b8782a9db40!2sJl.%20Melong%20Asih%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100 text-xs text-gray-500 flex items-center justify-between">
                            <span>📍 Jl. Melong Asih No. 1 Bandung</span>
                            <span class="text-pink-600 font-semibold">Free Wi-Fi & AC</span>
                        </div>
                    </div>

                    <!-- Direct Instant Chat Callout -->
                    <div class="bg-gradient-to-br from-pink-600 to-pink-700 text-white p-6 rounded-3xl shadow-lg flex items-center justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-base mb-1">Butuh Respon Cepat?</h4>
                            <p class="text-xs text-pink-100">Hubungi WhatsApp customer service kami untuk order hari ini.</p>
                        </div>
                        <a href="https://wa.me/6289667817609" target="_blank"
                            class="bg-white hover:bg-pink-50 text-pink-600 font-bold px-4 py-2.5 rounded-full text-xs transition shadow flex items-center gap-1.5 flex-shrink-0">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Chat WA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16" style="background-color: #fffffe;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <span class="text-xs font-bold text-pink-600 uppercase tracking-widest bg-pink-50 px-3 py-1 rounded-full border border-pink-200">
                    Pertanyaan Umum
                </span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-3">
                    Frequently Asked Questions (FAQ)
                </h2>
                <p class="text-gray-500 text-sm">
                    Jawaban cepat untuk pertanyaan yang sering ditanyakan seputar donat dan pemesanan.
                </p>
            </div>

            <div class="space-y-4">
                <div class="p-6 rounded-2xl border border-pink-100" style="background-color: #faeee7;">
                    <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-question-circle text-pink-600"></i>
                        <span>Apakah produk donat DoughHeaven 100% Halal?</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-6">
                        Ya, seluruh bahan baku kami (tepung, butter, cokelat couverture, ragi, hingga pewarna alami) berstatus halal dan tidak menggunakan minyak hewani non-halal sama sekali.
                    </p>
                </div>

                <div class="p-6 rounded-2xl border border-pink-100" style="background-color: #faeee7;">
                    <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-question-circle text-pink-600"></i>
                        <span>Berapa lama donat DoughHeaven bisa bertahan?</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-6">
                        Donat kami paling nikmat disantap di hari yang sama. Di suhu ruang tertutup dalam box, donat tetap empuk hingga 24-36 jam. Untuk menikmatinya kembali, cukup hangatkan 8 detik di microwave!
                    </p>
                </div>

                <div class="p-6 rounded-2xl border border-pink-100" style="background-color: #faeee7;">
                    <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-question-circle text-pink-600"></i>
                        <span>Apakah bisa memesan donat custom untuk ulang tahun & wedding?</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-6">
                        Tentu saja! Kami melayani pesanan donat huruf, donat tower piramida, dan hampers box dengan kartu ucapan khusus. Silakan hubungi kami via WhatsApp minimal H-1 sebelum acara.
                    </p>
                </div>

                <div class="p-6 rounded-2xl border border-pink-100" style="background-color: #faeee7;">
                    <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-question-circle text-pink-600"></i>
                        <span>Apakah DoughHeaven melayani pengiriman sameday di Bandung?</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-6">
                        Bisa! Kami bekerja sama dengan kurir instan dan sameday (GrabExpress & GoSend). Anda bisa memesan melalui WhatsApp kami dan donat akan dikirim langsung dari dapur outlet Melong Asih.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
