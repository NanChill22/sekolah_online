@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="fa fa-bullhorn"></i> Pengumuman</h4>
        </div>
        <div class="card-body">
            @if(isset($pengumuman) && $pengumuman->isNotEmpty())
                @foreach($pengumuman as $p)
                    <div class="mb-4 p-3 border rounded bg-light">
                        <h5 class="fw-bold">{{ $p->judul }}</h5>
                        <p>{{ $p->isi }}</p>
                        <small class="text-muted">
                            Diumumkan: {{ $p->created_at->format('d M Y H:i') }}
                        </small>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada pengumuman.</p>
            @endif
        </div>
    </div>
</div>
@endsection
