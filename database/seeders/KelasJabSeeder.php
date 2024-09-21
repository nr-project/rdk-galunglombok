<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasJabSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/jabatan dan kelas jabatan.json');

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            $id_jab = DB::table('jabatans')->where('jabatan', $item['Nama Jabatan'])->value('id');

            DB::table('kelas_jabatans')->insert([
                'id_jab' => $id_jab,
                'kelas_jab' => $item['Kelas Jabatan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');
    }
}
