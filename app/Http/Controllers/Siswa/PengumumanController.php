<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->first();
        $listPengumuman = Pengumuman::latest()->get();

        return view('siswa.pengumuman.index', compact('pengumuman', 'listPengumuman'));
    }
}
