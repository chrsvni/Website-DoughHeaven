@extends('user.layouts.app')

@section('title', 'Berhenti Berlangganan | DoughHeaven')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-20 px-4" style="background-color: #faeee7;">
    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 text-center shadow-xl border border-pink-100">
        <div class="w-20 h-20 bg-pink-50 text-pink-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-6 shadow-inner">
            🍩
        </div>
        
        <h1 class="text-2xl font-black text-gray-900 mb-2">
            Berhasil Berhenti Berlangganan
        </h1>

        <p class="text-gray-600 text-sm mb-6 leading-relaxed">
            Email <strong>{{ $email ?? 'Anda' }}</strong> telah dihapus dari daftar penerima newsletter berkala DoughHeaven. Kamu tidak akan menerima email promosi lagi dari kami.
        </p>

        <div class="p-4 bg-gray-50 rounded-2xl text-xs text-gray-500 mb-8 border border-gray-100">
            Kami akan merindukanmu! Jika suatu saat kamu ingin mendapatkan info donat baru dan voucher rahasia lagi, kamu selalu bisa mendaftar kembali di halaman Blog kami.
        </div>

        <div class="space-y-3">
            <a href="{{ route('home') }}" class="block w-full py-3.5 px-6 rounded-full bg-pink-600 hover:bg-pink-700 text-white font-bold text-sm shadow-md transition">
                Kembali ke Beranda DoughHeaven
            </a>
            <a href="{{ route('menu') }}" class="block w-full py-2.5 px-6 rounded-full text-pink-600 hover:bg-pink-50 font-semibold text-xs transition">
                Lihat Menu Donat Hari Ini &rarr;
            </a>
        </div>
    </div>
</div>
@endsection
