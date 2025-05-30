<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Kabupaten;
use App\Imports\ImportDataPKB;
use App\Imports\ImportJabatan;
use App\Imports\ImportProvinsi;
use App\Imports\ImportTimKerja;
use Illuminate\Database\Seeder;
use App\Imports\ImportKabupaten;
use App\Imports\ImportKecamatan;
use App\Imports\ImportPangkatGol;
use App\Imports\ImportPendidikan;
use App\Imports\ImportDataPegawai;
use App\Imports\ImportKelasJabatan;
use Database\Seeders\ProvinsiSeeder;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportTahunanDisiplin;
use App\Imports\ImportTahunanPresensi;
use App\Models\Month;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'      => 'NR',
            'email'     => 'nurhidaya.rahim24@gmail.com',
            'username'  => 'NR',
            'role_name' => 'super_admin',
            'password'  => Hash::make('Semangat@321')
        ]);

        User::create([
            'name'      => 'Admin',
            'email'     => 'sulbarbkkbn.kbkr@gmail.com',
            'username'  => 'admin',
            'role_name' => 'admin',
            'password'  => Hash::make('bkkbn@666803')
        ]);

        $rws = [
            ['nama_rw' => 'LOMBOK'],
            ['nama_rw' => 'LENA'],
            ['nama_rw' => 'GALUNG'],
            ['nama_rw' => 'PALUPPUNG'],
        ];

        foreach ($rws as $rw) {
            DB::table('nama_r_w_s')->updateOrInsert(
                ['nama_rw' => $rw['nama_rw']],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }

        $this->call(KelompokUmurSeeder::class);
        $this->call(KesertaanPoktanSeeder::class);
        $this->call(Hamil4TSeeder::class);
        $this->call(TingkatPendidikanSeeder::class);
        $this->call(PendidikanAnakSeeder::class);
        $this->call(WusUsiaKawinSeeder::class);
        $this->call(WanitaKawinKelompokUmurSeeder::class);
        $this->call(KeinginanHamilSeeder::class);
        $this->call(PusKesertaanKbSeeder::class);
        $this->call(PusMetodeKbSeeder::class);
        $this->call(PusTempatKbSeeder::class);
        $this->call(PusAlasanTidakKbSeeder::class);
        $this->call(PusAnakStatusKbSeeder::class);
        $this->call(PusBalitaSeeder::class);
        $this->call(JenisPekerjaanSeeder::class);
        $this->call(JenisKegiatanSeeder::class);
        $this->call(InformasiKBSeeder::class);
    }



}
