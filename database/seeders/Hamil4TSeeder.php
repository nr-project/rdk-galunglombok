<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Hamil4TSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/Hamil4T.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('hamil4_t_s')->insert([
                'id_rw' => $rwMap[$row['Nama RW']] ?? null,

                'jumlah_pus_status_hamil' => (int) $row['JUMLAH PUS (WANITA KAWIN)  STATUS HAMIL'],
                'umur_kurang_20' => (int) $row['< 20 (TERLALU MUDA)'],
                'umur_20_35' => (int) $row['20-35'],
                'umur_lebih_35' => (int) $row['> 35 (TERLALU TUA)'],
                'jumlah_anak_lahir_lebih_2' => (int) $row['YANG JUMLAH ANAK LAHIR HIDUP > 2 ANAK (TERLALU BANYAK)'],
                'jarak_kelahiran_sebelumnya_kurang_2_tahun' => (int) $row['YANG JARAK KELAHIRAN SEBELUMNYA DENGAN KEHAMILAN < 2 TAHUN (TERLALU '],
                'umur_anak_terkecil_kurang_3_tahun' => (int) $row['YANG UMUR ANAK TERKECIL < 3 TAHUN'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
