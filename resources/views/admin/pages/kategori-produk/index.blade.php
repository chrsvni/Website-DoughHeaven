@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Manajemen Kategori Produk</h4>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Kategori</div>
                        <a href="{{ route('kategori.create') }}" class="btn btn-info btn-sm">+ Tambah Kategori</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @forelse ($kategoris as $kategori)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>
                                            @if ($kategori->aktif)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data kategori.</td>
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
