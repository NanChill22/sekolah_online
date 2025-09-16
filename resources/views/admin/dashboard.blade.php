@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <!-- Selamat Datang dengan Animasi -->
    <div class="mb-4">
        <div class="p-4 p-md-5 rounded-4 text-white bg-gradient-animated text-center shadow-lg">
            <h1 class="fw-bold mb-2 animate__animated animate__fadeInDown display-6 display-md-4">Selamat Datang, Admin!</h1>
            <p class="lead animate__animated animate__fadeInUp fs-6 fs-md-4">Dashboard PPDB Online</p>
        </div>
    </div>

    <!-- Statistik Pendaftar -->
    <div class="row g-3 text-center">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body py-4">
                    <h5 class="fw-bold mb-2">Total Pendaftar</h5>
                    <h3 class="text-primary mb-0">{{ $total }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body py-4">
                    <h5 class="fw-bold mb-2">Terverifikasi</h5>
                    <h3 class="text-success mb-0">{{ $terverifikasi }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body py-4">
                    <h5 class="fw-bold mb-2">Belum Diverifikasi</h5>
                    <h3 class="text-warning mb-0">{{ $belum }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
/* Gradient Animasi */
.bg-gradient-animated {
    background: linear-gradient(270deg, #4e54c8, #8f94fb, #4e54c8);
    background-size: 600% 600%;
    animation: gradientAnimation 15s ease infinite;
}

@keyframes gradientAnimation {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Import Fonts & Animate.css */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

body {
    font-family: 'Poppins', sans-serif;
}

/* Card Responsive Height */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Typography Responsive */
.display-6 { font-size: 1.75rem; }
@media(min-width: 768px) {
    .display-md-4 { font-size: 2.5rem; }
}

/* Padding Responsif */
.p-4 { padding: 1.5rem !important; }
.p-md-5 { padding: 3rem !important; }

/* Text Responsive */
.fs-6 { font-size: 1rem; }
.fs-md-4 { font-size: 1.5rem; }

</style>
