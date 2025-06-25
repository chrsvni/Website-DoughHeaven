<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Models\Produk;
use App\Http\Controllers\HalblogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/halblogs', [HalblogController::class, 'index'])->name('halblog.index');
Route::get('/halblog/{slug}', [HalblogController::class, 'detail'])->name('halblog.detail');

Route::get('/story', function () {
    return view('user.pages.story');
});

Route::get('/menu', [MenuController::class, 'menu'])->name('menu');


Route::get('/promos', function () {
    return view('user.pages.promos');
});

Route::get('/contact', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('promosi', PromosiController::class);
    Route::resource('blog', BlogController::class);
    Route::post('blog/upload-image', [BlogController::class, 'uploadImage'])->name('blog.upload-image');
    Route::get('/admin/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::delete('/admin/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});

require __DIR__ . '/auth.php';
