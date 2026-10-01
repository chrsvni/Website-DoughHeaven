@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="admin-page-header">
            <div>
                <h2>Manajemen Ulasan Pelanggan</h2>
                <p>Pantau feedback, ulasan rasa, dan pesan dari para pecinta donat DoughHeaven.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                <i class="bi bi-exclamation-triangle-fill mr-2"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Daftar Feedback Pengguna</div>
                        <span class="text-muted" style="font-size: 13px;">Total: {{ $ulasans->count() }} Ulasan Masuk</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Pengirim</th>
                                        <th>Subjek Pesan</th>
                                        <th>Isi Ulasan</th>
                                        <th>Waktu Kirim</th>
                                        <th style="width: 140px;" class="text-center">Status Web</th>
                                        <th style="width: 210px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ulasans as $ulasan)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span style="display:inline-flex; width: 38px; height: 38px; border-radius: 50%; background: #fff0f3; color: #e75b7a; align-items: center; justify-content: center; margin-right: 12px; font-weight: bold; font-size: 14px;">
                                                        {{ strtoupper(substr($ulasan->nama, 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-bold text-dark">{{ $ulasan->nama }}</div>
                                                        <small class="text-muted">{{ $ulasan->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge-pill-custom badge-info-soft font-weight-medium">
                                                    {{ $ulasan->subjek }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="text-dark" style="font-size: 13.5px; max-width: 300px;">
                                                    {{ $ulasan->isi }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted" style="font-size: 13px;">
                                                    <i class="bi bi-clock mr-1"></i>
                                                    {{ $ulasan->created_at->format('d M Y H:i') }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if ($ulasan->tampilkan)
                                                    <span class="badge-pill-custom badge-success-soft" style="font-size: 12px; padding: 5px 12px;">
                                                        <i class="bi bi-check-circle-fill mr-1"></i> Tampil
                                                    </span>
                                                @else
                                                    <span class="badge-pill-custom badge-warning-soft" style="font-size: 12px; padding: 5px 12px;">
                                                        <i class="bi bi-hourglass-split mr-1"></i> Menunggu
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    <form action="{{ route('ulasan.toggle', $ulasan->id) }}" method="POST" style="display: inline;" class="mr-1">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($ulasan->tampilkan)
                                                            <button type="submit" class="btn btn-outline-secondary btn-sm btn-sm-action" title="Sembunyikan ulasan dari halaman user">
                                                                <i class="bi bi-eye-slash"></i> Sembunyikan
                                                            </button>
                                                        @else
                                                            <button type="submit" class="btn btn-outline-success btn-sm btn-sm-action font-weight-bold" title="Tampilkan ulasan ke halaman user">
                                                                <i class="bi bi-eye"></i> Tampilkan
                                                            </button>
                                                        @endif
                                                    </form>
                                                    <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-sm-action"
                                                            onclick="return confirm('Yakin ingin menghapus ulasan dari {{ $ulasan->nama }}?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <i class="bi bi-chat-heart" style="font-size: 40px; color: #cbd5e1;"></i>
                                                <p class="mt-2 mb-0">Belum ada feedback atau ulasan dari pelanggan.</p>
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
    </div>
@endsection
