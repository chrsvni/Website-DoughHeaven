<footer class="text-white py-14" style="background-color: #2b2528;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12 text-left">
            <!-- Brand -->
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <span class="text-3xl">🍩</span>
                    <h3 class="text-2xl font-bold text-pink-400">DoughHeaven</h3>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Surga donat artisanal di Kota Bandung. Dibuat hangat & segar setiap hari menggunakan ragi alami dan bahan premium pilihan untuk menghadirkan kebahagiaan di setiap gigitan.
                </p>
                <div class="flex space-x-3 pt-2">
                    <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-pink-600/30 text-pink-400 hover:bg-pink-600 hover:text-white flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="w-9 h-9 rounded-full bg-pink-600/30 text-pink-400 hover:bg-pink-600 hover:text-white flex items-center justify-center transition">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/6289667817609" target="_blank" class="w-9 h-9 rounded-full bg-pink-600/30 text-pink-400 hover:bg-pink-600 hover:text-white flex items-center justify-center transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-base font-bold uppercase tracking-wider text-pink-400 mb-4 flex items-center gap-2">
                    <span>✨</span> Navigasi
                </h4>
                <ul class="space-y-2.5 text-sm text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Home</a></li>
                    <li><a href="{{ url('/story') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Our Story</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Menu Donat</a></li>
                    <li><a href="{{ route('promos') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Promosi & Diskon</a></li>
                    <li><a href="{{ route('halblog.index') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Artikel & Cerita</a></li>
                    <li><a href="{{ route('ulasan.create') }}" class="hover:text-pink-400 transition flex items-center gap-2"><i class="fas fa-angle-right text-xs text-pink-500"></i> Hubungi & Ulasan</a></li>
                </ul>
            </div>

            <!-- Hours -->
            <div>
                <h4 class="text-base font-bold uppercase tracking-wider text-pink-400 mb-4 flex items-center gap-2">
                    <span>⏰</span> Jam Buka
                </h4>
                <ul class="space-y-2.5 text-sm text-gray-300">
                    <li class="flex justify-between border-b border-gray-700/60 pb-1.5">
                        <span>Senin - Jumat</span>
                        <span class="font-medium text-pink-300">07.00 - 20.00</span>
                    </li>
                    <li class="flex justify-between border-b border-gray-700/60 pb-1.5">
                        <span>Sabtu</span>
                        <span class="font-medium text-pink-300">08.00 - 21.00</span>
                    </li>
                    <li class="flex justify-between pb-1.5">
                        <span>Minggu & Libur</span>
                        <span class="font-medium text-pink-300">08.00 - 20.00</span>
                    </li>
                </ul>
                <div class="mt-4 p-3 rounded-lg bg-pink-900/30 border border-pink-700/40 text-xs text-pink-200">
                    <i class="fas fa-fire mr-1 text-pink-400"></i> Batch donat segar matang pukul 07.30 & 14.00 WIB setiap hari!
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-base font-bold uppercase tracking-wider text-pink-400 mb-4 flex items-center gap-2">
                    <span>📍</span> Outlet Kami
                </h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-start gap-2.5">
                        <i class="fas fa-map-marker-alt text-pink-400 mt-1"></i>
                        <span>Jl. Melong Asih No. 1, Kota Bandung, Jawa Barat</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="fas fa-phone-alt text-pink-400"></i>
                        <span>+62 89667817609</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="fas fa-envelope text-pink-400"></i>
                        <span>hello@doughheaven.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-800 text-gray-400 text-sm flex flex-col md:flex-row items-center justify-between gap-4">
            <p>&copy; {{ date('Y') }} DoughHeaven Bakery. Made with 💖 and pure flour passion.</p>
            <p class="text-xs text-gray-500">Heavenly Donuts & Sweet Delights Bandung</p>
        </div>
    </div>
</footer>
