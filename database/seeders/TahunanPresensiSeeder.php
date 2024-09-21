<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahunanPresensiSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/rekap presensi jan_aug.json'); // Sesuaikan dengan path file JSON

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

            DB::table('tahunan_presensis')->insert([
                'nip' => $item['NIP'],
                'date' => \Carbon\Carbon::createFromFormat('Y-m-d', $item['Periode']),
                'hari_kerja' => $item['Jumlah Hari Kerja'],
                'hadir_normal' => $item['Hadir Normal'],
                'terlambat' => $item['Terlambat'],
                'pulang_cepat' => $item['Pulang Cepat'],
                'tanpa_absen' => $item['Tanpa Absen'],
                'absen_error' => $item['Absen Error'],
                'kehadiran' => $item['Total Kehadiran'],
                'absen_sekali' => $item['Absen Sekali'],
                'tanpa_keterangan' => $item['Tanpa Keterangan'],
                'cuti' => $item['Cuti'],
                'ketidakhadiran' => $item['Total Ketidakhadiran'],
                'DL' => $item['DL/RL'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data dari file tahunan_presensi berhasil diimpor.');
    }
}
