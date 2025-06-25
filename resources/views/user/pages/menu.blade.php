@extends('user.layouts.app')

@section('title', 'Menu | DoughHeaven')
@section('meta_description',
    'Temukan menu donat terbaik di DoughHeaven, dengan berbagai pilihan donat dan dessert yang
    menggoda selera.')
@section('meta_keywords', 'menu, donat, dessert, DoughHeaven, menu donat')

@section('content')
    <!-- Hero Section -->
    <section class="pt-16 relative">
        <div class="h-96 w-full bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="relative h-full flex flex-col items-center justify-center text-center px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Welcome to DoughHeaven</h1>
                <p class="text-xl md:text-2xl text-white">Where every bite feels like heaven.</p>
            </div>
        </div>
    </section>

    <!-- Category Navigation -->
    <section class="py-8 bg-white shadow-md sticky top-16 z-40">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('menu') }}"
                    class="px-4 py-2 rounded-full transition-colors duration-300
                {{ request('kategori') ? 'bg-gray-200 text-gray-700 hover:bg-gray-300' : 'bg-pink-600 text-white' }}">
                    Semua
                </a>

                @foreach ($kategoris as $kategori)
                    <a href="{{ route('menu', ['kategori' => $kategori->id]) }}"
                        class="px-4 py-2 rounded-full transition-colors duration-300 flex items-center gap-2
                    {{ request('kategori') == $kategori->id ? 'bg-pink-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ $kategori->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Menu Items -->
    <section class="py-16">
        <div class="container mx-auto px-20">
            @if(request('kategori'))
                @php
                    $kategori_filter = $kategoris->where('id', request('kategori'))->first();
                @endphp

                @if($kategori_filter)
                    <div>
                        <h2 class="text-3xl font-bold text-center mb-12 mt-8">{{ $kategori_filter->nama_kategori }}</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($produks->where('kategori_id', $kategori_filter->id) as $produk)
                                <div
                                    class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                        class="w-full h-80 object-cover">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-xl font-bold text-gray-800">{{ $produk->nama_produk }}</h3>
                                            <span class="text-pink-600 font-bold">
                                                Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 mb-4">{{ $produk->deskripsi }}</p>
                                        <button
                                            class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition duration-300">
                                            Pesan
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                @foreach ($kategoris as $kategori)
                    <div>
                        <h2 class="text-3xl font-bold text-center mb-12  mt-8">{{ $kategori->nama_kategori }}</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($produks->where('kategori_id', $kategori->id) as $produk)
                                <div
                                    class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                        class="w-full h-80 object-cover">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-xl font-bold text-gray-800">{{ $produk->nama_produk }}</h3>
                                            <span class="text-pink-600 font-bold">
                                                Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 mb-4">{{ $produk->deskripsi }}</p>
                                        <button
                                            class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition duration-300">
                                            Pesan
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
