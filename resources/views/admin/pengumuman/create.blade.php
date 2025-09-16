@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4><i class="fa fa-plus"></i> Tambah Pengumuman</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" rows="6" required>{{ old('isi') }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
