@extends('user.layouts.app')

@section('title', 'Blog | DoughHeaven')
@section('meta_description', 'Baca artikel menarik seputar dunia donat, resep, tips kuliner, dan cerita di balik DoughHeaven.')
@section('meta_keywords', 'blog donat, artikel DoughHeaven, tips kuliner, resep donat, kisah DoughHeaven')

@push('styles')
<style>
    body {
        font-family: 'Poppins', 'Helvetica', 'Arial', sans-serif;
    }
    /* Add Google Fonts link in the head section */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    .blog-card:hover .blog-image {
        transform: scale(1.05);
    }

    .category-tab.active {
        border-bottom-color: #ec4899;
        color: #ec4899;
        font-weight: 600;
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="pt-24 pb-12 bg-pink-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">DoughHeaven Blog</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover our latest news, donut recipes, and sweet stories from behind the counter</p>
        </div>
    </div>
</section>

<!-- Blog Categories Navigation -->
<section class="py-8 bg-white shadow-md sticky top-16 z-40">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('halblog.index') }}"
               class="px-4 py-2 rounded-full transition-colors duration-300
               {{ request('kategori') ? 'bg-gray-200 text-gray-700 hover:bg-gray-300' : 'bg-pink-600 text-white' }}">
                All Posts
            </a>

            @foreach ($kategoris as $kategori)
                <a href="{{ route('halblog.index', ['kategori' => $kategori]) }}"
                   class="px-4 py-2 rounded-full transition-colors duration-300
                   {{ request('kategori') == $kategori ? 'bg-pink-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ ucwords(str_replace('_', ' ', $kategori)) }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Post - Only show when no category is selected -->
@if ($featuredPost && !request('kategori'))
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Featured Post</h2>

        <div class="bg-gray-50 rounded-xl overflow-hidden shadow-lg">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <div class="h-64 md:h-full overflow-hidden">
                        <img src="{{ asset('storage/' . $featuredPost->gambar) }}"
                             alt="{{ $featuredPost->judul }}"
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                </div>
                <div class="md:w-1/2 p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-pink-100 text-pink-800 text-xs font-semibold px-3 py-1 rounded-full">
                            {{ ucwords(str_replace('_', ' ', $featuredPost->kategori)) }}
                        </span>
                        <span class="text-gray-500 text-sm ml-4">
                            {{ \Carbon\Carbon::parse($featuredPost->tanggal)->format('F d, Y') }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $featuredPost->judul }}</h3>
                    <p class="text-gray-600 mb-6">
                        {{ Str::limit(strip_tags($featuredPost->deskripsi), 150) }}
                    </p>
                    <a href="{{ route('halblog.detail', $featuredPost->slug) }}"
                       class="inline-block bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700 transition duration-300">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Blog Posts Grid -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            @if(request('kategori'))
                {{ ucwords(str_replace('_', ' ', request('kategori'))) }} Articles
            @else
                Latest Articles
            @endif
        </h2>

        @if($halblogs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($halblogs as $blog)
            <div class="blog-card bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->gambar) }}"
                         alt="{{ $blog->judul }}"
                         class="blog-image w-full h-full object-cover transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <span class="bg-pink-100 text-pink-800 text-xs font-semibold px-3 py-1 rounded-full">
                            {{ ucwords(str_replace('_', ' ', $blog->kategori)) }}
                        </span>
                        <span class="text-gray-500 text-sm ml-4">
                            {{ \Carbon\Carbon::parse($blog->tanggal)->format('F d, Y') }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $blog->judul }}</h3>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit(strip_tags($blog->deskripsi), 120) }}
                    </p>
                    <a href="{{ route('halblog.detail', $blog->slug) }}"
                       class="text-pink-600 font-medium hover:text-pink-800 inline-flex items-center">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if(method_exists($halblogs, 'links'))
        <div class="mt-12 flex justify-center">
            {{ $halblogs->links() }}
        </div>
        @endif

        @else
        <p class="text-center text-gray-500">No posts found in this category.</p>
        @endif
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-16 bg-pink-600">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Stay Updated with DoughHeaven</h2>
        <p class="text-pink-100 mb-8">Subscribe to our newsletter for exclusive recipes, promotions, and donut inspiration</p>
        <div class="flex flex-col md:flex-row justify-center">
            <input type="email" placeholder="Your email address" class="px-6 py-3 w-full md:w-96 rounded-full md:rounded-r-none mb-4 md:mb-0 focus:outline-none">
            <button class="bg-gray-900 text-white px-6 py-3 rounded-full md:rounded-l-none hover:bg-gray-800 transition duration-300">Subscribe</button>
        </div>
        <p class="text-pink-100 text-sm mt-4">We respect your privacy. Unsubscribe at any time.</p>
    </div>
</section>

@endsection
