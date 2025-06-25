@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Detail Blog</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>{{ $blog->judul }}</h3>
                        <p><strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $blog->kategori)) }}</p>
                        <p><strong>Tanggal Publikasi:</strong> {{ \Carbon\Carbon::parse($blog->tanggal)->format('d M Y') }}</p>
                        <p><strong>Penulis:</strong> {{ $blog->user->name ?? '-' }}</p>

                        @if ($blog->gambar)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog" class="img-fluid rounded shadow">
                            </div>
                        @endif

                        <p><strong>Deskripsi Singkat:</strong></p>
                        <p>{{ $blog->deskripsi ?: '-' }}</p>

                        <p><strong>Isi Blog:</strong></p>
                        <div>{!! nl2br(e($blog->isi_blog)) !!}</div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Edit Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
