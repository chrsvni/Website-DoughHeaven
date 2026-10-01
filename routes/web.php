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
use App\Http\Controllers\UserController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/halblogs', [HalblogController::class, 'index'])->name('halblog.index');
Route::get('/halblog/{slug}', [HalblogController::class, 'detail'])->name('halblog.detail');

Route::get('/story', function () {
    return view('user.pages.story');
});

Route::get('/menu', [MenuController::class, 'menu'])->name('menu');


Route::get('/promos', [PromosiController::class, 'publicPromos'])->name('promos');

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
    Route::patch('/admin/ulasan/{id}/toggle', [UlasanController::class, 'toggleTampilkan'])->name('ulasan.toggle');
    Route::delete('/admin/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');

    // Menu Khusus Super Admin: Manajemen Pengguna & Karyawan
    Route::middleware('super_admin')->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::patch('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
        Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__ . '/auth.php';
