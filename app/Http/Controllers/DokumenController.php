<?php

namespace App\Http\Controllers;

use App\Models\DokumenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    // Menampilkan form upload berdasarkan jenis dokumen
    public function create($jenis)
    {
        return view('siswa.upload', compact('jenis'));
    }

    // Proses simpan upload
    public function store(Request $request, $jenis)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // simpan file
        $path = $request->file('file')->store('dokumen', 'public');

        DokumenSiswa::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'jenis_dokumen' => $jenis,
            ],
            [
                'file_path' => $path,
            ]
        );

        return redirect()->back()->with('success', ucfirst($jenis) . ' berhasil diupload!');
    }
    

    // Untuk lihat daftar semua dokumen
    public function index()
    {
        $dokumen = DokumenSiswa::where('user_id', Auth::id())->get();
        return view('siswa.dokumen_index', compact('dokumen'));
    }
    
}
