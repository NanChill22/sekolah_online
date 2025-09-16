<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    // === Siswa ===
    public function create()
    {
        return view('siswa.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|digits:10|unique:pendaftarans,nisn',
            'nama'          => 'required|string|max:100',
            'asal_sekolah'  => 'required|string|max:100',
            'alamat'        => 'required|string|max:255',
            'file'          => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        // Upload file
        $path = $request->file('file')->store('dokumen_pendaftar', 'public');

        // Simpan ke database
        Pendaftaran::create([
            'user_id'       => Auth::id(),
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'asal_sekolah'  => $request->asal_sekolah,
            'alamat'        => $request->alamat,
            'dokumen'       => $path,
            'status'        => 'pending',
        ]);

        return redirect()->route('siswa.status')->with('success', 'Form berhasil dikirim!');
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->latest()->first();
        return view('siswa.status', compact('pendaftaran'));
    }

    // === Admin ===
    public function index()
    {
        $pendaftar = Pendaftaran::latest()->get();
        return view('admin.pendaftaran', compact('pendaftar'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diverifikasi,diterima,ditolak',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Status berhasil diperbarui.');
    }
        public function pengumuman()
    {
        // kalau ada data dari database bisa ambil misalnya dari model Pengumuman
        // $pengumuman = Pengumuman::latest()->get();

        // untuk sementara kita return view kosong
        return view('siswa.pengumuman');
    }
}
