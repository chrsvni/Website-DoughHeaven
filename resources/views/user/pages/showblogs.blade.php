@extends('user.layouts.app')

@section('title', $halblog->judul . ' | DoughHeaven Blog')
@section('meta_description', $halblog->getExcerpt(160))
@section('meta_keywords', 'blog donat, artikel DoughHeaven, ' . $halblog->judul)

@section('content')
    <!-- Breadcrumb -->
    <section class="pt-24 pb-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-pink-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('halblog.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-pink-600 md:ml-2">Blog</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate">{{ $halblog->judul }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Article Header -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <span class="bg-pink-100 text-pink-800 text-sm font-semibold px-4 py-2 rounded-full">
                        {{ $halblog->kategori_label }}
                    </span>
                    <span class="text-gray-500 ml-4">{{ $halblog->tanggal->format('F d, Y') }}</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $halblog->judul }}</h1>
                <p class="text-xl text-gray-600">{{ $halblog->deskripsi }}</p>
                @if($halblog->user)
                    <div class="flex items-center justify-center mt-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold">
                                    {{ substr($halblog->user->name, 0, 1) }}
                                </span>
                            </div>
                            <div class="ml-3 text-left">
                                <p class="text-sm font-medium text-gray-900">{{ $halblog->user->name }}</p>
                                <p class="text-xs text-gray-500">Author</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="{{ $halblog->gambar_url }}"
                     alt="{{ $halblog->judul }}"
                     class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($halblog->isi_blog)) !!}
            </div>

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Share this article</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($halblog->judul . ' - ' . request()->fullUrl()) }}"
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
