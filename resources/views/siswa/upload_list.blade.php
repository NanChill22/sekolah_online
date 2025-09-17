@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Dokumen yang Sudah Diupload</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($uploads->isEmpty())
        <div class="alert alert-warning">Belum ada dokumen yang diupload.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Dokumen</th>
                    <th>File</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $upload)
                    <tr>
                        <td class="text-capitalize">{{ $upload->jenis }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $upload->file_path) }}" 
                               target="_blank" class="btn btn-sm btn-primary">
                                Lihat File
                            </a>
                        </td>
                        <td>{{ $upload->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <form action="{{ route('siswa.upload.destroy', $upload->id) }}" 
                                  method="POST" onsubmit="return confirm('Yakin hapus file ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('siswa.upload', 'ktp') }}" class="btn btn-success">+ Upload Lagi</a>
</div>
@endsection
