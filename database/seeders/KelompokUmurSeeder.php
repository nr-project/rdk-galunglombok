<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KelompokUmurSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Kelompok Umur.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        $fieldMap = [
            "0 - 1" => "umur_0_1",
            "2 - 4" => "umur_2_4",
            "5 - 9" => "umur_5_9",
            "10 - 14" => "umur_10_14",
            "15 - 19" => "umur_15_19",
            "20 - 24" => "umur_20_24",
            "25 - 29" => "umur_25_29",
            "30 - 34" => "umur_30_34",
            "35 - 39" => "umur_35_39",
            "40 - 44" => "umur_40_44",
            "45 - 49" => "umur_45_49",
            "50 - 54" => "umur_50_54",
            "55 - 59" => "umur_55_59",
            "60 - 64" => "umur_60_64",
            "65 - 69" => "umur_65_69",
            "70 - 74" => "umur_70_74",
            "75+"     => "umur_75"
        ];

        foreach ($data as $row) {
            $entry = [
                'id_rw' => $rwMap[$row['Nama RW']] ?? null,
                'jenis_kelamin' => $row['Jenis Kelamin'],
            ];

            foreach ($fieldMap as $jsonKey => $dbKey) {
                $entry[$dbKey] = (int) $row[$jsonKey];
            }

            DB::table('kelompok_umurs')->insert($entry);
        }
    }
}
