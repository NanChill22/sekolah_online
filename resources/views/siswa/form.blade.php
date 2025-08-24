@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Formulir Pendaftaran Siswa</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Silakan isi data berikut dengan benar dan lengkap.</p>
                    
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nisn" class="form-label"><b>NISN</b></label>
                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN Anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label"><b>Nama Lengkap</b></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label"><b>Asal Sekolah</b></label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Contoh: SMP Negeri 1 Jakarta" required>
                        </div>
                        
                        <hr>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-paper-plane"></i> Kirim Pendaftaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection