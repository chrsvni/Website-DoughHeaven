<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-2 group">
                    <span class="text-2xl transform group-hover:rotate-12 transition duration-300">🍩</span>
                    <h1 class="text-2xl font-bold text-pink-600 group-hover:text-pink-700 transition">DoughHeaven</h1>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-7">
                <a href="/" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('/') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Home</a>
                <a href="/story" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('story') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Story</a>
                <a href="/menu" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('menu') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Menu</a>
                <a href="/promos" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('promos') ? 'text-pink-600 border-b-2 border-pink-600' : '' }}">Promos</a>
                <a href="/halblogs" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('halblog*') ? 'text-pink-600 border-b-2 border-pink-600 font-bold' : '' }}">Blog</a>
                <a href="/contact" class="text-gray-700 hover:text-pink-600 font-medium transition {{ Request::is('contact') ? 'text-pink-600 border-b-2 border-pink-600 font-bold' : '' }}">Contact</a>
                
                @auth
                    <a href="{{ route('dashboard.index') }}" class="bg-pink-600 text-white px-4 py-2 rounded-full hover:bg-pink-700 transition text-sm font-semibold shadow-md flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span>Dashboard</span>
                    </a>
                @endauth
            </div>
            <div class="md:hidden flex items-center">
                <button @click="toggleMobileMenu" class="text-gray-700 p-2 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div v-show="mobileMenuOpen" class="md:hidden bg-white border-t border-gray-100">
        <div class="px-3 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('/') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Home</a>
            <a href="/story" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('story') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Story</a>
            <a href="/menu" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('menu') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Menu</a>
            <a href="/promos" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('promos') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Promos</a>
            <a href="/halblogs" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('halblog*') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Blog</a>
            <a href="/contact" class="block px-3 py-2 rounded-lg text-gray-700 hover:text-pink-600 {{ Request::is('contact') ? 'bg-pink-50 text-pink-600 font-semibold' : '' }}">Contact</a>
            
            @auth
                <div class="pt-2 border-t border-gray-100">
                    <a href="{{ route('dashboard.index') }}" class="block px-3 py-2 rounded-lg bg-pink-600 text-white font-semibold text-center">Dashboard</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
