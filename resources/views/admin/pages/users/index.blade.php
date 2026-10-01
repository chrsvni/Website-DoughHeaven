@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Manajemen Pengguna & Staf Admin</h2>
            <p>Kelola hak akses akun, tambah karyawan baru, dan atur status keaktifan akun toko DoughHeaven.</p>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('users.create') }}" class="btn btn-dh-primary">
                <i class="bi bi-person-plus-fill mr-1.5"></i> Tambah Akun Baru
            </a>
        </div>
    </div>

    <!-- Alert Notifikasi -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #10b981;">
            <i class="bi bi-check-circle-fill mr-2" style="font-size: 16px;"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid #ef4444;">
            <i class="bi bi-exclamation-triangle-fill mr-2" style="font-size: 16px;"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- 4 Ringkasan Statistik Kartu -->
    <div class="row mb-4">
        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #fff0f3; color: #e75b7a; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Total Pengguna</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #fdf2f8; color: #be185d; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-shield-fill-check"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Super Administrator</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalSuperAdmin }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Staff Admin Toko</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalAdmin }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Akun Aktif</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalAktif }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Pengguna -->
    <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-header bg-white py-3" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <form method="GET" action="{{ route('users.index') }}" class="row align-items-center">
                <div class="col-md-5 mb-2 mb-md-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                        </div>
                        <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <select name="role" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Hak Akses (Role)</option>
                        <option value="super_admin" {{ request('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Staff Admin</option>
                    </select>
                </div>
                <div class="col-6 col-md-3 mb-2 mb-md-0">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Hanya Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Hanya Nonaktif</option>
                    </select>
                </div>
                <div class="col-md-1 text-md-right">
                    @if(request('search') || request('role') || request('status'))
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm" title="Reset Filter" style="border-radius: 8px;">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="padding-left: 24px;">Profil Pengguna</th>
                            <th>Hak Akses (Role)</th>
                            <th class="text-center">Status Akun</th>
                            <th>Tanggal Dibuat</th>
                            <th style="width: 200px;" class="text-center pr-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $u)
                            <tr>
                                <td style="padding-left: 24px;">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: {{ $u->isSuperAdmin() ? 'linear-gradient(135deg, #be185d 0%, #db2777 100%)' : 'linear-gradient(135deg, #e75b7a 0%, #ff8da1 100%)' }}; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px; margin-right: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08);">
                                            {{ strtoupper(substr($u->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-weight-bold text-dark d-flex align-items-center">
                                                <span>{{ $u->name }}</span>
                                                @if ($u->id === Auth::id())
                                                    <span class="badge badge-pill badge-primary ml-2" style="font-size: 10px; padding: 3px 8px;">Akun Saya</span>
                                                @endif
                                            </div>
                                            <small class="text-muted">{{ $u->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($u->isSuperAdmin())
                                        <span class="badge-pill-custom" style="background: #fdf2f8; color: #be185d; border: 1px solid #fbcfe8; font-size: 12px; padding: 4px 12px;">
                                            <i class="bi bi-shield-fill-check mr-1"></i> Super Admin
                                        </span>
                                    @else
                                        <span class="badge-pill-custom badge-info-soft" style="font-size: 12px; padding: 4px 12px;">
                                            <i class="bi bi-person-badge mr-1"></i> Staff Admin
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($u->isActive())
                                        <span class="badge-pill-custom badge-success-soft" style="font-size: 11.5px; padding: 4px 10px;">
                                            <i class="bi bi-check-circle-fill mr-1"></i> Aktif
                                        </span>
                                    @else
                                        <span class="badge-pill-custom badge-danger-soft" style="font-size: 11.5px; padding: 4px 10px;">
                                            <i class="bi bi-x-circle-fill mr-1"></i> Nonaktif
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted" style="font-size: 13px;">
                                        <i class="bi bi-calendar-event mr-1"></i>
                                        {{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}
                                    </span>
                                </td>
                                <td class="text-center pr-4">
                                    <div class="d-inline-flex align-items-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('users.edit', $u->id) }}" class="btn btn-outline-primary btn-sm btn-sm-action mr-1" title="Edit Data Akun">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Tombol Toggle Status (Aktif/Nonaktif) -->
                                        @if ($u->id !== Auth::id())
                                            <form action="{{ route('users.toggle-status', $u->id) }}" method="POST" style="display: inline;" class="mr-1">
                                                @csrf
                                                @method('PATCH')
                                                @if ($u->isActive())
                                                    <button type="submit" class="btn btn-outline-warning btn-sm btn-sm-action" title="Nonaktifkan Akun" onclick="return confirm('Nonaktifkan akun {{ $u->name }}? Pengguna ini tidak akan bisa login ke panel.')">
                                                        <i class="bi bi-pause-circle"></i> Nonaktifkan
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-success btn-sm btn-sm-action" title="Aktifkan Akun" onclick="return confirm('Aktifkan kembali akun {{ $u->name }}?')">
                                                        <i class="bi bi-play-circle"></i> Aktifkan
                                                    </button>
                                                @endif
                                            </form>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action" title="Hapus Akun Pengguna" onclick="return confirm('Yakin ingin menghapus akun {{ $u->name }} secara permanen?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge badge-light text-muted" style="font-size: 11px; padding: 6px 10px;" title="Akun yang sedang aktif digunakan">
                                                <i class="bi bi-lock-fill"></i> Terkunci
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-people" style="font-size: 42px; color: #cbd5e1;"></i>
                                    <p class="mt-2 mb-0">Tidak ada data pengguna yang sesuai dengan pencarian/filter.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
