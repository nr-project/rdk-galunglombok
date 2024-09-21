<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/public/file/asn.json');

        if (!file_exists($filePath)) {
            $this->command->error("File not found: $filePath");
            return;
        }

        $jsonData = file_get_contents($filePath);
        $dataArray = explode("\n", trim($jsonData));

        foreach ($dataArray as $json) {
            $item = json_decode($json, true);

            $idGol = DB::table('pangkat_gols')->where('gol', $item['Golongan Akhir'])->value('id');
            $idJabatan = DB::table('jabatans')->where('jabatan', $item['Jabatan Akhir'])->value('id');
            $idPendidikan = DB::table('pendidikans')->where('pendidikan', $item['Pendidikan Akhir'])->value('id');
            $idLokasi = DB::table('kabupatens')->where('id_prov', '30')->where('kabupaten', $item['Lokasi Kabupaten'])->value('id');

            DB::table('data_pegawais')->insert([
                'nip' => $item['NIP Baru'],
                'nama' => $item['Nama'],
                'nama_gelar' => $item['Nama Lengkap'],
                'jenis_kelamin' => $item['Jenis Kelamin'],
                'ttl' => \Carbon\Carbon::createFromFormat('d-m-Y', $item['Tanggal Lahir']),
                'tmt' => \Carbon\Carbon::createFromFormat('d-m-Y', $item['TMT']),
                'bup' => \Carbon\Carbon::createFromFormat('d-m-Y', $item['BUP']),
                'status_pegawai' => $item['Status Pegawai'],
                'jenis_jabatan' => $item['Jenis Jabatan'],
                'id_gol' => $idGol,
                'id_jabatan' => $idJabatan,
                'id_pendidikan' => $idPendidikan,
                'jenis_pegawai' => $item['Jenis Pegawai'],
                'id_lokasi' => $idLokasi,
                'foto' => $item['Foto'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Data from JSON file imported successfully.');
    }
}
