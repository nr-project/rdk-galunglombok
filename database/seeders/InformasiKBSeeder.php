<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InformasiKBSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Informasi KB.json'));
        $dataList = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($dataList as $item) {
            DB::table('informasi_k_b_s')->insert([
                'id_rw' => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_pus_peserta_kb_dan_pernah_kb' => (int) $item['JUMLAH PUS  PESERTA KB DAN PERNAH KB'],
                'jenis_alat_obat_cara_kb_kontrasepsi' => (int) $item['JENIS-JENIS ALAT/OBAT/CARA KB KONTRASEPSI'],
                'efek_samping_alat_obat_cara_kb_kontrasepsi' => (int) $item[' EFEK SAMPING ALAT/OBAT/CARA KB KONTRASEPSI'],
                'apa_yang_harus_dilakukan_jika_efek_samping' => (int) $item['APA YANG HARUS DILAKUKAN APABILA MENGALAMI EFEK SAMPING ALAT/OBAT/CARA KB KONTRASEPSI'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
