<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WanitaKawinKelompokUmurSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Wanita Kawin Kelompok Umur.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('wanita_kawin_kelompok_umurs')->insert([
                'id_rw'                   => $rwMap[$row['Nama RW']] ?? null,
                'jumlah_wanita_kawin'    => (int) $row['Jumlah_wanita_kawin'],
                'umur_10_14'             => (int) $row['10 - 14'],
                'umur_15_19'             => (int) $row['15 - 19'],
                'umur_20_24'             => (int) $row['20 - 24'],
                'umur_25_29'             => (int) $row['25 - 29'],
                'umur_30_34'             => (int) $row['30 - 34'],
                'umur_35_39'             => (int) $row['35- 39'],
                'umur_40_44'             => (int) $row['40 - 44'],
                'umur_45_49'             => (int) $row['45 - 49'],
                'created_at'             => now(),
                'updated_at'             => now(),
            ]);
        }
    }
}
