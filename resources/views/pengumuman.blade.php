@extends('layouts.app') {{-- publik --}}

@section('content')
@php
    // fallback jika controller belum mengirim variabel
    $diterima = $diterima ?? collect();
    $ditolak  = $ditolak  ?? collect();
@endphp

<div class="container">
    <h1>Pengumuman Hasil Seleksi</h1>
    <p>Berikut adalah hasil seleksi siswa yang sudah diverifikasi.</p>

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
</div>
@endsection
