<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumen'; // atau 'pengumuman' kalau kamu mau custom
    protected $fillable = ['judul', 'isi'];
}
