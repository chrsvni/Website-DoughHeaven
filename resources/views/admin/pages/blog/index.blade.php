@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Manajemen Blog</h4>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Blog</div>
                        <a href="{{ route('blog.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus"></i> Tambah Blog
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col" width="15%">Penulis</th>
                                    <th scope="col" width="12%">Tanggal</th>
                                    <th scope="col" width="12%">Kategori</th>
                                    <th scope="col" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td>
                                            @if ($blog->gambar)
                                                <img src="{{ $blog->gambar_url }}" alt="{{ $blog->judul }}"
                                                    class="img-thumbnail"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $blog->judul }}</strong><br>
                                            <small class="text-muted">{{ $blog->getExcerpt(80) }}</small>
                                        </td>
                                        <td>{{ $blog->user->name ?? 'Unknown' }}</td>
                                        <td>{{ $blog->tanggal->format('d M Y') }}</td>
                                        <td>
                                            @php
                                                $badgeClass = 'primary';
                                                if ($blog->kategori == 'whats_fun') {
                                                    $badgeClass = 'success';
                                                } elseif ($blog->kategori == 'whats_good') {
                                                    $badgeClass = 'warning';
                                                }
                                            @endphp
                                            <span class="badge badge-{{ $badgeClass }}">
                                                {{ $blog->kategori_label }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus blog ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            <i class="fa fa-inbox fa-3x mb-3"></i><br>
                                            Belum ada data blog.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if ($blogs->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $blogs->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
