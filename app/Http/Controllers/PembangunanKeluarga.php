<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembangunanKeluarga extends Controller
{
    public function poktan_bkb()
    {
        $kesertaanBKB = DB::table('kesertaan_poktans')
            ->join('nama_r_w_s', 'kesertaan_poktans.id_rw', '=', 'nama_r_w_s.id')
            ->select(
                'nama_r_w_s.nama_rw',
                DB::raw('SUM(total_keluarga) as jumlah_keluarga'),
                DB::raw('SUM(total_ikut) as jumlah_ikut'),
                DB::raw('SUM(bukan_pus) as status_bukan_pus'),
                DB::raw('SUM(mow) as mow'),
                DB::raw('SUM(mop) as mop'),
                DB::raw('SUM(iud) as iud'),
                DB::raw('SUM(implan) as implan'),
                DB::raw('SUM(suntik) as suntik'),
                DB::raw('SUM(pil) as pil'),
                DB::raw('SUM(kondom) as kondom'),
                DB::raw('SUM(mal) as mal'),
                DB::raw('SUM(tradisional) as tradisional'),
                DB::raw('SUM(tidak_kb) as tidak_berkb')
            )
            ->where('poktan', 'BKB')
            ->groupBy('nama_r_w_s.nama_rw')
            ->orderBy('nama_r_w_s.nama_rw')
            ->get();

        // Hitung total untuk footer tabel
        $total = [
            'jumlah_keluarga' => $kesertaanBKB->sum('jumlah_keluarga'),
            'jumlah_ikut' => $kesertaanBKB->sum('jumlah_ikut'),
            'status_bukan_pus' => $kesertaanBKB->sum('status_bukan_pus'),
            'mow' => $kesertaanBKB->sum('mow'),
            'mop' => $kesertaanBKB->sum('mop'),
            'iud' => $kesertaanBKB->sum('iud'),
            'implan' => $kesertaanBKB->sum('implan'),
            'suntik' => $kesertaanBKB->sum('suntik'),
            'pil' => $kesertaanBKB->sum('pil'),
            'kondom' => $kesertaanBKB->sum('kondom'),
            'mal' => $kesertaanBKB->sum('mal'),
            'tradisional' => $kesertaanBKB->sum('tradisional'),
            'tidak_berkb' => $kesertaanBKB->sum('tidak_berkb'),
        ];

        return view('pembangunan_keluarga.poktan_bkb', compact('kesertaanBKB', 'total'));
    }
}
