<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;   // ✅ untuk hapus file
use App\Models\Upload;                    // ✅ pakai model Upload

class UploadController extends Controller
{
    /**
     * Tampilkan form upload untuk jenis dokumen tertentu
     */
    public function index($jenis)
    {
        $colors = [
            'ktp'         => 'primary',
            'kk'          => 'success',
            'akta'        => 'info',
            'ijazah'      => 'warning',
            'raport'      => 'secondary',
            'surat_sehat' => 'danger',
            'kip'         => 'dark',
            'sertifikat'  => 'purple',
            'foto'        => 'teal',
            'domisili'    => 'orange',
        ];

        $color = $colors[$jenis] ?? 'secondary';

        return view('siswa.upload', compact('jenis', 'color'));
    }

    /**
     * Simpan file upload ke storage & database
     */
    public function store(Request $request, $jenis)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan ke storage/public/uploads/{jenis}
        $path = $request->file('file')->store("uploads/{$jenis}", 'public');

        Upload::create([
            'user_id'   => Auth::id(),
            'jenis'     => $jenis,
            'file_path' => $path,
            'nama_file' => $request->file('file')->getClientOriginalName(), // simpan nama asli
        ]);

        return redirect()->route('siswa.upload.list')
                         ->with('success', "Dokumen {$jenis} berhasil diupload!");
    }

    /**
     * List dokumen yg diupload user
     */
    public function list()
    {
        $uploads = Upload::where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('siswa.upload_list', compact('uploads'));
    }

    /**
     * Hapus file upload dari storage & database
     */
    public function destroy($id)
    {
        $upload = Upload::where('user_id', Auth::id())->findOrFail($id);

        // hapus file dari storage
        if (Storage::disk('public')->exists($upload->file_path)) {
            Storage::disk('public')->delete($upload->file_path);
        }

        $upload->delete();

        return back()->with('success', 'Dokumen berhasil dihapus!');
    }
}
