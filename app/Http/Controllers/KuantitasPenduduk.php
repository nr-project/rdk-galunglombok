<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokUmur;
use App\Models\NamaRW;
use Illuminate\Support\Facades\DB;

class KuantitasPenduduk extends Controller
{
    public function kelompok_umur(Request $request){

        $rws = NamaRW::all();

        $kelompokUmurTotals = KelompokUmur::select(
            'id_rw',
            DB::raw('SUM(umur_0_1) as umur_0_1'),
            DB::raw('SUM(umur_2_4) as umur_2_4'),
            DB::raw('SUM(umur_5_9) as umur_5_9'),
            DB::raw('SUM(umur_10_14) as umur_10_14'),
            DB::raw('SUM(umur_15_19) as umur_15_19'),
            DB::raw('SUM(umur_20_24) as umur_20_24'),
            DB::raw('SUM(umur_25_29) as umur_25_29'),
            DB::raw('SUM(umur_30_34) as umur_30_34'),
            DB::raw('SUM(umur_35_39) as umur_35_39'),
            DB::raw('SUM(umur_40_44) as umur_40_44'),
            DB::raw('SUM(umur_45_49) as umur_45_49'),
            DB::raw('SUM(umur_50_54) as umur_50_54'),
            DB::raw('SUM(umur_55_59) as umur_55_59'),
            DB::raw('SUM(umur_60_64) as umur_60_64'),
            DB::raw('SUM(umur_65_69) as umur_65_69'),
            DB::raw('SUM(umur_70_74) as umur_70_74'),
            DB::raw('SUM(umur_75) as umur_75')
        )
        ->groupBy('id_rw')
        ->get()
        ->keyBy('id_rw');

        foreach ($rws as $rw) {
            $kelompok = $kelompokUmurTotals->get($rw->id);
            if ($kelompok) {
                $rw->kelompok = $kelompok;
                $rw->total_individu = collect($kelompok)->except(['id_rw'])->sum();
            } else {
                $rw->kelompok = null;
                $rw->total_individu = 0;
            }
        }
        //dd($rws);
        return view('kuantitas_penduduk.kelompok_umur', compact('rws'));
    }

    public function kelompok_umur_lk(Request $request){
        $rws = NamaRW::all();

        $kelompokUmurTotals = KelompokUmur::where('jenis_kelamin', 'Laki-Laki')
        ->select(
            'id_rw',
            DB::raw('SUM(umur_0_1) as umur_0_1'),
            DB::raw('SUM(umur_2_4) as umur_2_4'),
            DB::raw('SUM(umur_5_9) as umur_5_9'),
            DB::raw('SUM(umur_10_14) as umur_10_14'),
            DB::raw('SUM(umur_15_19) as umur_15_19'),
            DB::raw('SUM(umur_20_24) as umur_20_24'),
            DB::raw('SUM(umur_25_29) as umur_25_29'),
            DB::raw('SUM(umur_30_34) as umur_30_34'),
            DB::raw('SUM(umur_35_39) as umur_35_39'),
            DB::raw('SUM(umur_40_44) as umur_40_44'),
            DB::raw('SUM(umur_45_49) as umur_45_49'),
            DB::raw('SUM(umur_50_54) as umur_50_54'),
            DB::raw('SUM(umur_55_59) as umur_55_59'),
            DB::raw('SUM(umur_60_64) as umur_60_64'),
            DB::raw('SUM(umur_65_69) as umur_65_69'),
            DB::raw('SUM(umur_70_74) as umur_70_74'),
            DB::raw('SUM(umur_75) as umur_75')
        )
        ->groupBy('id_rw')
        ->get()
        ->keyBy('id_rw');

        foreach ($rws as $rw) {
            $kelompok = $kelompokUmurTotals->get($rw->id);
            if ($kelompok) {
                $rw->kelompok = $kelompok;
                $rw->total_individu = collect($kelompok)->except(['id_rw'])->sum();
            } else {
                $rw->kelompok = null;
                $rw->total_individu = 0;
            }
        }

        return view('kuantitas_penduduk.kelompok_umur_lk', compact('rws'));
    }

    public function kelompok_umur_pr(Request $request){
        $rws = NamaRW::all();

        $kelompokUmurTotals = KelompokUmur::where('jenis_kelamin', 'Perempuan')
        ->select(
            'id_rw',
            DB::raw('SUM(umur_0_1) as umur_0_1'),
            DB::raw('SUM(umur_2_4) as umur_2_4'),
            DB::raw('SUM(umur_5_9) as umur_5_9'),
            DB::raw('SUM(umur_10_14) as umur_10_14'),
            DB::raw('SUM(umur_15_19) as umur_15_19'),
            DB::raw('SUM(umur_20_24) as umur_20_24'),
            DB::raw('SUM(umur_25_29) as umur_25_29'),
            DB::raw('SUM(umur_30_34) as umur_30_34'),
            DB::raw('SUM(umur_35_39) as umur_35_39'),
            DB::raw('SUM(umur_40_44) as umur_40_44'),
            DB::raw('SUM(umur_45_49) as umur_45_49'),
            DB::raw('SUM(umur_50_54) as umur_50_54'),
            DB::raw('SUM(umur_55_59) as umur_55_59'),
            DB::raw('SUM(umur_60_64) as umur_60_64'),
            DB::raw('SUM(umur_65_69) as umur_65_69'),
            DB::raw('SUM(umur_70_74) as umur_70_74'),
            DB::raw('SUM(umur_75) as umur_75')
        )
        ->groupBy('id_rw')
        ->get()
        ->keyBy('id_rw');

        foreach ($rws as $rw) {
            $kelompok = $kelompokUmurTotals->get($rw->id);
            if ($kelompok) {
                $rw->kelompok = $kelompok;
                $rw->total_individu = collect($kelompok)->except(['id_rw'])->sum();
            } else {
                $rw->kelompok = null;
                $rw->total_individu = 0;
            }
        }

        return view('kuantitas_penduduk.kelompok_umur_pr', compact('rws'));
    }
}
