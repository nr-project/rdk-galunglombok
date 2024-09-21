<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimKerjaSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/tim_kerja.json'); // Ganti dengan path ke file JSON

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            DB::table('tim_kerjas')->insert([
                'nama_tim' => $item['Nama Tim Kerja'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');

    }
}
