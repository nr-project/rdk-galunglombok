<?php

namespace Database\Seeders;

use App\Imports\ImportDataPegawai;
use App\Imports\ImportDataPKB;
use App\Imports\ImportJabatan;
use App\Models\User;
use App\Models\Kabupaten;
use App\Imports\ImportProvinsi;
use App\Imports\ImportTimKerja;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Imports\ImportKabupaten;
use App\Imports\ImportKecamatan;
use App\Imports\ImportKelasJabatan;
use App\Imports\ImportPangkatGol;
use App\Imports\ImportPendidikan;
use App\Imports\ImportTahunanDisiplin;
use App\Imports\ImportTahunanPresensi;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

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

        //Excel::import(new ImportKabupaten, storage_path('\app\public\file\data_provinsi.xlsx'));
        //Excel::import(new ImportKabupaten, storage_path('\app\public\file\data_kabupaten.xlsx'));
        //Excel::import(new ImportKecamatan, storage_path('\app\public\file\data_wilayah.xlsx'));
        //Excel::import(new ImportTimKerja, storage_path('\app\public\file\tim_kerja.xlsx'));
        //Excel::import(new ImportJabatan, storage_path('\app\public\file\jabatan.xlsx'));
        //Excel::import(new ImportPendidikan, storage_path('\app\public\file\pendidikan.xlsx'));
        //Excel::import(new ImportKelasJabatan, storage_path('\app\public\file\jabatan dan kelas jabatan.xlsx'));
        //Excel::import(new ImportPangkatGol, storage_path('\app\public\file\pangkat dan golongan.xlsx'));
        //Excel::import(new ImportDataPegawai, storage_path('\app\public\file\asn.xlsx'));
        //Excel::import(new ImportDataPKB, storage_path('\app\public\file\asn pkb.xlsx'));
        //Excel::import(new ImportTahunanPresensi, storage_path('\app\public\file\rekap presensi jan_aug.xlsx'));
        //Excel::import(new ImportTahunanDisiplin, storage_path('\app\public\file\rekap disiplin jan_aug.xlsx'));
    }
}
