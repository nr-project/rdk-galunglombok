<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusAnakStatusKbSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Anak dan Status KB.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $item) {
            DB::table('p_u_s_anakdan_status_k_b_s')->insert([
                'id_rw'                                => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_pus'                           => (int) $item['JUMLAH PUS'],

                '0_anak_peserta_kb_modern'             => (int) $item['0_MODERN'],
                '0_anak_peserta_kb_tradisional'        => (int) $item['0_TRADISIONAL'],
                '0_anak_bukan_peserta_kb'              => (int) $item['0_TIDAK_KB'],

                '1_anak_peserta_kb_modern'             => (int) $item['1_MODERN'],
                '1_anak_peserta_kb_tradisional'        => (int) $item['1_TRADISIONAL'],
                '1_anak_bukan_peserta_kb'              => (int) $item['1_TIDAK_KB'],

                '2_anak_peserta_kb_modern'             => (int) $item['2_MODERN'],
                '2_anak_peserta_kb_tradisional'        => (int) $item['2_TRADISIONAL'],
                '2_anak_bukan_peserta_kb'              => (int) $item['2_TIDAK_KB'],

                'lebih_2_anak_peserta_kb_modern'       => (int) $item['3_MODERN'],
                'lebih_2_anak_peserta_kb_tradisional'  => (int) $item['3_TRADISIONAL'],
                'lebih_2_anak_bukan_peserta_kb'        => (int) $item['3_TIDAK_KB'],

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
