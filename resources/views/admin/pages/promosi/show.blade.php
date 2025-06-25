@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Detail Promosi</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>{{ $promosi->nama_promosi }}</h3>
                        <p><strong>Kategori:</strong> {{ $promosi->kategori_promosi }}</p>
                        <p><strong>Jatuh Tempo:</strong> {{ \Carbon\Carbon::parse($promosi->jatuh_tempo)->format('d M Y') }}</p>
                        <p><strong>Deskripsi:</strong></p>
                        <p>{{ $promosi->deskripsi ?: '-' }}</p>
                        <p><strong>Produk dalam Promosi:</strong></p>
                        <ul>
                            @foreach($promosi->produks as $produk)
                                <li>{{ $produk->nama_produk }} - Rp {{ number_format($produk->harga, 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('promosi.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('promosi.edit', $promosi->id) }}" class="btn btn-warning">Edit Promosi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
