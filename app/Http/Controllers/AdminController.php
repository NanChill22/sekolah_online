<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pengumuman;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total = Pendaftaran::count();
        $terverifikasi = Pendaftaran::where('status', 'diterima')->count();
        $belum = Pendaftaran::where('status', 'pending')->count();

        return view('admin.dashboard', compact('total', 'terverifikasi', 'belum'));
    }

    // ✅ INDEX
    public function pendaftaran()
    {
        $pendaftaran = Pendaftaran::latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    // ✅ CREATE
    public function createPendaftaran()
    {
        return view('admin.pendaftaran.create');
    }

    // ✅ STORE
    public function storePendaftaran(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|unique:pendaftarans',
            'no_hp'  => 'required|string|max:15',
            'status' => 'nullable|string',
        ]);

        Pendaftaran::create($request->all());

        return redirect()->route('admin.pendaftaran')->with('success', 'Pendaftaran berhasil ditambahkan!');
    }

    // ✅ EDIT
    public function editPendaftaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    // ✅ UPDATE
    public function updatePendaftaran(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|unique:pendaftarans,email,' . $pendaftaran->id,
            'no_hp'  => 'required|string|max:15',
            'status' => 'nullable|string',
        ]);

        $pendaftaran->update($request->all());

        return redirect()->route('admin.pendaftaran')->with('success', 'Pendaftaran berhasil diperbarui!');
    }

    // ✅ DESTROY
    public function destroyPendaftaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran')->with('success', 'Pendaftaran berhasil dihapus!');
    }

    // ✅ Verifikasi manual (ubah status diterima)
    public function verifikasi($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->status = 'diterima';
        $data->save();

        return redirect()->route('admin.pendaftaran')->with('success', 'Siswa berhasil diverifikasi!');
    }

    // =======================
    // PENGUMUMAN
    // =======================
    public function pengumuman()
    {
        $listPengumuman = Pengumuman::latest()->get();
        $pengumuman = Pengumuman::latest()->first();

        return view('admin.pengumuman', compact('listPengumuman', 'pengumuman'));
    }

    public function storePengumuman(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil disimpan.');
    }
}
