@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Tambah Pengguna / Staf Baru</h2>
            <p>Buat akun login baru untuk karyawan atau staf administrator toko DoughHeaven.</p>
        </div>
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                <i class="bi bi-arrow-left mr-1"></i> Kembali ke Daftar Pengguna
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Form Tambah User (Kolom Utama) -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="card-title font-weight-bold text-dark mb-0" style="font-size: 16px;">
                        <i class="bi bi-person-plus-fill mr-2" style="color: #e75b7a;"></i>
                        Formulir Akun Pengguna Baru
                    </div>
                    <span class="badge-pill-custom badge-info-soft" style="font-size: 11.5px;">Super Admin Only</span>
                </div>

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        <!-- Nama Lengkap -->
                        <div class="form-group mb-3 p-0">
                            <label for="name" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Nama Lengkap Karyawan / Staf <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" required autofocus>
                            </div>
                            @error('name')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3 p-0">
                            <label for="email" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Alamat Email Login <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                </div>
                                <input type="email" name="email" id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}" placeholder="karyawan@doughheaven.com" required>
                            </div>
                            @error('email')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                            <small class="text-muted d-block mt-1">Email ini akan digunakan untuk autentikasi masuk ke panel admin.</small>
                        </div>

                        <div class="row">
                            <!-- Hak Akses (Role) -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="role" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Hak Akses (Role) <span class="text-danger">*</span>
                                    </label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="admin" {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>
                                            Staff Admin (Pengelola Toko)
                                        </option>
                                        <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>
                                            Super Administrator (Akses Penuh)
                                        </option>
                                    </select>
                                    @error('role')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Akun -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="status" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Status Keaktifan <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif (Bisa Langsung Login)</option>
                                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif (Ditangguhkan)</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-3" style="border-top: 1px dashed #e2e8f0;">

                        <!-- Password -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="password" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Kata Sandi Awal <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                                        </div>
                                        <input type="password" name="password" id="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Minimal 8 karakter" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', this)" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #cbd5e1;">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="password_confirmation" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Konfirmasi Kata Sandi <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-check2-square"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" id="password_confirmation" 
                                            class="form-control" placeholder="Ulangi kata sandi" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation', this)" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #cbd5e1;">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action d-flex justify-content-between align-items-center">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-dh-primary">
                            <i class="bi bi-check-circle-fill mr-1.5"></i> Simpan & Buat Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Panduan Hak Akses -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-3" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="font-weight-bold text-dark mb-3 d-flex align-items-center">
                        <i class="bi bi-info-circle-fill mr-2" style="color: #e75b7a;"></i>
                        Panduan Peran Akun
                    </h5>

                    <div class="mb-3 p-3 rounded-lg" style="background: #fdf2f8; border-left: 4px solid #be185d;">
                        <h6 class="font-weight-bold text-dark mb-1" style="font-size: 13px;">
                            👑 Super Administrator
                        </h6>
                        <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.45;">
                            Memiliki kekuasaan penuh untuk mengelola katalog, promosi, artikel, moderasi ulasan, serta <strong>menambah, mengubah, dan menghapus akun staf</strong>.
                        </p>
                    </div>

                    <div class="p-3 rounded-lg" style="background: #eff6ff; border-left: 4px solid #2563eb;">
                        <h6 class="font-weight-bold text-dark mb-1" style="font-size: 13px;">
                            💼 Staff Admin Toko
                        </h6>
                        <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.45;">
                            Dikhususkan untuk karyawan operasional. Dapat mengelola produk, promo, blog, dan ulasan, namun <strong>tidak memiliki akses ke menu kelola akun</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, btn) {
        var input = document.getElementById(inputId);
        var icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endsection
