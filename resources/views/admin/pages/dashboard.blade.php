@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Dashboard Toko</h2>
            <p>Selamat datang kembali! Berikut adalah ringkasan katalog dan aktivitas DoughHeaven.</p>
        </div>
        <div class="d-flex align-items-center">
            <span class="badge badge-pill-custom" style="background: #ffffff; border: 1px solid #e2e8f0; color: #475569; font-size: 13px; padding: 8px 16px;">
                <i class="bi bi-calendar3 mr-2" style="color: #e75b7a;"></i>
                {{ date('l, d F Y') }}
            </span>
        </div>
    </div>

    <!-- 4 Modern Stat Cards -->
    <div class="row">
        <!-- Total Produk -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="stat-card gradient-orange">
                <div class="stat-header">
                    <span class="stat-label">Total Produk</span>
                    <div class="stat-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($jumlahProduk) }}</div>
                <div class="stat-footer">
                    <span>Menu Aktif</span>
                    <a href="{{ route('produk.index') }}">
                        Kelola Produk <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Promosi Aktif -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="stat-card gradient-green">
                <div class="stat-header">
                    <span class="stat-label">Promosi Aktif</span>
                    <div class="stat-icon">
                        <i class="bi bi-percent"></i>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($jumlahPromosi) }}</div>
                <div class="stat-footer">
                    <span>Penawaran Spesial</span>
                    <a href="{{ route('promosi.index') }}">
                        Lihat Promo <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Artikel Blog -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="stat-card gradient-blue">
                <div class="stat-header">
                    <span class="stat-label">Artikel Blog</span>
                    <div class="stat-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($jumlahBlog) }}</div>
                <div class="stat-footer">
                    <span>Konten & Cerita</span>
                    <a href="{{ route('blog.index') }}">
                        Kelola Blog <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Ulasan -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="stat-card gradient-pink">
                <div class="stat-header">
                    <span class="stat-label">Total Ulasan</span>
                    <div class="stat-icon">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>
                </div>
                <div class="stat-value">{{ number_format($jumlahUlasan) }}</div>
                <div class="stat-footer">
                    <span>Kepuasan Pelanggan</span>
                    <a href="{{ route('ulasan.index') }}">
                        Baca Ulasan <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->isSuperAdmin())
    <!-- Section Khusus Super Administrator -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; background: linear-gradient(135deg, #fff5f7 0%, #ffffff 100%); border-left: 5px solid #be185d !important;">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <span class="badge badge-pill-custom" style="background: #fdf2f8; color: #be185d; font-size: 11px; padding: 4px 10px; font-weight: 700;">
                                <i class="bi bi-shield-fill-check mr-1"></i> PANEL SUPER ADMINISTRATOR
                            </span>
                            <h4 class="font-weight-bold text-dark mt-2 mb-1" style="font-size: 18px;">
                                Pusat Kendali Akses & Pelanggan DoughHeaven
                            </h4>
                            <p class="text-muted mb-0" style="font-size: 13.5px;">
                                Kelola hak akses akun staf karyawan serta kelola basis data audiens pelanggan newsletter dan siaran email berkala.
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <a href="{{ route('users.index') }}" class="btn mr-2 mb-2 mb-sm-0" style="background: #be185d; color: #ffffff; border-radius: 10px; font-weight: 600; font-size: 13px; padding: 9px 18px; box-shadow: 0 4px 12px rgba(190, 24, 93, 0.2);">
                                <i class="bi bi-people-fill mr-1.5"></i> Kelola Pengguna ({{ $jumlahPengguna }})
                            </a>
                            <a href="{{ route('subscribers.index') }}" class="btn" style="background: #e75b7a; color: #ffffff; border-radius: 10px; font-weight: 600; font-size: 13px; padding: 9px 18px; box-shadow: 0 4px 12px rgba(231, 91, 122, 0.2);">
                                <i class="bi bi-envelope-heart-fill mr-1.5"></i> Kelola Pelanggan ({{ $jumlahPelanggan }})
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Quick Actions Row -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Aksi Cepat Manajemen Toko</h5>
                        <small class="text-muted">Pintasan praktis untuk memperbarui konten website DoughHeaven</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Tambah Produk -->
                        <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                            <a href="{{ route('produk.create') }}" class="quick-action-btn">
                                <div class="icon-box" style="background: #fff7ed; color: #ea580c;">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </div>
                                <div>
                                    <div style="font-size: 14.5px;">Tambah Produk</div>
                                    <small class="text-muted font-weight-normal">Donat & roti baru</small>
                                </div>
                            </a>
                        </div>

                        <!-- Tambah Kategori -->
                        <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                            <a href="{{ route('kategori.create') }}" class="quick-action-btn">
                                <div class="icon-box" style="background: #eff6ff; color: #2563eb;">
                                    <i class="bi bi-tags-fill"></i>
                                </div>
                                <div>
                                    <div style="font-size: 14.5px;">Tambah Kategori</div>
                                    <small class="text-muted font-weight-normal">Kelompokkan menu</small>
                                </div>
                            </a>
                        </div>

                        <!-- Buat Promosi -->
                        <div class="col-lg-3 col-sm-6 mb-3 mb-sm-0">
                            <a href="{{ route('promosi.create') }}" class="quick-action-btn">
                                <div class="icon-box" style="background: #ecfdf5; color: #059669;">
                                    <i class="bi bi-megaphone-fill"></i>
                                </div>
                                <div>
                                    <div style="font-size: 14.5px;">Buat Promosi</div>
                                    <small class="text-muted font-weight-normal">Diskon & voucher</small>
                                </div>
                            </a>
                        </div>

                        <!-- Tulis Blog -->
                        <div class="col-lg-3 col-sm-6">
                            <a href="{{ route('blog.create') }}" class="quick-action-btn">
                                <div class="icon-box" style="background: #fdf2f8; color: #db2777;">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div>
                                    <div style="font-size: 14.5px;">Tulis Blog</div>
                                    <small class="text-muted font-weight-normal">Artikel & resep manis</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toko Status & Informasi Banner -->
    <div class="row">
        <!-- Info Toko Card -->
        <div class="col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <i class="bi bi-shop mr-2" style="color: #e75b7a;"></i>
                        Status Toko Online DoughHeaven
                    </h5>
                    <span class="badge-pill-custom badge-success-soft">
                        <i class="bi bi-check-circle-fill"></i> Toko Aktif & Live
                    </span>
                </div>
                <div class="card-body">
                    <p class="text-muted" style="line-height: 1.6;">
                        Website DoughHeaven Anda saat ini aktif dan dapat diakses oleh publik. Anda dapat mengontrol semua katalog produk, kategori rasa donat, promo banner, dan artikel informatif langsung melalui panel ini.
                    </p>
                    <div class="p-3 rounded-lg" style="background: #fff0f3; border-left: 4px solid #e75b7a;">
                        <h6 class="font-weight-bold mb-1" style="color: #d44368;">
                            <i class="bi bi-lightbulb-fill mr-1"></i> Tips Pemasaran Digital DoughHeaven:
                        </h6>
                        <ul class="mb-0 pl-3 text-muted" style="font-size: 13.5px;">
                            <li>Pastikan setiap produk memiliki foto yang cerah dan menggugah selera untuk menarik pembeli.</li>
                            <li>Gunakan fitur <strong>Promosi</strong> saat ada promo akhir pekan atau diskon paket bundling 6 donat.</li>
                            <li>Tulis artikel menarik di menu <strong>Blog</strong> tentang bahan premium yang digunakan toko Anda.</li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-dh-primary">
                            <i class="bi bi-box-arrow-up-right mr-1"></i> Buka Website DoughHeaven
                        </a>
                        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary ml-2" style="border-radius: 10px; font-weight: 600; padding: 9px 18px;">
                            Lihat Semua Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Akun & Sistem Card -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="bi bi-shield-check mr-2" style="color: #10b981;"></i>
                        Informasi Akun Admin
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="admin-user-avatar mr-3" style="width: 48px; height: 48px; font-size: 20px;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-weight-bold" style="font-size: 15px; color: #1e293b;">
                                {{ Auth::user()->name }}
                            </div>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                            <div>
                                <span class="badge badge-pill-custom mt-1" style="{{ Auth::user()->isSuperAdmin() ? 'background: #fdf2f8; color: #be185d;' : 'background: #e0f2fe; color: #0284c7;' }} font-weight: 700; font-size: 11.5px; padding: 4px 10px;">
                                    {{ Auth::user()->role_label }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9;">
                    <div class="d-flex justify-content-between py-2 text-muted" style="font-size: 13px;">
                        <span>Peran Akses</span>
                        <strong class="text-dark">{{ Auth::user()->isSuperAdmin() ? 'Super Administrator (Full Hak Akses)' : 'Staff Admin Toko' }}</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 text-muted" style="font-size: 13px;">
                        <span>Status Sistem</span>
                        <strong class="text-success"><i class="bi bi-circle-fill" style="font-size: 8px;"></i> Terhubung (MySQL)</strong>
                    </div>
                    <div class="d-flex justify-content-between py-2 text-muted" style="font-size: 13px;">
                        <span>Versi Aplikasi</span>
                        <strong class="text-dark">Laravel 11 &bull; v2.0</strong>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-block btn-outline-primary" style="border-radius: 10px; font-weight: 600;">
                            <i class="bi bi-gear-fill mr-1"></i> Edit Profil & Sandi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
