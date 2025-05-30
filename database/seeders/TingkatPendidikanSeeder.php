<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TingkatPendidikanSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Tingkat Pendidikan.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('tingkat_pendidikans')->insert([
                'id_rw'            => $rwMap[$row['Nama RW']] ?? null,
                'jenis_kelamin'    => $row['Jenis Kelamin'],
                'tidak_sekolah'    => (int) $row['tidak_sekolah'],
                'tidak_tamat_sd'   => (int) $row['tidak_tamat_sd'],
                'tamat_sd'         => (int) $row['tamat_sd'],
                'tamat_smp'        => (int) $row['tamat_smp'],
                'tamat_sma'        => (int) $row['tamat_sma'],
                'tamat_pt'         => (int) $row['tamat_pt'],
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
