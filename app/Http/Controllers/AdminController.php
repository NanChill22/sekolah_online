<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total = Pendaftaran::count();
        $terverifikasi = Pendaftaran::where('status', 'diterima')->count();
        $belum = Pendaftaran::where('status', 'pending')->count();

        return view('admin.dashboard', compact('total', 'terverifikasi', 'belum'));
    }

    public function pendaftaran()
    {
        $pendaftar = Pendaftaran::all();
        return view('admin.pendaftaran', compact('pendaftar'));
    }

    public function verifikasi($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->status = 'diterima';
        $data->save();

        return redirect()->route('admin.pendaftaran')->with('success', 'Siswa berhasil diverifikasi!');
    }
// app/Http/Controllers/AdminController.php

public function pengumuman()
{
    $diterima = Pendaftaran::where('status', 'diterima')->get();
    $ditolak  = Pendaftaran::where('status', 'ditolak')->get();

    return view('admin.pengumuman', compact('diterima', 'ditolak'));
}



}
