@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card border-0 shadow-lg rounded-4 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-{{ $color }} text-white text-center rounded-top-4 py-3">
                    <h4 class="fw-bold mb-0 text-capitalize">
                        <i class="fa fa-upload me-2"></i> Upload Dokumen: {{ str_replace('_',' ', $jenis) }}
                    </h4>
                </div>

                <div class="card-body p-4">

                    {{-- Pesan sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm">
                            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Form upload --}}
                    <form action="{{ route('siswa.upload.store', $jenis) }}" 
                          method="POST" enctype="multipart/form-data" 
                          class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="file" class="form-label fw-semibold">
                                <i class="fa fa-file-alt me-2"></i> Pilih File (jpg, jpeg, png, pdf)
                            </label>
                            <input type="file" 
                                   class="form-control form-control-lg @error('file') is-invalid @enderror shadow-sm"
                                   name="file" id="file" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex flex-column flex-md-row gap-3">
                            <button type="submit" class="btn btn-lg btn-{{ $color }} flex-fill shadow-sm">
                                <i class="fa fa-cloud-upload-alt me-2"></i> Upload
                            </button>
                            <a href="{{ route('siswa.upload.index') }}" class="btn btn-lg btn-outline-secondary flex-fill shadow-sm">
                                <i class="fa fa-folder-open me-2"></i> Lihat Semua Upload
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
