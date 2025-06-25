<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-pink-600">DoughHeaven</h1>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-700 hover:text-pink-600 {{ Request::is('/') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Home</a>
                <a href="/story" class="text-gray-700 hover:text-pink-600 {{ Request::is('story') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Story</a>
                <a href="/menu" class="text-gray-700 hover:text-pink-600 {{ Request::is('menu') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Menu</a>
                <a href="/promos" class="text-gray-700 hover:text-pink-600 {{ Request::is('promos') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Promos</a>
                <a href="/halblogs" class="text-gray-700 hover:text-pink-600 {{ Request::is('halblogs') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Blog</a>
                <a href="/contact" class="text-gray-700 hover:text-pink-600 {{ Request::is('contact') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Contact</a>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="toggleMobileMenu" class="text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div v-show="mobileMenuOpen" class="md:hidden bg-white">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('/') ? 'bg-pink-50' : '' }}">Home</a>
            <a href="/story" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('story') ? 'bg-pink-50' : '' }}">Story</a>
            <a href="/menu" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('menu') ? 'bg-pink-50' : '' }}">Menu</a>
            <a href="/promos" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('promos') ? 'bg-pink-50' : '' }}">Promos</a>
            <a href="/halblogs" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('halblogs') ? 'bg-pink-50' : '' }}">Blog</a>
            <a href="/contact" class="block px-3 py-2 text-gray-700 hover:text-pink-600 {{ Request::is('contact') ? 'bg-pink-50' : '' }}">Contact</a>
        </div>
    </div>
</nav>
