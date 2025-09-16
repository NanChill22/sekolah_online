@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa fa-info-circle"></i> Status Pendaftaran</h4>
        </div>
        <div class="card-body">
            @if ($pendaftaran)
                <p><strong>Nama:</strong> {{ $pendaftaran->nama }}</p>
                <p><strong>NISN:</strong> {{ $pendaftaran->nisn }}</p>
                <p><strong>Asal Sekolah:</strong> {{ $pendaftaran->asal_sekolah }}</p>
                <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
                <p><strong>Dokumen:</strong> 
                    @if ($pendaftaran->dokumen)
                        <a href="{{ asset('storage/'.$pendaftaran->dokumen) }}" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fa fa-file"></i> Lihat Dokumen
                        </a>
                    @else
                        <span class="text-muted">Belum ada</span>
                    @endif
                </p>
                <p><strong>Status:</strong> 
                    @if($pendaftaran->status == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @elseif($pendaftaran->status == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @elseif($pendaftaran->status == 'diverifikasi')
                        <span class="badge bg-info text-dark">Diverifikasi</span>
                    @else
                        <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                </p>
            @else
                <div class="alert alert-warning">
                    Anda belum mengisi formulir pendaftaran.
                </div>
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Isi Formulir
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
