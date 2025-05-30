<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusMetodeKbSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Metode KB.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('p_u_s_metode_k_b_s')->insert([
                'id_rw'               => $rwMap[$row['Nama RW']] ?? null,
                'jumlah_pus_modern'  => (int) $row['JUMLAH PUS PESERTA KB MODERN'],
                'mow'                => (int) $row['MOW'],
                'mop'                => (int) $row['MOP'],
                'iud'                => (int) $row['IUD'],
                'implan'             => (int) $row['IMPLAN'],
                'suntik'             => (int) $row['SUNTIK'],
                'pil'                => (int) $row['PIL'],
                'kondom'             => (int) $row['KONDOM'],
                'mal'                => (int) $row['MAL'],
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }
}
