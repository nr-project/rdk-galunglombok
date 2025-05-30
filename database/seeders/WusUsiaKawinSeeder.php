<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WusUsiaKawinSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/WUS Usia Kawin.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('w_u_s_usia_kawins')->insert([
                'id_rw'       => $rwMap[$row['Nama RW']] ?? null,
                'dibawah_20'  => (int) $row['dibawah_20'],
                'diatas_20'   => (int) $row['diatas_20'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
