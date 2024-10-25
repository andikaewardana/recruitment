<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penilaian = [
            [
                'id_jobs'           => 1,
                'nama_pelamar'      =>'Pelamar A',
                'data_pelamar'      => 0.8,
                'pendidikan'        => 0.8,
                'pengalaman_kerja'  => 0.8,
                'wawancara'         => 0.8,
                'test_skill'        => 0.8,
                'psikotest'         => 0.8,
            ],
            [
                'id_jobs'           => 1,
                'nama_pelamar'      =>'Pelamar B',
                'data_pelamar'      => 0.8,
                'pendidikan'        => 0.8,
                'pengalaman_kerja'  => 0.8,
                'wawancara'         => 0.8,
                'test_skill'        => 0.8,
                'psikotest'         => 0.8,
            ],
            [
                'id_jobs'           => 1,
                'nama_pelamar'      =>'Pelamar C',
                'data_pelamar'      => 0.8,
                'pendidikan'        => 0.8,
                'pengalaman_kerja'  => 0.8,
                'wawancara'         => 0.8,
                'test_skill'        => 0.8,
                'psikotest'         => 0.8,
            ],
        ];

        DB::table('penilaian')->insert($penilaian);
    }
}
