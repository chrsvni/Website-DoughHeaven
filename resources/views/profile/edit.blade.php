@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Pengaturan Profil Saya</h2>
            <p>Kelola data akun, informasi kontak, dan keamanan kata sandi administrator DoughHeaven.</p>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                <i class="bi bi-arrow-left mr-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Alert Notifikasi Status -->
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #10b981;">
            <i class="bi bi-check-circle-fill mr-2" style="font-size: 16px;"></i>
            <strong>Sukses!</strong> Informasi profil Anda telah berhasil diperbarui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #10b981;">
            <i class="bi bi-shield-check mr-2" style="font-size: 16px;"></i>
            <strong>Sukses!</strong> Kata sandi akun Anda berhasil diperbarui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Kolom Kiri: Kartu Ringkasan Profil -->
        <div class="col-lg-4 col-xl-4 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 16px; overflow: hidden;">
                <!-- Cover Banner -->
                <div class="position-relative" style="background: linear-gradient(135deg, #faeee7 0%, #ffe3ea 100%); height: 95px;">
                    <div style="position: absolute; right: 16px; top: 12px; font-size: 26px; opacity: 0.35;">🍩</div>
                </div>

                <!-- Card Body Profil -->
                <div class="card-body pt-0 px-4 pb-4 text-center position-relative" style="z-index: 2;">
                    <!-- Avatar Lingkaran Utuh (z-index tinggi agar tampil sempurna di atas banner) -->
                    <div class="d-inline-block position-relative mb-2" style="margin-top: -46px; z-index: 5;">
                        <div style="width: 88px; height: 88px; border-radius: 50%; background: linear-gradient(135deg, #e75b7a 0%, #ff8da1 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 34px; font-weight: 800; box-shadow: 0 8px 22px rgba(231, 91, 122, 0.35); border: 4px solid #ffffff;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <span style="position: absolute; bottom: 3px; right: 4px; width: 15px; height: 15px; background: #10b981; border: 2.5px solid #ffffff; border-radius: 50%; display: inline-block;" title="Status: Aktif"></span>
                    </div>

                    <h5 class="font-weight-bold text-dark mb-1" style="font-size: 17px;">{{ $user->name }}</h5>
                    @if ($user->isSuperAdmin())
                        <span class="badge-pill-custom" style="background: #fdf2f8; color: #be185d; border: 1px solid #fbcfe8; font-size: 12px; padding: 5px 14px;">
                            <i class="bi bi-shield-fill-check mr-1"></i> Super Administrator
                        </span>
                    @else
                        <span class="badge-pill-custom badge-info-soft" style="font-size: 12px; padding: 5px 14px;">
                            <i class="bi bi-person-badge mr-1"></i> Staff Admin Toko
                        </span>
                    @endif
                </div>

                <div class="px-3 pb-2">
                    <ul class="list-group list-group-flush border-top" style="font-size: 13px;">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2.5 bg-transparent border-0">
                            <span class="text-muted"><i class="bi bi-calendar3 mr-2 text-primary"></i> Bergabung</span>
                            <span class="font-weight-bold text-dark">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2.5 bg-transparent border-0">
                            <span class="text-muted"><i class="bi bi-clock-history mr-2 text-info"></i> Terakhir Update</span>
                            <span class="font-weight-bold text-dark">{{ $user->updated_at ? $user->updated_at->diffForHumans() : '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2.5 bg-transparent border-0">
                            <span class="text-muted"><i class="bi bi-check-circle mr-2 text-success"></i> Status Akun</span>
                            <span class="badge-pill-custom badge-success-soft" style="font-size: 11px;">Aktif</span>
                        </li>
                    </ul>
                </div>

                <div class="p-3 m-3 rounded-lg" style="background: #fff8f6; border: 1px dashed #f8b4c4;">
                    <div class="d-flex">
                        <i class="bi bi-info-circle-fill mr-2" style="color: #e75b7a; font-size: 16px;"></i>
                        <div>
                            <div class="font-weight-bold text-dark" style="font-size: 12.5px;">Informasi Keamanan</div>
                            <p class="text-muted mb-0 mt-1" style="font-size: 11.5px; line-height: 1.45;">
                                Jaga kerahasiaan kata sandi Anda dan ganti secara berkala untuk menjaga keamanan data toko DoughHeaven.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Formulir Edit Profil & Ganti Password -->
        <div class="col-lg-8 col-xl-8">
            <!-- 1. Formulir Informasi Profil -->
            <div class="card mb-4 shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="card-title font-weight-bold text-dark mb-0" style="font-size: 16px;">
                        <i class="bi bi-person-lines-fill mr-2" style="color: #e75b7a;"></i>
                        Informasi Data Diri
                    </div>
                    <span class="badge-pill-custom badge-info-soft" style="font-size: 11.5px;">Data Akun</span>
                </div>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="card-body p-4">
                        <p class="text-muted mb-4" style="font-size: 13.5px;">
                            Perbarui nama tampilan dan alamat email yang Anda gunakan untuk mengakses dashboard ini.
                        </p>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group p-0 mb-0">
                                    <label for="name" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        </div>
                                        <input type="text" name="name" id="name" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                                            placeholder="Masukkan nama lengkap">
                                    </div>
                                    @error('name')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group p-0 mb-0">
                                    <label for="email" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Alamat Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" id="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            value="{{ old('email', $user->email) }}" required autocomplete="username"
                                            placeholder="contoh@doughheaven.com">
                                    </div>
                                    @error('email')
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="alert alert-warning mt-2 mb-0" style="border-radius: 10px;">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <span style="font-size: 13px;">
                                        <i class="bi bi-exclamation-circle mr-1"></i> Email Anda belum terverifikasi.
                                    </span>
                                    <button form="send-verification" type="submit" class="btn btn-sm btn-outline-warning font-weight-bold">
                                        Kirim Ulang Verifikasi
                                    </button>
                                </div>
                                @if (session('status') === 'verification-link-sent')
                                    <small class="d-block text-success font-weight-bold mt-2">
                                        <i class="bi bi-check-circle mr-1"></i> Link verifikasi baru telah dikirim ke email Anda.
                                    </small>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="card-action d-flex justify-content-between align-items-center">
                        <span class="text-muted" style="font-size: 12.5px;">Pastikan data yang Anda masukkan sudah benar.</span>
                        <button type="submit" class="btn btn-dh-primary">
                            <i class="bi bi-check-circle-fill mr-1"></i> Simpan Profil
                        </button>
                    </div>
                </form>
            </div>

            <!-- 2. Formulir Ganti Kata Sandi -->
            <div class="card mb-4 shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="card-title font-weight-bold text-dark mb-0" style="font-size: 16px;">
                        <i class="bi bi-shield-lock-fill mr-2" style="color: #e75b7a;"></i>
                        Keamanan & Ganti Kata Sandi
                    </div>
                    <span class="badge-pill-custom badge-warning-soft" style="font-size: 11.5px;">Autentikasi</span>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body p-4">
                        <p class="text-muted mb-4" style="font-size: 13.5px;">
                            Pastikan akun Anda menggunakan kata sandi yang aman dan tidak digunakan di platform lain.
                        </p>

                        <!-- Kata Sandi Saat Ini -->
                        <div class="form-group p-0 mb-3">
                            <label for="update_password_current_password" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                Kata Sandi Saat Ini <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                </div>
                                <input type="password" name="current_password" id="update_password_current_password" 
                                    class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}" 
                                    autocomplete="current-password" placeholder="Masukkan kata sandi lama Anda">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('update_password_current_password', this)" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #cbd5e1;">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @if ($errors->updatePassword->has('current_password'))
                                <small class="text-danger font-weight-bold d-block mt-1">{{ $errors->updatePassword->first('current_password') }}</small>
                            @endif
                        </div>

                        <div class="row">
                            <!-- Kata Sandi Baru -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group p-0 mb-0">
                                    <label for="update_password_password" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Kata Sandi Baru <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                                        </div>
                                        <input type="password" name="password" id="update_password_password" 
                                            class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}" 
                                            autocomplete="new-password" placeholder="Minimal 8 karakter">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('update_password_password', this)" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #cbd5e1;">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->updatePassword->has('password'))
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $errors->updatePassword->first('password') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Konfirmasi Kata Sandi Baru -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group p-0 mb-0">
                                    <label for="update_password_password_confirmation" class="font-weight-bold text-dark" style="font-size: 13.5px;">
                                        Konfirmasi Kata Sandi Baru <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-check2-square"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" id="update_password_password_confirmation" 
                                            class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}" 
                                            autocomplete="new-password" placeholder="Ulangi kata sandi baru">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('update_password_password_confirmation', this)" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #cbd5e1;">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->updatePassword->has('password_confirmation'))
                                        <small class="text-danger font-weight-bold d-block mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action d-flex justify-content-between align-items-center">
                        <span class="text-muted" style="font-size: 12.5px;">Saran: Kombinasikan huruf besar, angka, dan simbol.</span>
                        <button type="submit" class="btn btn-dh-primary">
                            <i class="bi bi-key-fill mr-1"></i> Perbarui Kata Sandi
                        </button>
                    </div>
                </form>
            </div>

            <!-- 3. Zona Bahaya: Hapus Akun -->
            <div class="card mb-4 shadow-sm" style="border-radius: 16px; border: 1px solid #fecdd3; background-color: #fffafb;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                        <div style="max-width: 500px;">
                            <h5 class="font-weight-bold text-danger mb-1 d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle-fill mr-2"></i> Zona Bahaya: Hapus Akun
                            </h5>
                            <p class="text-muted mb-0" style="font-size: 13px; line-height: 1.5;">
                                Setelah akun Anda dihapus, semua data dan hak akses Anda ke panel DoughHeaven akan hilang secara permanen. Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                        <div class="mt-2 mt-sm-0">
                            <button type="button" class="btn btn-outline-danger font-weight-bold" data-toggle="modal" data-target="#deleteAccountModal" style="border-radius: 10px; padding: 9px 18px;">
                                <i class="bi bi-trash-fill mr-1"></i> Hapus Akun Saya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Akun -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: #fff5f5; border-bottom: 1px solid #fed7d7;">
                <h5 class="modal-title font-weight-bold text-danger" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle-fill mr-2"></i> Konfirmasi Penghapusan Akun
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <div class="modal-body p-4">
                    <p class="text-dark font-weight-bold mb-2">Apakah Anda yakin ingin menghapus akun administrator ini?</p>
                    <p class="text-muted" style="font-size: 13px;">
                        Tindakan ini permanen. Masukkan kata sandi akun Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun ini.
                    </p>
                    
                    <div class="form-group p-0 mt-3 mb-0">
                        <label for="delete_password" class="font-weight-bold text-dark" style="font-size: 13px;">
                            Kata Sandi Anda <span class="text-danger">*</span>
                        </label>
                        <input type="password" id="delete_password" name="password" 
                            class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}" 
                            placeholder="Ketik kata sandi untuk konfirmasi" required>
                        @if ($errors->userDeletion->has('password'))
                            <small class="text-danger font-weight-bold mt-1 d-block">
                                {{ $errors->userDeletion->first('password') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="modal-footer" style="background: #f8fafc; border-top: 1px solid #e2e8f0;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px; font-weight: 600;">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-danger font-weight-bold" style="border-radius: 10px; padding: 8px 18px;">
                        <i class="bi bi-trash-fill mr-1"></i> Ya, Hapus Akun Saya
                    </button>
                </div>
            </form>
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

    @if ($errors->userDeletion->isNotEmpty())
        $(document).ready(function() {
            $('#deleteAccountModal').modal('show');
        });
    @endif
</script>
@endsection
