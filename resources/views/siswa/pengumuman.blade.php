@extends('layouts.app')
@section('content')
<h3>Pengumuman Hasil Seleksi</h3>
@if($data->count())
<table class="table table-bordered"><thead><tr><th>Nama</th><th>NISN</th></tr></thead><tbody>
@foreach($data as $s)
<tr><td>{{ $s->nama }}</td><td>{{ $s->nisn }}</td></tr>
@endforeach
</tbody></table>
@else
<div class="alert alert-warning">Belum ada pengumuman.</div>
@endif
@endsection
