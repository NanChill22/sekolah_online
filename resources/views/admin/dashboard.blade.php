@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
    {{-- Ini card Calon Murid --}}
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="card-body">
                <div class="card card-stats card-round">
                    <div class="row align-items-center d-flex justify-content-center align-items-center">
                        <div class="col-icon mt-2">
                            <div class="icon-big text-center icon-primary bubble-shadow-small" >
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0 d-flex justify-content-center align-items-center">
                            <div class="numbers text-center">
                                <p class="card-category">Total Pendaftar</p>
                                <h4 class="card-title">{{ $total }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card-body">
                <div class="card card-stats card-round">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-icon mt-2">
                            <div class="icon-big text-center icon-primary bubble-shadow-small" >
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0 d-flex justify-content-center align-items-center">
                            <div class="numbers text-center">
                                <p class="card-category">Terverifikasi</p>
                                <h4 class="card-title">{{ $terverifikasi }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card-body">
                <div class="card card-stats card-round">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-icon mt-2">
                            <div class="icon-big text-center icon-primary bubble-shadow-small" >
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0 d-flex justify-content-center align-items-center">
                            <div class="numbers text-center">
                                <p class="card-category">Belum Terverifikasi</p>
                                <h4 class="card-title">{{ $belum }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end card calon murid --}}
@endsection
