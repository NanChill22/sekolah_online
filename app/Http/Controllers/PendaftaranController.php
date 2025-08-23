<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth; // <-- TAMBAHKAN BARIS INI

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // ... (kode validasi Anda) ...
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftarans,nisn',
            'alamat' => 'required|string',
            'dokumen' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Ganti auth()->id() dengan Auth::id()
        $validatedData['user_id'] = Auth::id(); // <-- PERBAIKAN DI SINI

        // ... (sisa kode Anda) ...
        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen', 'public');
        }

        Pendaftaran::create($validatedData);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
        public function status() 
    {
        // PERBAIKAN: Gunakan Auth::id()
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();
        
        return view('siswa.status', compact('pendaftaran'));
    }
}