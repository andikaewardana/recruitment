<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'id_jobs',
        'nama_pelamar',
        'data_pelamar',
        'pendidikan',
        'pengalaman_kerja',
        'wawancara',
        'test_skill',
        'psikotest',
        'nilai_akhir',
    ];
}
