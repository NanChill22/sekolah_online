<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('siswa.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|digits:10|unique:pendaftarans,nisn',
            'nama' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:100',
            'alamat' => 'string',
            'file' => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        // Simpan file ke storage/app/public/dokumen
        $path = $request->file('file')->store('dokumen_pendaftar', 'public');

        Pendaftaran::create([
            'user_id' => Auth::id(),
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'dokumen' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('siswa.status')->with('success', 'Form berhasil dikirim!');
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();
        return view('siswa.status', compact('pendaftaran'));
    }

// app/Http/Controllers/PendaftaranController.php

public function pengumuman()
{
    // pastikan import model: use App\Models\Pendaftaran;
    $diterima = Pendaftaran::where('status', 'diterima')->get();
    $ditolak  = Pendaftaran::where('status', 'ditolak')->get();

    return view('pengumuman', compact('diterima', 'ditolak'));
}


}
