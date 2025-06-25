@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Dashboard</h2>
                <p class="text-muted mb-0">Selamat datang kembali! Berikut adalah ringkasan aktivitas Anda.</p>
            </div>
            <div class="text-muted">
                <i class="la la-calendar"></i>
                {{ date('d M Y') }}
            </div>
        </div>

        <!-- Stats Cards Row -->
        <div class="row g-4 mb-5">
            <!-- Produk Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 card-hover bg-gradient-warning">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jumlahProduk) }}</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white-50 mb-0 fw-medium">Total Produk</h6>
                            <span class="badge bg-dark bg-opacity-75 text-white">
                                <i class="la la-arrow-up"></i> 12%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promosi Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 card-hover bg-gradient-success">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jumlahPromosi) }}</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white-50 mb-0 fw-medium">Promosi Aktif</h6>
                            <span class="badge bg-dark bg-opacity-75 text-white">
                                <i class="la la-arrow-up"></i> 8%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 card-hover bg-gradient-info">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jumlahBlog) }}</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white-50 mb-0 fw-medium">Artikel Blog</h6>
                            <span class="badge bg-dark bg-opacity-75 text-white">
                                <i class="la la-arrow-up"></i> 15%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ulasan Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 card-hover bg-gradient-danger">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jumlahUlasan) }}</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white-50 mb-0 fw-medium">Total Ulasan</h6>
                            <span class="badge bg-dark bg-opacity-75 text-white">
                                <i class="la la-arrow-up"></i> 5%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Analytics Section -->
        <div class="row g-4">
            <!-- Quick Actions -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0 fw-bold">Aksi Cepat</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('kategori.create') }}"
                                    class="btn btn-outline-warning w-100 py-3 text-start">
                                    <i class="la la-tags me-2"></i>
                                    Tambah Kategori
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('produk.create') }}"
                                    class="btn btn-outline-primary w-100 py-3 text-start">
                                    <i class="la la-plus-circle me-2"></i>
                                    Tambah Produk
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('promosi.create') }}"
                                    class="btn btn-outline-success w-100 py-3 text-start">
                                    <i class="la la-percent me-2"></i>
                                    Buat Promosi
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('blog.create') }}" class="btn btn-outline-info w-100 py-3 text-start">
                                    <i class="la la-edit me-2"></i>
                                    Tulis Blog
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #ffc107 0%, #ff8c42 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        .activity-icon {
            width: 2rem;
            height: 2rem;
            font-size: 0.75rem;
        }

        .display-4 {
            font-size: 2.5rem;
            font-weight: 700;
        }
    </style>
@endsection
