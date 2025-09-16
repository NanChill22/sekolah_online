@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pengumuman</h2>

    @if($pengumuman)
        <div class="alert alert-info">
            <h4>{{ $pengumuman->judul }}</h4>
            <p>{{ $pengumuman->isi }}</p>
        </div>
    @else
        <p>Belum ada pengumuman.</p>
    @endif

    <hr>

    <h3>Daftar Pengumuman</h3>
    <ul>
        @foreach($listPengumuman as $item)
            <li><strong>{{ $item->judul }}</strong> - {{ $item->isi }}</li>
        @endforeach
    </ul>
</div>
@endsection
