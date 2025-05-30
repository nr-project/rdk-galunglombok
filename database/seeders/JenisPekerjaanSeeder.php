<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JenisPekerjaanSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Jenis Pekerjaan.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $item) {
            DB::table('jenis_pekerjaans')->insert([
                'id_rw' => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_individu_dalam_keluarga' => (int) $item['JUMLAH INDIVIDU DALAM KELUARGA'],
                'petani_jumlah' => (int) $item['PETANI'],
                'nelayan_jumlah' => (int) $item['NELAYAN'],
                'pedagang_jumlah' => (int) $item['PEDAGANG'],
                'pejabat_negara_jumlah' => (int) $item['PEJABAT NEGARA'],
                'pns_tni_polri_jumlah' => (int) $item['PNS/TNI/POLRI'],
                'swasta_jumlah' => (int) $item['SWASTA'],
                'pensiunan_jumlah' => (int) $item['PENSIUNAN'],
                'pekerja_lepas_jumlah' => (int) $item['PEKERJA LEPAS'],
                'jumlah_bekerja' => (int) $item['JUMLAH  BEKERJA'],
                'tidak_bekerja_jumlah' => (int) $item['TIDAK BEKERJA'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
