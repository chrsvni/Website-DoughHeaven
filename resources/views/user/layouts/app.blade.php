<!DOCTYPE html>
<html lang="id">

<head>
    @include('user.partials.head')
</head>

<body class="bg-gray-50">
    <div id="app" v-cloak>
        <style>
            body {
                font-family: 'Poppins', 'Helvetica', 'Arial', sans-serif;
            }

            /* Add Google Fonts link in the head section */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

            .promo-card {
                transition: all 0.3s ease;
            }

            .promo-card:hover {
                transform: translateY(-10px);
            }

            .flash-sale-slide {
                display: none;
                animation: fadeEffect 1s;
            }

            .flash-sale-slide.active {
                display: block;
            }

            @keyframes fadeEffect {
                from {opacity: 0.7;}
                to {opacity: 1;}
            }

            [v-cloak] { display: none; }

            .blog-card:hover .blog-image {
                transform: scale(1.05);
            }

            .category-tab.active {
                border-bottom-color: #ec4899;
                color: #ec4899;
                font-weight: 600;
            }

            /* Sticky Category Filter Bar */
            .sticky-filter-bar {
                position: -webkit-sticky !important;
                position: sticky !important;
                top: 64px !important;
                z-index: 45 !important;
                background-color: #ffffff !important;
                background: #ffffff !important;
                border-bottom: 1px solid #fce7e7 !important;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
            }

            /* Cross-browser Scrollbar Hiding */
            .no-scrollbar::-webkit-scrollbar {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }
            .no-scrollbar {
                -ms-overflow-style: none !important;
                scrollbar-width: none !important;
            }
        </style>

        <!-- Navigation -->
        @include('user.partials.navbar')

        <!-- Main content -->
        @yield('content')

        <!-- Footer -->
        @include('user.partials.footer')
    </div>

    <script>
        const {
            createApp,
            ref
        } = Vue;
        createApp({

            setup() {
                const mobileMenuOpen = ref(false);
                const form = ref({
                    name: '',
                    email: '',
                    message: ''
                });

                // Hero Slideshow
                const heroSlides = ref([{
                        id: 1,
                        type: 'image',
                        src: 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        alt: 'Delicious Donuts'
                    },
                    {
                        id: 2,
                        type: 'video',
                        src: '/video/video-iklan.mp4',
                        alt: 'Donut Making Video'
                    },
                    {
                        id: 3,
                        type: 'image',
                        src: 'https://images.unsplash.com/photo-1551024601-bec78aea704b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        alt: 'Glazed Donuts'
                    }
                ]);
                const currentSlide = ref(0);

                const nextSlide = () => {
                    currentSlide.value = (currentSlide.value + 1) % heroSlides.value.length;
                };
                const prevSlide = () => {
                    currentSlide.value = (currentSlide.value - 1 + heroSlides.value.length) % heroSlides.value
                        .length;
                };

                // Flash Sale Slider Controls
                const flashSaleSlide = ref(0);
                const totalFlashSales = ref({{ isset($featuredPromos) ? $featuredPromos->count() : 1 }});

                const nextFlashSale = () => {
                    if (totalFlashSales.value > 1) {
                        flashSaleSlide.value = (flashSaleSlide.value + 1) % totalFlashSales.value;
                    }
                };

                const prevFlashSale = () => {
                    if (totalFlashSales.value > 1) {
                        flashSaleSlide.value = (flashSaleSlide.value - 1 + totalFlashSales.value) % totalFlashSales.value;
                    }
                };

                const setFlashSale = (idx) => {
                    flashSaleSlide.value = idx;
                };

                if (totalFlashSales.value > 1) {
                    setInterval(() => {
                        nextFlashSale();
                    }, 7000);
                }

                const toggleMobileMenu = () => {
                    mobileMenuOpen.value = !mobileMenuOpen.value;
                };

                const closeMenu = () => {
                    mobileMenuOpen.value = false;
                };

                return {
                    mobileMenuOpen,
                    form,
                    toggleMobileMenu,
                    closeMenu,
                    heroSlides,
                    currentSlide,
                    nextSlide,
                    prevSlide,
                    flashSaleSlide,
                    totalFlashSales,
                    nextFlashSale,
                    prevFlashSale,
                    setFlashSale
                };
            }
        }).mount('#app');
    </script>
</body>

</html>
