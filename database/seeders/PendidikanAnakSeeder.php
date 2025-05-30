<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PendidikanAnakSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Pendidikan Anak.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('pendidikan_anaks')->insert([
                'id_rw'                 => $rwMap[$row['Nama Umur']] ?? null,
                'klasifikasi_umur'      => $row['Klasifikasi Umur'],
                'sekolah_lk'            => (int) $row['Sekolah Lk'],
                'tidak_sekolah_lk'      => (int) $row['Tidak Sekolah Lk'],
                'sekolah_pr'            => (int) $row['Sekolah Pr'],
                'tidak_sekolah_pr'      => (int) $row['Tidak Sekolah Pr'],
                'created_at'            => now(),
                'updated_at'            => now(),
            ]);
        }
    }
}
