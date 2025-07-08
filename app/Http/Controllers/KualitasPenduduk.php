<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NamaRW;
use App\Models\JenisKegiatan;

class KualitasPenduduk extends Controller
{
    public function jenis_kegiatan()
    {
        $jenisKegiatans = DB::table('jenis_kegiatans')  // perbaiki nama tabel di sini
                        ->join('nama_r_w_s', 'jenis_kegiatans.id_rw', '=', 'nama_r_w_s.id') // sesuaikan kolom FK dan PK
                        ->select(
                            'jenis_kegiatans.id_rw',
                            'nama_r_w_s.nama_rw',
                            DB::raw('SUM(jumlah_individu_umur_10) as umur_lt_10'),
                            DB::raw('SUM(bekerja_umur_10_jumlah) as kerja_lt_10_jumlah'),
                            DB::raw('ROUND(IF(SUM(jumlah_individu_umur_10) > 0, SUM(bekerja_umur_10_jumlah) / SUM(jumlah_individu_umur_10) * 100, 0), 2) as kerja_lt_10_persen'),
                            DB::raw('SUM(jumlah_individu_umur_10_14) as umur_10_14'),
                            DB::raw('SUM(bekerja_umur_10_14_jumlah) as kerja_10_14_jumlah'),
                            DB::raw('ROUND(IF(SUM(jumlah_individu_umur_10_14) > 0, SUM(bekerja_umur_10_14_jumlah) / SUM(jumlah_individu_umur_10_14) * 100, 0), 2) as kerja_10_14_persen'),
                            DB::raw('SUM(jumlah_individu_umur_15) as umur_15_plus'),
                            DB::raw('SUM(bekerja_umur_15_laki) as kerja_15_laki'),
                            DB::raw('SUM(bekerja_umur_15_perempuan) as kerja_15_perempuan'),
                            DB::raw('SUM(jumlah_bekerja) as jumlah_bekerja'),
                            DB::raw('ROUND(IF(SUM(jumlah_individu_umur_15) > 0, SUM(jumlah_bekerja) / SUM(jumlah_individu_umur_15) * 100, 0), 2) as jumlah_bekerja_persen'),
                            DB::raw('SUM(tidak_bekerja_laki) as tidak_bekerja_laki'),
                            DB::raw('SUM(tidak_bekerja_perempuan) as tidak_bekerja_perempuan'),
                            DB::raw('SUM(jumlah_tidak_bekerja) as jumlah_tidak_bekerja')
                        )
                        ->groupBy('jenis_kegiatans.id_rw', 'nama_r_w_s.nama_rw')
                        ->get();


        $total = JenisKegiatan::select(
                DB::raw('SUM(jumlah_individu_umur_10) as umur_lt_10'),
                DB::raw('SUM(bekerja_umur_10_jumlah) as kerja_lt_10_jumlah'),
                DB::raw('ROUND(IF(SUM(jumlah_individu_umur_10) > 0, SUM(bekerja_umur_10_jumlah) / SUM(jumlah_individu_umur_10) * 100, 0), 2) as kerja_lt_10_persen'),

                DB::raw('SUM(jumlah_individu_umur_10_14) as umur_10_14'),
                DB::raw('SUM(bekerja_umur_10_14_jumlah) as kerja_10_14_jumlah'),
                DB::raw('ROUND(IF(SUM(jumlah_individu_umur_10_14) > 0, SUM(bekerja_umur_10_14_jumlah) / SUM(jumlah_individu_umur_10_14) * 100, 0), 2) as kerja_10_14_persen'),

                DB::raw('SUM(jumlah_individu_umur_15) as umur_15_plus'),
                DB::raw('SUM(bekerja_umur_15_laki) as kerja_15_laki'),
                DB::raw('SUM(bekerja_umur_15_perempuan) as kerja_15_perempuan'),

                DB::raw('SUM(jumlah_bekerja) as jumlah_bekerja'),
                DB::raw('ROUND(IF(SUM(jumlah_individu_umur_15) > 0, SUM(jumlah_bekerja) / SUM(jumlah_individu_umur_15) * 100, 0), 2) as jumlah_bekerja_persen'),

                DB::raw('SUM(tidak_bekerja_laki) as tidak_bekerja_laki'),
                DB::raw('SUM(tidak_bekerja_perempuan) as tidak_bekerja_perempuan'),
                DB::raw('SUM(jumlah_tidak_bekerja) as jumlah_tidak_bekerja')
            )->first();

        return view('kualitas_penduduk.jenis_kegiatan', compact('jenisKegiatans', 'total'));
    }
}
