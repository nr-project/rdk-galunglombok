<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KeinginanHamilSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Keinginan Hamil.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('keinginan_hamils')->insert([
                'id_rw'                       => $rwMap[$row['Nama RW']] ?? null,
                'jumlah_pus_status_hamil'     => (int) $row['WUS Hamil'],
                'ingin_hamil_saat_itu'        => (int) $row['Ingin hamil'],
                'ingin_hamil_nantikedepan'    => (int) $row['IAT'],
                'tidak_ingin_anak_lagi'       => (int) $row['TIAL'],
                'created_at'                  => now(),
                'updated_at'                  => now(),
            ]);
        }
    }
}
