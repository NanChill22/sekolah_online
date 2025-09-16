@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fa fa-users"></i> Data Pendaftaran</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($pendaftaran->isEmpty())
                <p class="text-muted">Belum ada data pendaftaran.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendaftaran as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nisn }}</td>
                                    <td>{{ $p->asal_sekolah }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>
                                        @if($p->status == 'diterima')
                                            <span class="badge bg-success">Diterima</span>
                                        @elseif($p->status == 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @elseif($p->status == 'diverifikasi')
                                            <span class="badge bg-info text-dark">Diverifikasi</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->created_at ? $p->created_at->format('d M Y H:i') : '-' }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.pendaftaran.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.pendaftaran.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
