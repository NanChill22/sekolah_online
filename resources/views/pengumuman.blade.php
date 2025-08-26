@extends('layouts.app') {{-- publik --}}

@section('content')
@php
    // fallback jika controller belum mengirim variabel
    $diterima = $diterima ?? collect();
    $ditolak  = $ditolak  ?? collect();
@endphp

<div class="container">
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
                <div class="col-md-6">
                    <h4>✅ Diterima</h4>
                    <ul>
                        @forelse($diterima as $s)
                            <li>{{ $s->nama }} - {{ $s->nisn }}</li>
                        @empty
                            <li>Belum ada data.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="col-md-6">
                    <h4>❌ Ditolak</h4>
                    <ul>
                        @forelse($ditolak as $s)
                            <li>{{ $s->nama }} - {{ $s->nisn }}</li>
                        @empty
                            <li>Belum ada data.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
