@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Manajemen Kategori Produk</h2>
                <p>Kelola kategori rasa, jenis donat, dan varian bakery di DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('kategori.create') }}" class="btn btn-dh-primary">
                    <i class="bi bi-plus-lg mr-1"></i> Tambah Kategori
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
                        <div class="card-title">Daftar Kategori</div>
                        <span class="text-muted" style="font-size: 13px;">Total: {{ $kategoris->count() }} Kategori</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">#</th>
                                        <th>Nama Kategori</th>
                                        <th>Status Tampil</th>
                                        <th style="width: 180px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategoris as $kategori)
                                        <tr>
                                            <td class="font-weight-bold text-muted">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span style="display:inline-flex; width: 32px; height: 32px; border-radius: 8px; background: #fff0f3; color: #e75b7a; align-items: center; justify-content: center; margin-right: 10px; font-weight: bold;">
                                                        <i class="bi bi-tag"></i>
                                                    </span>
                                                    <span class="font-weight-bold text-dark">{{ $kategori->nama_kategori }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($kategori->aktif)
                                                    <span class="badge-pill-custom badge-success-soft">
                                                        <i class="bi bi-check-circle-fill"></i> Aktif
                                                    </span>
                                                @else
                                                    <span class="badge-pill-custom badge-danger-soft">
                                                        <i class="bi bi-x-circle-fill"></i> Tidak Aktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                        class="btn btn-warning btn-sm btn-sm-action">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                                        style="display: inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $kategori->nama_kategori }}?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="bi bi-inbox" style="font-size: 40px; color: #cbd5e1;"></i>
                                                <p class="mt-2 mb-0">Belum ada data kategori produk.</p>
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
