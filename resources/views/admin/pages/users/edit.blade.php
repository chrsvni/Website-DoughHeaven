@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Edit Data Pengguna: {{ $user->name }}</h2>
            <p>Perbarui informasi akun, hak akses role, status keaktifan, atau reset kata sandi akun.</p>
        </div>
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                <i class="bi bi-arrow-left mr-1"></i> Kembali ke Daftar Pengguna
            </a>
        </div>
    </div>

    <!-- Alert Error Jika Ada -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #ef4444;">
            <i class="bi bi-exclamation-triangle-fill mr-2" style="font-size: 16px;"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Form Edit User (Kolom Utama) -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="card-title font-weight-bold text-dark mb-0" style="font-size: 16px;">
                        <i class="bi bi-pencil-square mr-2" style="color: #e75b7a;"></i>
                        Formulir Edit Akun Pengguna
                    </div>
                    @if ($user->id === Auth::id())
                        <span class="badge badge-pill badge-primary" style="font-size: 11.5px; padding: 4px 10px;">Akun Anda Sendiri</span>
                    @else
                        <span class="badge-pill-custom badge-info-soft" style="font-size: 11.5px;">ID: #{{ $user->id }}</span>
                    @endif
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4">
                        <!-- Nama Lengkap -->
                        <div class="form-group mb-3 p-0">
                            <label for="name" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                </div>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name', $user->name) }}" required>
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
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            @error('email')
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Hak Akses (Role) -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-0">
                                    <label for="role" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Hak Akses (Role) <span class="text-danger">*</span>
                                    </label>
                                    @if ($user->id === Auth::id())
                                        <input type="hidden" name="role" value="super_admin">
                                        <select class="form-control" disabled style="background-color: #f1f5f9; cursor: not-allowed;">
                                            <option selected>Super Administrator (Terkunci)</option>
                                        </select>
                                        <small class="text-muted d-block mt-1">Anda tidak dapat menurunkan hak akses akun sendiri.</small>
                                    @else
                                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                                Staff Admin (Pengelola Toko)
                                            </option>
                                            <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>
                                                Super Administrator (Akses Penuh)
                                            </option>
                                        </select>
                                    @endif
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
                                    @if ($user->id === Auth::id())
                                        <input type="hidden" name="status" value="aktif">
                                        <select class="form-control" disabled style="background-color: #f1f5f9; cursor: not-allowed;">
                                            <option selected>Aktif (Terkunci)</option>
                                        </select>
                                        <small class="text-muted d-block mt-1">Akun yang sedang aktif digunakan tidak dapat dinonaktifkan.</small>
                                    @else
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                            <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="nonaktif" {{ old('status', $user->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif (Ditangguhkan)</option>
                                        </select>
                                    @endif
                                    @error('status')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-3" style="border-top: 1px dashed #e2e8f0;">

                        <!-- Reset Password (Opsional) -->
                        <div>
                            <h6 class="font-weight-bold text-dark mb-1" style="font-size: 14px;">
                                <i class="bi bi-shield-lock mr-1" style="color: #e75b7a;"></i> Reset Kata Sandi (Opsional)
                            </h6>
                            <p class="text-muted mb-3" style="font-size: 12.5px;">
                                Kosongkan kolom kata sandi di bawah jika Anda tidak ingin mengubah atau me-reset kata sandi pengguna ini.
                            </p>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group mb-0 p-0">
                                        <label for="password" class="font-weight-bold text-dark" style="font-size: 13px;">
                                            Kata Sandi Baru
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" 
                                                class="form-control @error('password') is-invalid @enderror" 
                                                placeholder="Kosongkan jika tidak diubah">
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
                                        <label for="password_confirmation" class="font-weight-bold text-dark" style="font-size: 13px;">
                                            Konfirmasi Kata Sandi Baru
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="bi bi-check2-square"></i></span>
                                            </div>
                                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                                class="form-control" placeholder="Ulangi kata sandi baru">
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
                    </div>

                    <div class="card-action d-flex justify-content-between align-items-center">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-dh-primary">
                            <i class="bi bi-check-circle-fill mr-1.5"></i> Perbarui Data Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Detail Ringkas Akun -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-3" style="border-radius: 16px;">
                <div class="card-body p-4 text-center">
                    <div style="width: 76px; height: 76px; border-radius: 50%; background: {{ $user->isSuperAdmin() ? 'linear-gradient(135deg, #be185d 0%, #db2777 100%)' : 'linear-gradient(135deg, #e75b7a 0%, #ff8da1 100%)' }}; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 800; margin: 0 auto 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.1);">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h5 class="font-weight-bold text-dark mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-2" style="font-size: 13px;">{{ $user->email }}</p>

                    @if ($user->isSuperAdmin())
                        <span class="badge-pill-custom" style="background: #fdf2f8; color: #be185d; border: 1px solid #fbcfe8; font-size: 12px; padding: 5px 14px;">
                            <i class="bi bi-shield-fill-check mr-1"></i> Super Administrator
                        </span>
                    @else
                        <span class="badge-pill-custom badge-info-soft" style="font-size: 12px; padding: 5px 14px;">
                            <i class="bi bi-person-badge mr-1"></i> Staff Admin
                        </span>
                    @endif

                    <div class="border-top mt-3 pt-3 text-left" style="font-size: 12.5px;">
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">ID Pengguna:</span>
                            <span class="font-weight-bold text-dark">#{{ $user->id }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">Tanggal Bergabung:</span>
                            <span class="font-weight-bold text-dark">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">Update Terakhir:</span>
                            <span class="font-weight-bold text-dark">{{ $user->updated_at ? $user->updated_at->diffForHumans() : '-' }}</span>
                        </div>
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
