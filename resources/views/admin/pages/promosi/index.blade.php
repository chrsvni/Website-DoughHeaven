@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Manajemen Promosi & Diskon</h2>
                <p>Atur banner penawaran spesial, diskon musiman, dan kupon DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('promosi.create') }}" class="btn btn-dh-primary">
                    <i class="bi bi-plus-lg mr-1"></i> Buat Promosi Baru
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Promosi Aktif</div>
                        <span class="text-muted" style="font-size: 13px;">Total: {{ $promosis->count() }} Promosi</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Promosi</th>
                                        <th>Kategori Promo</th>
                                        <th>Jatuh Tempo</th>
                                        <th style="width: 210px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($promosis as $promosi)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span style="display:inline-flex; width: 36px; height: 36px; border-radius: 8px; background: #ecfdf5; color: #059669; align-items: center; justify-content: center; margin-right: 12px; font-size: 18px;">
                                                        <i class="bi bi-percent"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-bold text-dark">{{ $promosi->nama_promosi }}</div>
                                                        <small class="text-muted">{{ Str::limit($promosi->deskripsi ?? '', 40) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge-pill-custom badge-warning-soft">
                                                    <i class="bi bi-bookmark-fill mr-1"></i> {{ $promosi->kategori_promosi }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-muted" style="font-size: 13.5px;">
                                                    <i class="bi bi-calendar-event mr-1" style="color: #e75b7a;"></i>
                                                    {{ \Carbon\Carbon::parse($promosi->jatuh_tempo)->format('d M Y') }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="{{ route('promosi.show', $promosi->id) }}" class="btn btn-outline-info btn-sm btn-sm-action">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('promosi.edit', $promosi->id) }}" class="btn btn-warning btn-sm btn-sm-action ml-1">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('promosi.destroy', $promosi->id) }}" method="POST"
                                                        style="display: inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action"
                                                            onclick="return confirm('Yakin ingin menghapus promosi ini?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="bi bi-percent" style="font-size: 40px; color: #cbd5e1;"></i>
                                                <p class="mt-2 mb-0">Belum ada promo yang didaftarkan.</p>
                                                <a href="{{ route('promosi.create') }}" class="btn btn-sm btn-dh-primary mt-3">
                                                    + Buat Promosi Pertama
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
