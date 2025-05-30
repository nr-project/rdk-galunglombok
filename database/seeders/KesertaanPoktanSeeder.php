<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KesertaanPoktanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/Kesertaan Poktan.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $row) {
            DB::table('kesertaan_poktans')->insert([
                'id_rw'          => $rwMap[$row['Nama RW']] ?? null,
                'poktan'         => $row['Poktan'],
                'total_keluarga' => (int) $row['total_keluarga'],
                'total_ikut'     => (int) $row['total_ikut'],
                'bukan_pus'      => (int) $row['bukan_pus'],
                'mow'            => (int) $row['mow'],
                'mop'            => (int) $row['mop'],
                'iud'            => (int) $row['iud'],
                'implan'         => (int) $row['implan'],
                'suntik'         => (int) $row['suntik'],
                'pil'            => (int) $row['pil'],
                'kondom'         => (int) $row['kondom'],
                'mal'            => (int) $row['mal'],
                'tradisional'    => (int) $row['tradisional'],
                'tidak_kb'       => (int) $row['tidak_kb'],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
