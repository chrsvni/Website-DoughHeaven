@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Tambah Promosi</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Promosi</div>
                    </div>
                    <form action="{{ route('promosi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_promosi">Nama Promosi</label>
                                <input type="text" class="form-control" name="nama_promosi" value="{{ old('nama_promosi') }}" required>
                                @error('nama_promosi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori_promosi">Kategori Promosi</label>
                                <select class="form-control" name="kategori_promosi" required>
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
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jatuh_tempo">Jatuh Tempo</label>
                                <input type="date" class="form-control" name="jatuh_tempo" value="{{ old('jatuh_tempo') }}" required>
                                @error('jatuh_tempo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="produk_ids">Produk yang Termasuk</label>
                                <select class="form-control" name="produk_ids[]" multiple>
                                    @foreach($produks as $produk)
                                        <option value="{{ $produk->id }}"
                                            {{ in_array($produk->id, old('produk_ids', [])) ? 'selected' : '' }}>
                                            {{ $produk->nama_produk }} - Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Gunakan Ctrl+Click untuk memilih beberapa produk</small>
                                @error('produk_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('promosi.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
