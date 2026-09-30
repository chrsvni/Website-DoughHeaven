<div class="bg-white rounded-2xl shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between border border-pink-100/70 group">
    <!-- Image Box -->
    <div class="relative overflow-hidden aspect-[4/3] bg-pink-50">
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out"
            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=600&q=80';">

        <!-- Top Badges -->
        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
            @if($produk->rekomendasi == 'rekomendasi')
                <span class="bg-pink-600 text-white text-[11px] font-extrabold px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                    <i class="fas fa-star text-[10px] text-yellow-300"></i> Rekomendasi
                </span>
            @endif
        </div>

        @if($produk->kategori)
            <span class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-gray-700 text-xs font-semibold px-2.5 py-1 rounded-md shadow-sm">
                {{ $produk->kategori->nama_kategori }}
            </span>
        @endif
    </div>

    <!-- Details Box -->
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <div class="flex items-start justify-between gap-2 mb-2">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-pink-600 transition">
                    {{ $produk->nama_produk }}
                </h3>
            </div>
            <p class="text-gray-600 text-xs md:text-sm mb-4 line-clamp-2 leading-relaxed">
                {{ $produk->deskripsi }}
            </p>
        </div>

        <div class="pt-4 border-t border-gray-100">
            <div class="flex items-baseline justify-between mb-4">
                <span class="text-xs text-gray-400 font-medium">Harga Satuan</span>
                <span class="text-2xl font-black text-pink-600">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </span>
            </div>

            <a href="https://wa.me/6289667817609?text={{ urlencode('Halo DoughHeaven, saya ingin memesan varian: ' . $produk->nama_produk . ' (Rp ' . number_format($produk->harga, 0, ',', '.') . ')') }}"
                target="_blank"
                class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-4 rounded-xl shadow-md hover:shadow-pink-500/25 transition duration-200 flex items-center justify-center gap-2 text-sm">
                <i class="fab fa-whatsapp text-base"></i>
                <span>Pesan via WhatsApp</span>
            </a>
        </div>
    </div>
</div>
