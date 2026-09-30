@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Manajemen Artikel Blog</h2>
                <p>Publikasikan cerita baking, tips donat empuk, dan berita seputar DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('blog.create') }}" class="btn btn-dh-primary">
                    <i class="bi bi-plus-lg mr-1"></i> Tulis Artikel Baru
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
                        <div class="card-title">Daftar Artikel Blog</div>
                        <span class="text-muted" style="font-size: 13px;">Total: {{ $blogs->total() }} Artikel</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 85px;">Cover</th>
                                        <th>Judul & Ringkasan</th>
                                        <th>Penulis</th>
                                        <th>Tanggal Rilis</th>
                                        <th>Kategori</th>
                                        <th style="width: 210px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $blog)
                                        <tr>
                                            <td>
                                                <div style="width: 58px; height: 58px; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; background: #f8fafc;">
                                                    @if ($blog->gambar)
                                                        <img src="{{ $blog->gambar_url }}" alt="{{ $blog->judul }}"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                            <i class="bi bi-image" style="font-size: 20px;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="font-weight-bold text-dark" style="font-size: 14.5px;">{{ $blog->judul }}</div>
                                                <small class="text-muted">{{ $blog->getExcerpt(70) }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span style="display:inline-block; width: 7px; height: 7px; border-radius: 50%; background: #06b6d4; margin-right: 6px;"></span>
                                                    <span class="font-weight-medium text-dark">{{ $blog->user->name ?? 'Admin' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted" style="font-size: 13px;">
                                                    <i class="bi bi-clock mr-1"></i>
                                                    {{ $blog->tanggal->format('d M Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge-pill-custom badge-info-soft">
                                                    {{ $blog->kategori_label }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-outline-info btn-sm btn-sm-action">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning btn-sm btn-sm-action ml-1">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                        style="display: inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action"
                                                            onclick="return confirm('Yakin ingin menghapus blog {{ $blog->judul }}?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <i class="bi bi-newspaper" style="font-size: 40px; color: #cbd5e1;"></i>
                                                <p class="mt-2 mb-0">Belum ada artikel blog yang ditulis.</p>
                                                <a href="{{ route('blog.create') }}" class="btn btn-sm btn-dh-primary mt-3">
                                                    + Tulis Artikel Pertama
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($blogs->hasPages())
                            <div class="d-flex justify-content-center p-3">
                                {{ $blogs->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
