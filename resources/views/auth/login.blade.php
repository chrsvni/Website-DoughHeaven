@extends('user.layouts.app')

@section('title', 'Masuk | DoughHeaven')
@section('meta_description', 'Masuk ke akun DoughHeaven Anda untuk mengelola menu donat, promosi spesial, artikel blog, dan ulasan pelanggan.')
@section('meta_keywords', 'login, masuk, DoughHeaven, admin, donat, bakery')

@section('content')
    <section class="pt-20 pb-16 min-h-screen flex items-center justify-center relative overflow-hidden" style="background-color: #faeee7;">
        <!-- Decorative Ambient Orbs -->
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-pink-200/60 filter blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-yellow-200/50 filter blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/4 w-64 h-64 rounded-full bg-pink-100/40 filter blur-2xl pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border border-pink-100/80">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    
                    <!-- Left Column: Visual Showcase (Bakery / DoughHeaven Theme) -->
                    <div class="lg:col-span-5 relative bg-pink-600 min-h-[260px] lg:min-h-full flex flex-col justify-between p-8 sm:p-10 text-white overflow-hidden">
                        <!-- Background Image with Gradient Overlay -->
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                             alt="Delicious DoughHeaven Donuts"
                             class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-pink-950/95 via-pink-900/80 to-black/40"></div>

                        <!-- Top Brand Pill -->
                        <div class="relative z-10">
                            <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md text-white text-xs font-semibold px-3 py-1.5 rounded-full border border-white/20 shadow-sm">
                                <span>🍩</span> DoughHeaven Bakery
                            </span>
                        </div>

                        <!-- Bottom Content -->
                        <div class="relative z-10 mt-12 lg:mt-0">
                            <h2 class="text-2xl lg:text-3xl font-bold leading-tight mb-3">
                                Where Every Bite Feels Like Heaven
                            </h2>
                            <p class="text-pink-100 text-sm leading-relaxed mb-6">
                                Masuk ke dashboard untuk mengelola menu donat lezat, promo menggoda, dan ulasan pelanggan setia Anda.
                            </p>

                            <!-- Feature Badges -->
                            <div class="space-y-2.5 pt-4 border-t border-white/20 text-xs text-pink-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-pink-500/40 flex items-center justify-center text-white text-xs">✓</span>
                                    <span>Handcrafted Fresh Daily Donuts</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-pink-500/40 flex items-center justify-center text-white text-xs">✓</span>
                                    <span>Premium Ingredients & Glazes</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-pink-500/40 flex items-center justify-center text-white text-xs">✓</span>
                                    <span>Sweet Experience for Everyone</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Login Form -->
                    <div class="lg:col-span-7 p-8 sm:p-10 lg:p-12 flex flex-col justify-center bg-white">
                        <div class="mb-6">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 mb-4 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Selamat Datang!</h1>
                            <p class="text-gray-500 text-sm mt-1">
                                Silakan masukkan email dan kata sandi Anda untuk melanjutkan ke dashboard.
                            </p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        <!-- Validation Errors -->
                        @if (isset($errors) && $errors->any())
                            <div class="mb-6 p-4 rounded-2xl bg-pink-50 border border-pink-200 text-pink-800 text-sm">
                                <div class="flex items-center gap-2 font-semibold mb-1 text-pink-700">
                                    <svg class="w-5 h-5 flex-shrink-0 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span>Gagal Masuk:</span>
                                </div>
                                <ul class="list-disc list-inside text-xs space-y-1 ml-1 text-pink-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-5">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Alamat Email
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           autofocus
                                           autocomplete="username"
                                           placeholder="nama@email.com"
                                           class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200 bg-gray-50 focus:bg-white text-gray-800">
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Kata Sandi
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           placeholder="Masukkan kata sandi Anda"
                                           class="w-full pl-11 pr-11 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200 bg-gray-50 focus:bg-white text-gray-800">
                                    <button type="button"
                                            onclick="togglePasswordVisibility()"
                                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-pink-600 focus:outline-none transition">
                                        <svg id="eye-icon-open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-icon-closed" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me and Forgot Password -->
                            <div class="flex items-center justify-between pt-1">
                                <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                                    <input id="remember_me"
                                           type="checkbox"
                                           name="remember"
                                           class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500 transition cursor-pointer">
                                    <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-sm font-medium text-pink-600 hover:text-pink-700 hover:underline transition">
                                        Lupa kata sandi?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit"
                                        class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg shadow-pink-500/25 hover:shadow-pink-500/40 transition duration-300 flex items-center justify-center gap-2 transform hover:-translate-y-0.5 active:translate-y-0">
                                    <span>Masuk ke Dashboard</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <!-- Back to Home Link -->
                        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                            <a href="{{ route('home') }}"
                               class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-pink-600 font-medium transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span>Kembali ke Beranda DoughHeaven</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Password visibility toggle script -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-icon-open');
            const eyeClosed = document.getElementById('eye-icon-closed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>
@endsection
