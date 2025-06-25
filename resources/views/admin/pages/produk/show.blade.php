@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Detail Produk</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body d-md-flex align-items-start">
                        {{-- Gambar Produk --}}
                        <div class="me-md-4 mb-3 mb-md-0 text-center">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                class="img-fluid rounded shadow-sm" style="max-width: 350px;">
                        </div>

                        {{-- Informasi Produk --}}
                        <div>
                            <h3 class="mb-2">{{ $produk->nama_produk }}</h3>

                            <p class="mb-1">
                                <strong>Kategori:</strong>
                                {{ $produk->kategori->nama_kategori ?? '-' }}
                            </p>

                            <p class="mb-1">
                                <strong>Harga:</strong>
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>

                            <p class="mb-1">
                                <strong>Status:</strong>
                                @if ($produk->rekomendasi == 'rekomendasi')
                                    <span class="badge bg-success">Rekomendasi</span>
                                @else
                                    <span class="badge bg-secondary">Biasa</span>
                                @endif
                            </p>

                            <hr>

                            <h5 class="mt-3">Deskripsi</h5>
                            <p class="text-muted">{{ $produk->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">Edit Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
