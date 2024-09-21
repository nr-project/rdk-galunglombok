<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kabupaten;
use App\Imports\ImportDataPKB;
use App\Imports\ImportJabatan;
use App\Imports\ImportProvinsi;
use App\Imports\ImportTimKerja;
use Illuminate\Database\Seeder;
use App\Imports\ImportKabupaten;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::create([
            'name'      => 'Kepegawaian',
            'username'  => 'kepeg.sulbar',
            'role_name' => 'admin',
            'password'  => Hash::make('bkkbn@666803')
        ]);

        User::create([
            'name'      => 'Rezky Murwanto',
            'username'  => 'kaper.sulbar',
            'role_name' => 'admin',
            'password'  => Hash::make('bkkbn@666803')
        ]);

        $this->call(ProvinsiSeeder::class);
        $this->call(KabupatenSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(PendidikanSeeder::class);
        $this->call(TimKerjaSeeder::class);
        $this->call(PangkatGolSeeder::class);
        $this->call(KelasJabSeeder::class);
        $this->call(DataPegawaiSeeder::class);
        $this->call(DataPKBSeeder::class);
        $this->call(TahunanDisiplinSeeder::class);
        $this->call(TahunanPresensiSeeder::class);

    }

}
