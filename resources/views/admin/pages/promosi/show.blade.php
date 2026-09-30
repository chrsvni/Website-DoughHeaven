@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Detail Promosi: {{ $promosi->nama_promosi }}</h2>
                <p>Informasi lengkap penawaran promo dan daftar donat yang termasuk di dalamnya.</p>
            </div>
            <div>
                <a href="{{ route('promosi.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-arrow-left mr-1"></i> Kembali ke Promosi
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <i class="bi bi-tag-fill mr-2" style="color: #e75b7a;"></i>
                            Data Promosi
                        </div>
                        <span class="badge-pill-custom badge-warning-soft">
                            {{ $promosi->kategori_promosi }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h4 class="font-weight-bold text-dark mb-3">{{ $promosi->nama_promosi }}</h4>
                        
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-2">
                                <small class="text-muted d-block">Kategori Promosi</small>
                                <strong class="text-dark">{{ $promosi->kategori_promosi }}</strong>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <small class="text-muted d-block">Masa Berlaku (Jatuh Tempo)</small>
                                <strong style="color: #e75b7a;">
                                    <i class="bi bi-calendar-event mr-1"></i>
                                    {{ \Carbon\Carbon::parse($promosi->jatuh_tempo)->format('d F Y') }}
                                </strong>
                            </div>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted d-block mb-1">Deskripsi Promosi</small>
                            <p class="text-muted p-3 rounded" style="background: #f8fafc; border: 1px solid #e2e8f0; line-height: 1.6;">
                                {{ $promosi->deskripsi ?: 'Tidak ada keterangan tambahan.' }}
                            </p>
                        </div>

                        <div>
                            <small class="text-muted d-block mb-2 font-weight-bold">Produk Bakery dalam Promo Ini:</small>
                            <div class="row">
                                @forelse($promosi->produks as $produk)
                                    <div class="col-md-6 mb-2">
                                        <div class="d-flex align-items-center p-2 rounded" style="border: 1px solid #e2e8f0; background: #ffffff;">
                                            <span style="font-size: 20px; margin-right: 10px;">🍩</span>
                                            <div>
                                                <div class="font-weight-bold text-dark" style="font-size: 13.5px;">{{ $produk->nama_produk }}</div>
                                                <small style="color: #e75b7a; font-weight: 600;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted font-italic mb-0">Belum ada produk yang dikaitkan ke promosi ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('promosi.edit', $promosi->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil mr-1"></i> Edit Promosi Ini
                        </a>
                        <a href="{{ route('promosi.index') }}" class="btn btn-outline-secondary ml-2" style="border-radius: 10px; font-weight: 600;">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
