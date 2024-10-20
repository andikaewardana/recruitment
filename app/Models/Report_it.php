<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_it extends Model
{
    use HasFactory;

    protected $table = 'report_it';

    protected $fillable = [
        'tanggal',
        'jenis',
        'masalah',
        'uraian_permasalahan',
        'solusi',
        'keterangan',
        'user',
        'status',
        'engineer',
    ];
}
