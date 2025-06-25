@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Manajemen Produk</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Produk</div>
                        <a href="{{ route('produk.create') }}" class="btn btn-info btn-sm">+ Tambah Produk</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produks as $produk)
                                    <tr>
                                        <td>
                                            @if ($produk->gambar)
                                                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar" width="60">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
                                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
