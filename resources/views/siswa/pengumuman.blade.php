@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-info text-white d-flex align-items-center">
                    <i class="fa fa-bullhorn me-2"></i>
                    <h4 class="mb-0">Pengumuman</h4>
                </div>
                <div class="card-body p-4">

                    @if(isset($pengumuman) && $pengumuman->isNotEmpty())
                        @foreach($pengumuman as $p)
                            <div class="announcement-card mb-4 p-4 rounded shadow-sm">
                                <h5 class="fw-bold text-info">
                                    <i class="fa fa-circle-info me-2"></i>{{ $p->judul }}
                                </h5>
                                <p class="text-secondary mb-2">{{ $p->isi }}</p>
                                <small class="text-muted d-block">
                                    <i class="fa fa-calendar-alt me-1"></i>
                                    {{ $p->created_at->format('d M Y H:i') }}
                                </small>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center text-muted py-5">
                            <i class="fa fa-inbox fa-2x mb-3"></i>
                            <p class="mb-0">Belum ada pengumuman.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Tambahan styling biar elegan --}}
@push('styles')
<style>
    .announcement-card {
        background: #f8f9fa;
        border-left: 5px solid #0dcaf0; /* garis aksen warna info */
        transition: all 0.3s ease;
    }
    .announcement-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
@endsection
