<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PangkatGolSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/pangkat dan golongan.json');

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            DB::table('pangkat_gols')->insert([
                'gol' => $item['Golongan'],
                'pangkat' => $item['Pangkat'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');
    }
}
