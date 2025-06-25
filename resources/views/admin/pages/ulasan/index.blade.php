@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Manajemen Ulasan</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Ulasan Pengguna</div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-3">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>Isi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ulasans as $ulasan)
                                    <tr>
                                        <td>{{ $ulasan->nama }}</td>
                                        <td>{{ $ulasan->email }}</td>
                                        <td>{{ $ulasan->subjek }}</td>
                                        <td>{{ Str::limit($ulasan->isi, 50) }}</td>
                                        <td>{{ $ulasan->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus ulasan ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            <i class="fa fa-inbox fa-3x mb-3"></i>
                                            <br>
                                            Belum ada data ulasan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
