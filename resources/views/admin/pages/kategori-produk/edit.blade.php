@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Edit Kategori Produk</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Kategori</div>
                    </div>
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                    placeholder="Masukkan nama kategori"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                                @error('nama_kategori')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi (opsional)</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi kategori...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input type="hidden" name="aktif" value="0">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="aktif" value="1"
                                        {{ old('aktif', $kategori->aktif) ? 'checked' : '' }}>
                                    <span class="form-check-sign">Aktifkan Kategori</span>
                                </label>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
