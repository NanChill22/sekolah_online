<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    // Nama tabel (opsional, kalau tidak sesuai konvensi Laravel)
    protected $table = 'pendaftarans';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'user_id',
        'nisn',
        'nama',
        'asal_sekolah',
        'alamat',
        'dokumen',
        'status',
    ];

    // Relasi ke user (jika ada tabel users)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
