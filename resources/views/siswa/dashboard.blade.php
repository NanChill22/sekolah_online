@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Dashboard Siswa</h1>
            </div>
            <div class="card-body">
                <p class="fs-5">Selamat datang, <strong>{{ Auth::user()->name }}!</strong></p>
                <p>Ini adalah halaman dasbor Anda. Silakan gunakan menu di samping untuk mengakses fitur lainnya.</p>
            </div>
        </div>
    </div>
@endsection