<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahunanDisiplinSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/rekap disiplin jan_sep.json');

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        // Ambil semua NIP dari tabel pegawai
        $validNips = DB::table('data_pegawais')->pluck('nip')->toArray();

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            // Cek apakah NIP ada di tabel pegawai
            if (!in_array($item['NIP'], $validNips)) {
                $this->command->warn("NIP tidak valid: {$item['NIP']}. Data tidak diimpor.");
                continue;
            }

            DB::table('tahunan_disiplins')->insert([
                'nip' => $item['NIP'],
                'date' => \Carbon\Carbon::createFromFormat('Y-m-d', $item['Periode']),
                'telat_menit' => $item['Telat (Menit)'],
                'pc_menit' => $item['Pulang Cepat (Menit)'],
                'a1_menit' => $item['Absen Sekali (Menit)'],
                'tk_hari' => $item['Tanpa Keterangan'],
                'telat_sanggah' => $item['Telat (Disanggah)'],
                'pc_sanggah' => $item['Pulang Cepat (Disanggah)'],
                'total' => $item['Total'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data dari file tahunan_disiplins berhasil diimpor.');
    }
}
