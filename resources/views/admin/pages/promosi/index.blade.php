@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title mt-4">Manajemen Promosi</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Promosi</div>
                        <a href="{{ route('promosi.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus"></i> Tambah Promosi
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-3">
                            <thead>
                                <tr>
                                    <th>Nama Promosi</th>
                                    <th>Kategori</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($promosis as $promosi)
                                    <tr>
                                        <td>{{ $promosi->nama_promosi }}</td>
                                        <td>{{ $promosi->kategori_promosi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($promosi->jatuh_tempo)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('promosi.show', $promosi->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('promosi.edit', $promosi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('promosi.destroy', $promosi->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus promosi ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            <i class="fa fa-inbox fa-3x mb-3"></i>
                                            <br>
                                            Belum ada data promosi.
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
