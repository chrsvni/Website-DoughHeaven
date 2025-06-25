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
                    prevSlide
                };
            }
        }).mount('#app');
    </script>
</body>

</html>
