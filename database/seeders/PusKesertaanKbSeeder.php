<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusKesertaanKbSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Status KB.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('p_u_s_kesertaan_k_b_s')->insert([
                'id_rw'                       => $rwMap[$row['RW']] ?? null,
                'jumlah_pus'                 => (int) $row['JUMLAH PUS'],
                'pus_peserta_kb_modern'      => (int) $row['MODERN'],
                'pus_peserta_kb_tradisional' => (int) $row['TRADISIONAL'],
                'jumlah_pus_peserta_kb'      => (int) $row['JUMLAH PUS PESERTA KB'],
                'pus_bukan_peserta_kb'       => (int) $row['PUS BUKAN PESERTA KB'],
                'created_at'                 => now(),
                'updated_at'                 => now(),
            ]);
        }
    }
}
