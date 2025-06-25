@extends('user.layouts.app')

@section('title', 'Home | DoughHeaven')
@section('meta_description', 'Nikmati donat terbaik dari DoughHeaven yang menggoda selera.')
@section('meta_keywords', 'donat, manis, roti, DoughHeaven')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="pt-16">
        <div class="relative h-screen">
            <div class="w-full h-full">
                <div v-for="(slide, index) in heroSlides" :key="slide.id" v-show="currentSlide === index"
                    class="absolute inset-0 w-full h-full transition-opacity duration-1000"
                    :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }">

                    <!-- IMAGE -->
                    <template v-if="slide.type === 'image'">
                        <img :src="slide.src" :alt="slide.alt" class="w-full h-full object-cover" />
                    </template>

                    <!-- VIDEO -->
                    <template v-else-if="slide.type === 'video'">
                        <video :src="slide.src" class="w-full h-full object-cover" autoplay muted loop
                            playsinline></video>
                    </template>

                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                </div>
            </div>

            <!-- Slide Navigation -->
            <button @click="prevSlide"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 focus:outline-none z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="nextSlide"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-75 focus:outline-none z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Slide Indicators -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-10">
                <button v-for="(slide, index) in heroSlides" :key="'dot-' + slide.id" @click="currentSlide = index"
                    class="w-3 h-3 rounded-full focus:outline-none transition-colors duration-300"
                    :class="{ 'bg-white': currentSlide === index, 'bg-gray-400': currentSlide !== index }">
                </button>
            </div>

            <!-- Text Overlay -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="text-center">
                    <h2 class="text-4xl md:text-6xl font-bold text-white mb-4">Welcome to DoughHeaven</h2>
                    <p class="text-xl text-white mb-8">Experience Heavenly Donuts & Sweet Delights</p>
                    <a href="menu.html"
                        class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition duration-300 inline-block shadow-lg pointer-events-auto">View
                        Our Menu</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Favorite Menu Section -->
    <section class="py-16" style="background-color: #faeee7">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Recommended Menu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our most beloved donuts that keep our customers coming back for
                    more</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($favoriteMenus as $menu)
                    <div class="rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105"
                        style="background-color: #fffffe">
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_produk }}"
                            class="w-full h-80 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $menu->nama_produk }}</h3>
                            <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($menu->deskripsi, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-pink-600 font-bold">Rp
                                    {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                <a href="{{ route('produk.show', $menu->id) }}"
                                    class="text-pink-600 hover:text-pink-800">View Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-3 text-gray-500">Belum ada menu rekomendasi.</p>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href=""
                    class="bg-pink-600 text-white px-6 py-3 rounded-full hover:bg-pink-700 transition duration-300 inline-block shadow-md">See
                    Full Menu</a>
            </div>
        </div>
    </section>


    <!-- Story Section -->
    <section class="py-16" style="background-color: #fffffe;">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Our Story" class="rounded-lg shadow-xl">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Sweet Story</h2>
                    <p class="text-gray-600 mb-6">Founded in 2020, DoughHeaven began with a simple mission: to create the
                        most delicious, handcrafted donuts using only premium ingredients and traditional baking techniques.
                    </p>
                    <p class="text-gray-600 mb-6">What started as a small family operation has grown into a beloved local
                        institution, but our commitment to quality and creativity has never wavered.</p>
                    <a href="story.html" class="text-pink-600 font-bold hover:text-pink-800 inline-flex items-center">
                        Read Our Full Story
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="py-16" style="background-color: #fffffe;">
        <div class="container mx-auto px-20">
            <h2 class="text-3xl font-bold text-center mb-12">Current Promotions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform"
                    style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold mb-4">Buy 6 Get 2 Free</h3>
                    <p class="mb-4" style="color: #594a4e;">Purchase any 6 donuts and get 2 classic glazed donuts
                        absolutely free! Perfect for sharing with friends and family.</p>
                    <p class="text-red-800 font-bold">Valid until: June 30, 2024</p>
                </div>
                <div class="rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform"
                    style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold mb-4">Happy Hour: 20% Off</h3>
                    <p class="mb-4" style="color: #594a4e;">Visit us between 3-5pm on weekdays and enjoy 20% off on all
                        donuts and beverages. A perfect afternoon treat!</p>
                    <p class="text-red-800 font-bold">Valid until: July 15, 2024</p>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="promos.html"
                    class="bg-pink-600 text-white px-6 py-3 rounded-full hover:bg-pink-700 transition duration-300 inline-block shadow-md">View
                    All Promos</a>
            </div>
        </div>
    </section>

    <!-- Ambiance Section -->
    <section class="py-16" style="background-color: #faeee7;">
        <div class="container mx-auto px-20">
            <h2 class="text-3xl font-bold text-center mb-12">Restaurant Ambiance</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative overflow-hidden rounded-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Interior"
                        class="w-200 h-200 object-cover transform hover:scale-110 transition-transform duration-500">
                </div>
                <div class="relative overflow-hidden rounded-lg aspect-square">
                    <img src="https://plus.unsplash.com/premium_photo-1672846027103-a50797886f99?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="DoughHeaven Display"
                        class="w-ful h-full object-cover transform hover:scale-110 transition-transform duration-500">
                </div>
                <div class="relative overflow-hidden rounded-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1556745753-b2904692b3cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Seating"
                        class="w-200 h-200 object-cover transform hover:scale-110 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16" style="background-color: #faeee7;">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Don't just take our word for it - hear from our satisfied
                    customers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"The best donuts I've ever had! The Classic Glazed is perfection,
                        and the staff is always friendly."</p>
                    <p class="font-semibold">- Sarah Johnson</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"DoughHeaven's donuts are worth every calorie! My kids love the
                        Chocolate Heaven, and I can't resist the Strawberry Bliss."</p>
                    <p class="font-semibold">- Michael Thompson</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"I ordered a dozen for my office, and they were gone in minutes!
                        Everyone keeps asking when I'll bring more."</p>
                    <p class="font-semibold">- Emily Rodriguez</p>
                </div>
            </div>
        </div>
    </section>
@endsection
