<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JenisKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Jenis Kegiatan.json'));
        $dataList = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($dataList as $item) {
            DB::table('jenis_kegiatans')->insert([
                'id_rw' => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_individu_umur_10' => (int) $item['1'],
                'bekerja_umur_10_jumlah' => (int) $item['2'],
                'jumlah_individu_umur_10_14' => (int) $item['3'],
                'bekerja_umur_10_14_jumlah' => (int) $item['4'],
                'jumlah_individu_umur_15' => (int) $item['5'],
                'bekerja_umur_15_laki' => (int) $item['6'],
                'bekerja_umur_15_perempuan' => (int) $item['7'],
                'jumlah_bekerja' => (int) $item['8'],
                'tidak_bekerja_laki' => (int) $item['9'],
                'tidak_bekerja_perempuan' => (int) $item['10'],
                'jumlah_tidak_bekerja' => (int) $item['11'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
