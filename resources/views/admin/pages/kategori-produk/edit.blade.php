@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Edit Kategori: {{ $kategori->nama_kategori }}</h2>
                <p>Perbarui informasi atau status tampil kategori ini di toko DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-arrow-left mr-1"></i> Kembali ke Kategori
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <i class="bi bi-pencil-square mr-2" style="color: #e75b7a;"></i>
                            Formulir Edit Kategori
                        </div>
                    </div>
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                                    id="nama_kategori" placeholder="Contoh: Classic Ring, Filled Bomboloni"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                                @error('nama_kategori')
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi Kategori (Opsional)</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="deskripsi" rows="4" placeholder="Deskripsi varian donat...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="p-3 rounded-lg mt-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <input type="hidden" name="aktif" value="0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1"
                                        {{ old('aktif', $kategori->aktif) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold text-dark" for="aktif" style="cursor: pointer;">
                                        Aktifkan Kategori ini di Etalase Publik
                                    </label>
                                    <small class="d-block text-muted">Jika dinonaktifkan, kategori dan produk di dalamnya tidak akan ditampilkan ke pembeli.</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-dh-primary">
                                <i class="bi bi-check-circle-fill mr-1"></i> Perbarui Kategori
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary ml-2" style="border-radius: 10px; font-weight: 600;">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
