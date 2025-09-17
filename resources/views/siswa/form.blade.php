@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fa fa-edit me-2"></i> Form Pendaftaran Siswa</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Alert Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <!-- Nama -->
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" 
                                       name="nama" 
                                       id="nama" 
                                       class="form-control @error('nama') is-invalid @enderror" 
                                       value="{{ old('nama') }}" 
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NISN -->
                            <div class="col-md-6">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" 
                                       name="nisn" 
                                       id="nisn" 
                                       class="form-control @error('nisn') is-invalid @enderror" 
                                       value="{{ old('nisn') }}" 
                                       required>
                                @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" 
                                          id="alamat" 
                                          rows="3" 
                                          class="form-control @error('alamat') is-invalid @enderror" 
                                          required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Asal Sekolah -->
                            <div class="col-12">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" 
                                       name="asal_sekolah" 
                                       id="asal_sekolah" 
                                       class="form-control @error('asal_sekolah') is-invalid @enderror" 
                                       value="{{ old('asal_sekolah') }}" 
                                       required>
                                @error('asal_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                            <a href="{{ route('siswa.status') }}" class="btn btn-secondary mb-2 mb-md-0 w-100 w-md-auto">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success w-100 w-md-auto">
                                <i class="fa fa-paper-plane me-1"></i> Kirim Pendaftaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
