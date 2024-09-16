<?php

namespace App\Http\Controllers;

use App\Models\TahunanDisiplin;
use App\Models\TahunanPresensi;
use Illuminate\Http\Request;

class LaporanPegawai extends Controller
{
    public function laporan_presensi(){
        $presensi = TahunanPresensi::with('pegawais')
                    ->get()
                    ->sortBy(function($presensi) {
                        return $presensi->pegawais->id_jabatan;
                    });
        return view('laporan.laporan-presensi',[
          'data' => $presensi
        ]);
    }

    public function laporan_disiplin(){
        $disiplin = TahunanDisiplin::with('pegawais')
                    ->get()
                    ->sortBy(function($presensi) {
                        return $presensi->pegawais->id_jabatan;
                    });
        return view('laporan.laporan-disiplin',[
          'data' => $disiplin
        ]);
    }
}
