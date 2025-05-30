<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusTempatKbSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Tempat KB.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $item) {
            DB::table('p_u_s_tempat_k_b_s')->insert([
                'id_rw' => $rwMap[$item['RW']] ?? null,
                'jumlah_pus_modern'              => (int) $item['JUMLAH PUS PESERTA KB MODERN'],
                'rs_pemerintah_tni_polri'        => (int) $item['RS PEMERINTAH/ TNI/POLRI'],
                'rs_swasta'                      => (int) $item['RS SWASTA'],
                'puskesmas_klinik_tni_polri'     => (int) $item['PUSKESMAS/ KLINIK TNI/POLRI'],
                'klinik_swasta'                  => (int) $item['KLINIK SWASTA'],
                'praktek_dokter'                 => (int) $item['PRAKTEK DOKTER'],
                'pustu_pusling_bidan_desa'       => (int) $item['PUSTU/ PUSLING/ BIDAN DESA'],
                'praktek_mandiri_bidan'          => (int) $item['PRAKTEK MANDIRI BIDAN'],
                'mobil_pelayanan_kb'             => (int) $item['MOBIL PELAYANAN KB'],
                'toko_obat_apotik'               => (int) $item['TOKO OBAT/APOTIK'],
                'lainnya'                        => (int) $item['LAINNYA'],
                'created_at'                     => now(),
                'updated_at'                     => now(),
            ]);
        }
    }
}
