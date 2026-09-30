@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Tambah Produk Baru</h2>
                <p>Tambahkan varian donat atau pastry manis baru ke etalase toko DoughHeaven.</p>
            </div>
            <div>
                <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-arrow-left mr-1"></i> Kembali ke Produk
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <i class="bi bi-plus-circle mr-2" style="color: #e75b7a;"></i>
                            Formulir Produk Baru
                        </div>
                        <span class="text-muted" style="font-size: 13px;">Semua kolom bertanda <span class="text-danger">*</span> wajib diisi</span>
                    </div>

                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Kiri: Data Utama Produk -->
                                <div class="col-lg-7 pr-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                                            id="nama_produk" placeholder="Contoh: Strawberry Glaze Donut"
                                            value="{{ old('nama_produk') }}" required>
                                        @error('nama_produk')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="kategori_id">Kategori Produk <span class="text-danger">*</span></label>
                                                <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                                                    <option value="">-- Pilih Kategori --</option>
                                                    @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id }}"
                                                            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                            {{ $kategori->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="harga">Harga Satuan <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                                                        id="harga" placeholder="Contoh: 15000" value="{{ old('harga') }}" required>
                                                </div>
                                                @error('harga')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 mb-lg-0">
                                        <label for="deskripsi">Deskripsi Produk <span class="text-danger">*</span></label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                            id="deskripsi" rows="4" placeholder="Ceritakan rasa manis, kelembutan adonan, dan topping istimewa produk ini..." required>{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kolom Kanan: Rekomendasi, Foto & Aksi -->
                                <div class="col-lg-5 pl-lg-4 border-left-lg">
                                    <div class="form-group mb-3">
                                        <label for="rekomendasi">Level Rekomendasi</label>
                                        <select name="rekomendasi" id="rekomendasi" class="form-control">
                                            <option value="none" {{ old('rekomendasi') == 'none' ? 'selected' : '' }}>
                                                Tidak Ada
                                            </option>
                                            <option value="rekomendasi" {{ old('rekomendasi') == 'rekomendasi' ? 'selected' : '' }}>
                                                ⭐ Rekomendasi Pilihan
                                            </option>
                                        </select>
                                        <small class="form-text text-muted">Produk bertanda rekomendasi akan disorot di etalase utama.</small>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="gambar">Foto Produk Bakery</label>
                                        <div class="upload-dropzone text-center p-3" style="border: 2px dashed #cbd5e1; border-radius: 12px; background: #f8fafc; cursor: pointer; transition: all 0.2s;"
                                             onclick="document.getElementById('gambar').click();">
                                            <div id="previewContainer" style="display: none;">
                                                <img id="imagePreview" src="#" alt="Preview Foto"
                                                     style="max-height: 120px; border-radius: 10px; object-fit: cover;" class="mb-2 shadow-sm">
                                                <p class="mb-0 text-success font-weight-bold" style="font-size: 12.5px;">
                                                    <i class="bi bi-check2-circle mr-1"></i> Foto berhasil dipilih. Klik untuk ganti.
                                                </p>
                                            </div>
                                            <div id="uploadPlaceholder">
                                                <i class="bi bi-cloud-arrow-up" style="font-size: 32px; color: #e75b7a;"></i>
                                                <p class="mb-1 font-weight-bold text-dark" style="font-size: 13.5px;">Klik untuk pilih foto produk</p>
                                                <small class="text-muted d-block" style="font-size: 12px;">Format JPG, PNG, WEBP (Maks 2MB)</small>
                                            </div>
                                        </div>
                                        <input type="file" name="gambar" class="d-none @error('gambar') is-invalid @enderror"
                                               id="gambar" accept="image/*" onchange="previewProductImage(this)">
                                        @error('gambar')
                                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Tombol Aksi Langsung Menyatu Tanpa Perlu Scroll -->
                                    <div class="d-flex align-items-center gap-2 pt-2">
                                        <button type="submit" class="btn btn-dh-primary flex-grow-1" style="padding: 11px 20px;">
                                            <i class="bi bi-check-circle-fill mr-1"></i> Simpan Produk
                                        </button>
                                        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary ml-2" style="border-radius: 10px; font-weight: 600; padding: 11px 20px;">
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

    <script>
        function previewProductImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    document.getElementById('previewContainer').style.display = 'block';
                    document.getElementById('uploadPlaceholder').style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
