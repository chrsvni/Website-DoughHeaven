@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Manajemen Koleksi Produk</h2>
                <p>Kelola menu donat, roti, dan bakery yang dipajang di etalase DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('produk.create') }}" class="btn btn-dh-primary">
                    <i class="bi bi-plus-lg mr-1"></i> Tambah Produk Baru
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
                        <div class="card-title">Daftar Produk Bakery</div>
                        <span class="text-muted" style="font-size: 13px;">Total: {{ $produks->count() }} Produk Tersedia</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 85px;">Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga Satuan</th>
                                        <th style="width: 210px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produks as $produk)
                                        <tr>
                                            <td>
                                                <div style="width: 58px; height: 58px; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; background: #f8fafc;">
                                                    @if ($produk->gambar)
                                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                                            style="width: 100%; height: 100%; object-fit: cover;"
                                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=150&q=80';">
                                                    @else
                                                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=150&q=80" alt="Default Donat"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold text-dark" style="font-size: 14.5px;">{{ $produk->nama_produk }}</div>
                                                <small class="text-muted">{{ Str::limit($produk->deskripsi, 45) }}</small>
                                            </td>
                                            <td>
                                                <span class="badge-pill-custom badge-info-soft">
                                                    <i class="bi bi-tag-fill mr-1"></i> {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold" style="color: #e75b7a; font-size: 15px;">
                                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-outline-info btn-sm btn-sm-action">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm btn-sm-action ml-1">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                        style="display: inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action"
                                                            onclick="return confirm('Yakin ingin menghapus produk {{ $produk->nama_produk }}?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">
                                                <i class="bi bi-box-seam" style="font-size: 40px; color: #cbd5e1;"></i>
                                                <p class="mt-2 mb-0">Belum ada produk yang ditambahkan ke etalase.</p>
                                                <a href="{{ route('produk.create') }}" class="btn btn-sm btn-dh-primary mt-3">
                                                    + Tambah Produk Pertama
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
