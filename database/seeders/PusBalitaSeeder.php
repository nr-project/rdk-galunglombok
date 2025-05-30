<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusBalitaSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Balita.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $item) {
            DB::table('p_u_s_balitas')->insert([
                'id_rw' => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_pus_dan_anak_terkecil_6bln' => (int) $item['JUMLAH PUS DENGAN ANAK TERKECIL UMUR ≤ 6 BULAN'],
                'jumlah_pus_punya_balita' => (int) $item['JUMLAH PUS PUNYA BALITA'],

                'peserta_kb_modern_0thn' => (int) $item['0_MODERN'],
                'peserta_kb_tradisional_0thn' => (int) $item['0_TRADISIONAL'],
                'bukan_peserta_kb_0thn' => (int) $item['0_TIDAK_KB'],

                'peserta_kb_modern_1thn' => (int) $item['1_MODERN'],
                'peserta_kb_tradisional_1thn' => (int) $item['1_TRADISIONAL'],
                'bukan_peserta_kb_1thn' => (int) $item['1_TIDAK_KB'],

                'peserta_kb_modern_2thn' => (int) $item['2_MODERN'],
                'peserta_kb_tradisional_2thn' => (int) $item['2_TRADISIONAL'],
                'bukan_peserta_kb_2thn' => (int) $item['2_TIDAK_KB'],

                'peserta_kb_modern_3thn' => (int) $item['3_MODERN'],
                'peserta_kb_tradisional_3thn' => (int) $item['3_TRADISIONAL'],
                'bukan_peserta_kb_3thn' => (int) $item['3_TIDAK_KB'],

                'peserta_kb_modern_4thn' => (int) $item['4_MODERN'],
                'peserta_kb_tradisional_4thn' => (int) $item['4_TRADISIONAL'],
                'bukan_peserta_kb_4thn' => (int) $item['4_TIDAK_KB'],

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
