@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Tambah Promosi Baru</h2>
                <p>Buat program diskon, penawaran musiman, atau paket hemat produk DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('promosi.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-arrow-left mr-1"></i> Kembali ke Promosi
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <i class="bi bi-megaphone mr-2" style="color: #e75b7a;"></i>
                            Formulir Promosi & Diskon
                        </div>
                        <span class="text-muted" style="font-size: 13px;">Semua kolom bertanda <span class="text-danger">*</span> wajib diisi</span>
                    </div>

                    <form action="{{ route('promosi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Kiri: Detail Promosi -->
                                <div class="col-lg-7 pr-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="nama_promosi">Nama Promosi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama_promosi') is-invalid @enderror"
                                            name="nama_promosi" id="nama_promosi" value="{{ old('nama_promosi') }}"
                                            placeholder="Contoh: Weekend Donut Fiesta - Beli 5 Gratis 1" required>
                                        @error('nama_promosi')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="kategori_promosi">Kategori Promosi <span class="text-danger">*</span></label>
                                                <select class="form-control @error('kategori_promosi') is-invalid @enderror"
                                                    name="kategori_promosi" id="kategori_promosi" required>
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <option value="Bundle Deals" {{ old('kategori_promosi') == 'Bundle Deals' ? 'selected' : '' }}>Bundle Deals</option>
                                                    <option value="Gift Sets" {{ old('kategori_promosi') == 'Gift Sets' ? 'selected' : '' }}>Gift Sets</option>
                                                    <option value="Loyalty Program" {{ old('kategori_promosi') == 'Loyalty Program' ? 'selected' : '' }}>Loyalty Program</option>
                                                    <option value="Birthday Treats" {{ old('kategori_promosi') == 'Birthday Treats' ? 'selected' : '' }}>Birthday Treats</option>
                                                    <option value="Partnership" {{ old('kategori_promosi') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                                    <option value="Events" {{ old('kategori_promosi') == 'Events' ? 'selected' : '' }}>Events</option>
                                                    <option value="Flash Sale" {{ old('kategori_promosi') == 'Flash Sale' ? 'selected' : '' }}>Flash Sale</option>
                                                </select>
                                                @error('kategori_promosi')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="jatuh_tempo">Berlaku Sampai (Jatuh Tempo) <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control @error('jatuh_tempo') is-invalid @enderror"
                                                    name="jatuh_tempo" id="jatuh_tempo" value="{{ old('jatuh_tempo') }}" required>
                                                @error('jatuh_tempo')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 mb-lg-0">
                                        <label for="deskripsi">Deskripsi & Ketentuan Promosi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                            name="deskripsi" id="deskripsi" rows="4"
                                            placeholder="Jelaskan detail potongan harga, syarat pembelian, atau cara penukaran promo ini...">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kolom Kanan: Pilihan Produk & Aksi -->
                                <div class="col-lg-5 pl-lg-4 border-left-lg">
                                    <div class="form-group mb-3">
                                        <label for="produk_ids">Pilih Produk yang Termasuk Promo</label>
                                        <select class="form-control @error('produk_ids') is-invalid @enderror"
                                            name="produk_ids[]" id="produk_ids" multiple style="height: 155px !important; min-height: 155px !important; border-radius: 12px !important;">
                                            @foreach($produks as $produk)
                                                <option value="{{ $produk->id }}"
                                                    {{ in_array($produk->id, old('produk_ids', [])) ? 'selected' : '' }}
                                                    style="padding: 6px 10px; margin-bottom: 2px; border-radius: 6px;">
                                                    🍩 {{ $produk->nama_produk }} &bull; Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted mt-2" style="font-size: 12px;">
                                            <i class="bi bi-info-circle mr-1"></i> Tahan tombol <strong>Ctrl</strong> (atau Cmd di Mac) sambil klik untuk memilih lebih dari satu donat.
                                        </small>
                                        @error('produk_ids')
                                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="p-3 rounded-lg mb-4" style="background: #fdf2f8; border-left: 4px solid #e75b7a;">
                                        <p class="mb-0 text-muted" style="font-size: 12.5px; line-height: 1.5;">
                                            <strong style="color: #d44368;"><i class="bi bi-gift-fill mr-1"></i> Info Penayangan:</strong><br>
                                            Banner promosi ini akan otomatis aktif dan ditampilkan di halaman promo pelanggan sampai tanggal jatuh tempo.
                                        </p>
                                    </div>

                                    <!-- Tombol Aksi Langsung di Samping Tanpa Perlu Scroll -->
                                    <div class="d-flex align-items-center gap-2 pt-1">
                                        <button type="submit" class="btn btn-dh-primary flex-grow-1" style="padding: 11px 20px;">
                                            <i class="bi bi-check-circle-fill mr-1"></i> Simpan Promosi
                                        </button>
                                        <a href="{{ route('promosi.index') }}" class="btn btn-outline-secondary ml-2" style="border-radius: 10px; font-weight: 600; padding: 11px 20px;">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
