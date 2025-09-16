@extends('layouts.app')

@section('content')
<div class="container">
    {{-- FORM INPUT PENGUMUMAN --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="fa fa-bullhorn"></i> Kelola Pengumuman</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengumuman</label>
                    <textarea name="isi" class="form-control" rows="6" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
    </div>

    {{-- DAFTAR PENGUMUMAN --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="fa fa-list"></i> Daftar Pengumuman</h5>
        </div>
        <div class="card-body">
            @forelse($listPengumuman as $p)
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>{{ $p->judul }}</h5>
                    <p>{{ $p->isi }}</p>
                    <small class="text-muted">Dibuat: {{ $p->created_at->format('d M Y H:i') }}</small>
                </div>
            @empty
                <p class="text-muted">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
