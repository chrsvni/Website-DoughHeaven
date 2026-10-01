@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Section -->
    <div class="admin-page-header">
        <div>
            <h2>Kelola Pelanggan (Newsletter)</h2>
            <p>Pantau daftar audiens email yang berlangganan kabar manis DoughHeaven dan kirimkan siaran email berkala.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            @if (Auth::user()->isSuperAdmin())
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mr-2" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-people-fill mr-1" style="color: #be185d;"></i> Kelola Pengguna (Staf)
                </a>
            @endif
            <a href="{{ route('subscribers.export-csv') }}" class="btn btn-outline-secondary mr-2" style="border-radius: 10px; font-weight: 600;">
                <i class="bi bi-file-earmark-spreadsheet mr-1"></i> Ekspor CSV
            </a>
            <a href="{{ route('subscribers.broadcast') }}" class="btn btn-dh-primary">
                <i class="bi bi-send-fill mr-1.5"></i> Kirim Email Siaran (Broadcast)
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

    <!-- 3 Ringkasan Statistik Kartu -->
    <div class="row mb-4">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #fff0f3; color: #e75b7a; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-envelope-paper-heart-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Total Pelanggan</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalSubscribers }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Pelanggan Aktif</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalAktif }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 14px;">
                <div class="card-body p-3.5 d-flex align-items-center">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f8fafc; color: #94a3b8; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-right: 14px;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size: 12.5px; font-weight: 600;">Berhenti Langganan</div>
                        <div class="font-weight-bold text-dark" style="font-size: 22px;">{{ $totalNonaktif }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pelanggan -->
    <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-header bg-white py-3" style="border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <form method="GET" action="{{ route('subscribers.index') }}" class="row align-items-center">
                <div class="col-md-7 mb-2 mb-md-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                        </div>
                        <input type="text" name="search" class="form-control" placeholder="Cari alamat email pelanggan..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Status Langganan</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Hanya Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Hanya Berhenti Langganan</option>
                    </select>
                </div>
                <div class="col-md-1 text-md-right">
                    @if(request('search') || request('status'))
                        <a href="{{ route('subscribers.index') }}" class="btn btn-outline-secondary btn-sm" title="Reset Filter" style="border-radius: 8px;">
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
                            <th style="padding-left: 24px;">Alamat Email</th>
                            <th class="text-center">Status Langganan</th>
                            <th>Tanggal Bergabung</th>
                            <th style="width: 200px;" class="text-center pr-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscribers as $s)
                            <tr>
                                <td style="padding-left: 24px;">
                                    <div class="d-flex align-items-center">
                                        <div style="width: 38px; height: 38px; border-radius: 50%; background: #fff0f3; color: #e75b7a; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; margin-right: 12px;">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <div class="font-weight-bold text-dark" style="font-size: 13.5px;">{{ $s->email }}</div>
                                            <small class="text-muted">ID Subscriber: #{{ $s->id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if ($s->isActive())
                                        <span class="badge-pill-custom badge-success-soft" style="font-size: 11.5px; padding: 4px 12px;">
                                            <i class="bi bi-check-circle-fill mr-1"></i> Aktif Berlangganan
                                        </span>
                                    @else
                                        <span class="badge-pill-custom badge-warning-soft" style="font-size: 11.5px; padding: 4px 12px;">
                                            <i class="bi bi-pause-circle mr-1"></i> Berhenti Langganan
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted" style="font-size: 13px;">
                                        <i class="bi bi-calendar-event mr-1"></i>
                                        {{ $s->created_at ? $s->created_at->format('d M Y H:i') : '-' }}
                                    </span>
                                </td>
                                <td class="text-center pr-4">
                                    <div class="d-inline-flex align-items-center">
                                        <!-- Toggle Status -->
                                        <form action="{{ route('subscribers.toggle-status', $s->id) }}" method="POST" style="display: inline;" class="mr-1">
                                            @csrf
                                            @method('PATCH')
                                            @if ($s->isActive())
                                                <button type="submit" class="btn btn-outline-warning btn-sm btn-sm-action" title="Nonaktifkan langganan" onclick="return confirm('Nonaktifkan langganan email {{ $s->email }}?')">
                                                    <i class="bi bi-pause-circle"></i> Nonaktifkan
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-outline-success btn-sm btn-sm-action" title="Aktifkan kembali langganan" onclick="return confirm('Aktifkan kembali langganan email {{ $s->email }}?')">
                                                    <i class="bi bi-play-circle"></i> Aktifkan
                                                </button>
                                            @endif
                                        </form>

                                        <!-- Hapus -->
                                        <form action="{{ route('subscribers.destroy', $s->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action" title="Hapus Pelanggan" onclick="return confirm('Yakin ingin menghapus email {{ $s->email }} dari daftar pelanggan?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-envelope-open" style="font-size: 42px; color: #cbd5e1;"></i>
                                    <p class="mt-2 mb-0">Belum ada pelanggan newsletter yang terdaftar.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($subscribers->hasPages())
                <div class="px-4 py-3 border-top d-flex justify-content-between align-items-center">
                    <span class="text-muted" style="font-size: 13px;">
                        Menampilkan {{ $subscribers->firstItem() }} - {{ $subscribers->lastItem() }} dari {{ $subscribers->total() }} pelanggan
                    </span>
                    <div>
                        {{ $subscribers->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
