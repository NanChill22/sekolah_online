@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fa fa-edit"></i> Form Pendaftaran Siswa</h4>
        </div>
        <div class="card-body">
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

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
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
                <div class="mb-3">
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
                <div class="mb-3">
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
                <div class="mb-3">
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

                <!-- Upload Dokumen -->
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Dokumen (PDF/DOC/DOCX, max 4MB)</label>
                    <input type="file" 
                           name="file" 
                           id="file" 
                           class="form-control @error('file') is-invalid @enderror" 
                           required>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa.status') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-paper-plane"></i> Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
