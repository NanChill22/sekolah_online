@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa fa-users"></i> Data Pendaftar Siswa</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Asal Sekolah</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftar as $s)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->asal_sekolah }}</td>
                            <td class="text-center">
                                @if($s->status == 'Diterima')
                                    <span class="badge bg-success">{{ $s->status }}</span>
                                @elseif($s->status == 'Ditolak')
                                    <span class="badge bg-danger">{{ $s->status }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $s->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($s->status == 'Diproses')
                                    <div class="btn-group" role="group">
                                        <!-- Tombol Terima -->
                                        <form action="{{ route('admin.pendaftaran.updateStatus', $s->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Diterima">
                                            <button type="submit" class="btn btn-success btn-sm" title="Terima Pendaftar">
                                                <i class="fa fa-check"></i> Terima
                                            </button>
                                        </form>
                                        <!-- Tombol Tolak -->
                                        <form action="{{ route('admin.pendaftaran.updateStatus', $s->id) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-danger btn-sm" title="Tolak Pendaftar">
                                                <i class="fa fa-times"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">Selesai</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fa fa-folder-open fa-2x mb-2"></i>
                                <p class="mb-0">Belum ada data pendaftar.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection