@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Main Card Wrapper for Design Consistency --}}
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa fa-bullhorn"></i> Pengumuman Hasil Seleksi</h4>
        </div>
        <div class="card-body">
            <p class="lead">Berikut adalah daftar siswa yang dinyatakan <strong>DITERIMA</strong> dan <strong>DITOLAK</strong> dalam proses seleksi.</p>
            <hr>

            @if($diterima->isEmpty() && $ditolak->isEmpty())
                <div class="alert alert-info text-center mt-4">
                    <h4 class="alert-heading"><i class="fa fa-clock"></i> Menunggu Hasil</h4>
                    <p class="mb-0">Proses seleksi masih berlangsung. Silakan periksa kembali halaman ini nanti.</p>
                </div>
            @else
                <div class="row">
                    {{-- Kolom Diterima --}}
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white d-flex align-items-center">
                                <i class="fa fa-check-circle fa-fw me-2"></i>
                                <h5 class="mb-0">Diterima</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @forelse($diterima as $s)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-user-check text-success fa-fw me-2"></i>{{ $s->nama }}</span>
                                            <span class="badge bg-light text-dark rounded-pill">{{ $s->nisn }}</span>
                                        </li>
                                    @empty
                                        <li class="list-group-item text-muted text-center">
                                            Belum ada siswa yang dinyatakan diterima.
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Ditolak --}}
                    <div class="col-lg-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white d-flex align-items-center">
                                <i class="fa fa-times-circle fa-fw me-2"></i>
                                <h5 class="mb-0">Ditolak</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @forelse($ditolak as $s)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-user-times text-danger fa-fw me-2"></i>{{ $s->nama }}</span>
                                            <span class="badge bg-light text-dark rounded-pill">{{ $s->nisn }}</span>
                                        </li>
                                    @empty
                                        <li class="list-group-item text-muted text-center">
                                            Belum ada siswa yang dinyatakan ditolak.
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection