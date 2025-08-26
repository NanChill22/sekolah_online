@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fa fa-info-circle"></i> Status Pendaftaran Anda</h4>
                </div>
                <div class="card-body">
                    @if(isset($pendaftaran) && $pendaftaran)
                        <p>Berikut adalah status pendaftaran Anda saat ini:</p>
                        <div class="alert alert-light p-4 rounded-3 text-center">
                            <h2 class="display-5">
                                @if($pendaftaran->status == 'Diterima')
                                    <span class="badge bg-success">
                                        <i class="fa fa-check-circle"></i> {{ $pendaftaran->status }}
                                    </span>
                                @elseif($pendaftaran->status == 'Ditolak')
                                    <span class="badge bg-danger">
                                        <i class="fa fa-times-circle"></i> {{ $pendaftaran->status }}
                                    </span>
                                @elseif($pendaftaran->status == 'Diproses')
                                     <span class="badge bg-warning text-dark">
                                        <i class="fa fa-spinner fa-spin"></i> {{ $pendaftaran->status }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fa fa-question-circle"></i> {{ $pendaftaran->status }}
                                    </span>
                                @endif
                            </h2>
                            <p class="mt-3 mb-0 text-muted">Data terakhir diperbarui pada: {{ $pendaftaran->updated_at->timezone('Asia/Jakarta')->format('d F Y, H:i') }} WIB</p>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Data Tidak Ditemukan!</h4>
                            <p>Anda sepertinya belum melakukan pendaftaran. Silakan isi formulir pendaftaran terlebih dahulu.</p>
                            <hr>
                            <a href="{{ route('siswa.form') }}" class="btn btn-primary">
                                <i class="fa fa-file-alt"></i> Buka Formulir Pendaftaran
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection