@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa fa-home"></i> Dashboard Siswa</h4>
        </div>
        <div class="card-body">
            <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
            <p>Gunakan menu di sebelah kiri untuk mengakses formulir, melihat status pendaftaran, dan membaca pengumuman terbaru.</p>

            <a href="{{ route('siswa.pengumuman') }}" class="btn btn-info mt-3">
                <i class="fa fa-bullhorn"></i> Lihat Pengumuman Terbaru
            </a>
        </div>
    </div>
</div>
@endsection
