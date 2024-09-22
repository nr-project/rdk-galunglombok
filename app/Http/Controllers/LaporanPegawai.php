<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\TahunanDisiplin;
use App\Models\TahunanPresensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPegawai extends Controller
{
    public function laporan_presensi(Request $request){
        $tahunAwal = $request->input('tahun_awal', now()->year);
        $tahunAkhir = $request->input('tahun_akhir', now()->year);
        $bulanAwal = $request->input('bulan_awal', 1);
        $bulanAkhir = $request->input('bulan_akhir', now()->subMonth()->month);
        $idJabatan = $request->input('id_jabatan');

        $data = $this->getPresensiData($tahunAwal, $bulanAwal, $tahunAkhir, $bulanAkhir, $idJabatan);
        $jabatanList = DataPegawai::with('jabatans')
                       ->select('id_jabatan')
                       ->distinct()
                       ->get()
                       ->map(function($pegawai) {
                            return $pegawai->jabatans; 
                        })->filter()->unique('id');
        return view('laporan.laporan-presensi', [
            'data' => $data,
            'tahunAwal' => $tahunAwal,
            'tahunAkhir' => $tahunAkhir,
            'bulanAwal' => $bulanAwal,
            'bulanAkhir' => $bulanAkhir,
            'jabatanList' => $jabatanList,
        ]);
    }

    public function laporan_disiplin(Request $request){
        $tahunAwal = $request->input('tahun_awal', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);
        $bulanAwal = $request->input('bulan_awal', 1);
        $bulanAkhir = $request->input('bulan_akhir', now()->subMonth()->month);
        $idJabatan = $request->input('id_jabatan');

        $data = $this->getDisiplinData($tahunAwal, $bulanAwal, $tahunAkhir, $bulanAkhir, $idJabatan);

        $jabatanList = DataPegawai::with('jabatans')
                       ->select('id_jabatan')
                       ->distinct()
                       ->get()
                       ->map(function($pegawai) {
                            return $pegawai->jabatans; 
                        })->filter()->unique('id');
        return view('laporan.laporan-disiplin',[
            'data' => $data,
            'tahunAwal' => $tahunAwal,
            'tahunAkhir' => $tahunAkhir,
            'bulanAwal' => $bulanAwal,
            'bulanAkhir' => $bulanAkhir,
            'jabatanList' => $jabatanList,
        ]);
    }

    private function getDisiplinData($tahunAwal, $bulanAwal, $tahunAkhir, $bulanAkhir, $idJabatan = null)
    {
        $query = TahunanDisiplin::with('pegawais')->select(
            'tahunan_disiplins.nip', 
            'pegawais.id_jabatan',
            DB::raw('SUM(telat_menit) as telat_menit'),
            DB::raw('SUM(pc_menit) as pc_menit'),
            DB::raw('SUM(a1_menit) as a1_menit'),
            DB::raw('SUM(tk_hari) as tk_hari'),
            DB::raw('SUM(telat_sanggah) as telat_sanggah'),
            DB::raw('SUM(pc_sanggah) as pc_sanggah'),
            DB::raw('FLOOR(SUM(tk_hari) + ((SUM(telat_menit) + SUM(pc_menit) + SUM(a1_menit)) / 450)) as total')
            )
            ->join('data_pegawais as pegawais', 'tahunan_disiplins.nip', '=', 'pegawais.nip')
            ->whereBetween('date', [
                Carbon::createFromFormat('Y-n-j', "$tahunAwal-$bulanAwal-01")->startOfMonth(),
                Carbon::createFromFormat('Y-n-j', "$tahunAkhir-$bulanAkhir-01")->endOfMonth()
            ]);

        if ($idJabatan) {
            $query->whereHas('pegawais', function($q) use ($idJabatan) {
                $q->where('id_jabatan', $idJabatan);
            });
        }

        return $query->groupBy('tahunan_disiplins.nip', 'pegawais.id_jabatan')->get()->sortBy(fn($item) => $item->pegawais->id_jabatan);
    }


    private function getPresensiData($tahunAwal, $bulanAwal, $tahunAkhir, $bulanAkhir, $idJabatan = null)
    {
        $query = TahunanPresensi::with('pegawais')->select(
            'tahunan_presensis.nip', 
            'pegawais.id_jabatan',
            DB::raw('SUM(hari_kerja) as hari_kerja'),
            DB::raw('SUM(hadir_normal) as hadir_normal'),
            DB::raw('SUM(terlambat) as terlambat'),
            DB::raw('SUM(pulang_cepat) as pulang_cepat'),
            DB::raw('SUM(tanpa_absen) as tanpa_absen'),
            DB::raw('SUM(absen_error) as absen_error'),
            DB::raw('SUM(kehadiran) as kehadiran'),
            DB::raw('SUM(absen_sekali) as absen_sekali'),
            DB::raw('SUM(tanpa_keterangan) as tanpa_keterangan'),
            DB::raw('SUM(cuti) as cuti'),
            DB::raw('SUM(ketidakhadiran) as ketidakhadiran'),
            DB::raw('SUM(DL) as DL'),
            )
            ->join('data_pegawais as pegawais', 'tahunan_presensis.nip', '=', 'pegawais.nip')
            ->whereBetween('date', [
                Carbon::createFromFormat('Y-n-j', "$tahunAwal-$bulanAwal-01")->startOfMonth(),
                Carbon::createFromFormat('Y-n-j', "$tahunAkhir-$bulanAkhir-01")->endOfMonth()
            ]);

        if ($idJabatan) {
            $query->whereHas('pegawais', function($q) use ($idJabatan) {
                $q->where('id_jabatan', $idJabatan);
            });
        }

        return $query->groupBy('tahunan_presensis.nip', 'pegawais.id_jabatan')->get()->sortBy(fn($item) => $item->pegawais->id_jabatan);
    }
}
