<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DoughHeaven') }}</title>

        <link rel="icon" type="image/png" href="https://api.dicebear.com/7.x/shapes/svg?seed=doughheaven" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Poppins', 'Helvetica', 'Arial', sans-serif;
            }
        </style>
    </head>
    <body class="text-gray-900 antialiased" style="background-color: #faeee7;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-8 sm:pt-0 px-4 relative overflow-hidden">
            <!-- Decorative Ambient Orbs -->
            <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-pink-200/50 filter blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-yellow-200/40 filter blur-3xl pointer-events-none"></div>

            <div class="relative z-10 mb-4">
                <a href="/" class="hover:opacity-95 transition">
                    <x-application-logo />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-4 px-8 py-8 bg-white shadow-2xl overflow-hidden rounded-3xl border border-pink-100 relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
