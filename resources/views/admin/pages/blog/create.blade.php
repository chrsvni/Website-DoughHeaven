@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Tambah Blog</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Blog</div>
                    </div>
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="judul">Judul Blog <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" value="{{ old('judul') }}" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi/Ringkasan <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                                        <small class="form-text text-muted">Ringkasan singkat yang akan ditampilkan di
                                            daftar blog</small>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="isi_blog">Isi Blog <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('isi_blog') is-invalid @enderror" name="isi_blog" id="editor" rows="15"
                                            required>{{ old('isi_blog') }}</textarea>
                                        @error('isi_blog')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gambar">Gambar Utama Blog</label>
                                        <input type="file" class="form-control-file @error('gambar') is-invalid @enderror"
                                            name="gambar" id="gambar" accept="image/*">
                                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <!-- Preview gambar -->
                                        <div id="image-preview" class="mt-2" style="display:none;">
                                            <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Publikasi <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kategori">Kategori <span class="text-danger">*</span></label>
                                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategoris as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ old('kategori') == $value ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="alert alert-info">
                                        <h6><i class="fa fa-info-circle"></i> Informasi</h6>
                                        <small>
                                            • Penulis: <strong>{{ Auth::user()->name }}</strong><br>
                                            • Slug akan dibuat otomatis dari judul<br>
                                            • Gambar utama akan ditampilkan di daftar blog<br>
                                            • Anda dapat menambahkan gambar tambahan di editor
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Simpan Blog
                            </button>
                            <a href="{{ route('blog.index') }}" class="btn btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        // Preview gambar saat dipilih
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // CKEditor 5
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic', 'underline',
                        '|', 'link', 'uploadImage', 'insertTable', 'blockQuote',
                        '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                    ]
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', 'toggleImageCaption', 'imageStyle:inline', 'imageStyle:block',
                        'imageStyle:side'
                    ]
                },
                simpleUpload: {
                    uploadUrl: '{{ route('blog.upload-image') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
