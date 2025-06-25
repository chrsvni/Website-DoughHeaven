@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Tambah Produk</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Produk</div>
                    </div>
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                    placeholder="Masukkan nama produk" value="{{ old('nama_produk') }}">
                                @error('nama_produk')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga"
                                    placeholder="Masukkan harga produk" value="{{ old('harga') }}">
                                @error('harga')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi produk...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rekomendasi">Level Rekomendasi</label>
                                <select name="rekomendasi" id="rekomendasi" class="form-control">
                                    <option value="none"
                                        {{ old('rekomendasi', $produk->rekomendasi ?? 'none') == 'none' ? 'selected' : '' }}>
                                        Tidak Ada</option>
                                    <option value="rekomendasi"
                                        {{ old('rekomendasi', $produk->rekomendasi ?? '') == 'rekomendasi' ? 'selected' : '' }}>
                                        Rekomendasi</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="gambar">Gambar Produk</label>
                                <input type="file" name="gambar" class="form-control-file" id="gambar">
                                @error('gambar')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('produk.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
