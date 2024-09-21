<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProvinsiSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/data_provinsi.json'); // Ganti dengan path ke file JSON

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            DB::table('provinsis')->insert([
                'provinsi' => $item['Provinsi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');
    }
}
