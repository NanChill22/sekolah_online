<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSiswa extends Model
{
    use HasFactory;

    protected $table = 'dokumen_siswa';

    protected $fillable = [
        'user_id',
        'jenis_dokumen',
        'file_path',
    ];
}
