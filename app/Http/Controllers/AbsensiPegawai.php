<?php

namespace App\Http\Controllers;

use App\Models\HarianDisiplin;
use App\Models\HarianPresensi;
use Illuminate\Http\Request;

class AbsensiPegawai extends Controller
{
    public function absensi_harian(){
        $presensi = HarianPresensi::with('pegawais')
                    ->get()
                    ->sortBy(function($presensi) {
                        return $presensi->pegawais->id_jabatan;
                    });
        return view('absensi.absensi-harian',[
          'data' => $presensi
        ]);
    }

    public function absensi_disiplin(){
        $disiplin = HarianDisiplin::with('pegawais')
                    ->get()
                    ->sortBy(function($presensi) {
                        return $presensi->pegawais->id_jabatan;
                    });
        return view('absensi.absensi-disiplin',[
          'data' => $disiplin
        ]);
    }
}
