<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('app/public/file/data_kabupaten.json'); // Ganti dengan path ke file JSON

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            $id_prov = DB::table('provinsis')->where('provinsi', $item['Provinsi'])->value('id');

            DB::table('kabupatens')->insert([
                'id_prov' => $id_prov,
                'kabupaten' => $item['Kabupaten'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');
    }
}
