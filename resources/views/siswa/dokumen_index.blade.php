@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class="fa fa-folder-open"></i> Dokumen Saya</h3>

    <div class="row">
        @foreach($dokumen as $d)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 
                @if(in_array($d->jenis_dokumen, ['ktp','kia','kk','akta'])) border-primary
                @elseif(in_array($d->jenis_dokumen, ['ijazah','skl','raport'])) border-success
                @elseif(in_array($d->jenis_dokumen, ['kip','sertifikat','surat_sehat'])) border-warning
                @else border-info @endif">
                
                <div class="card-body text-center">
                    <i class="fa fa-file-alt fa-3x mb-2 text-secondary"></i>
                    <h6 class="fw-bold">{{ ucfirst($d->jenis_dokumen) }}</h6>
                    <a href="{{ asset('storage/' . $d->file_path) }}" 
                       class="btn btn-sm btn-outline-primary mt-2" target="_blank">
                       <i class="fa fa-eye"></i> Lihat
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
