<?php

namespace App\Imports;

use App\Models\DataPegawai;
use App\Models\TahunanPresensi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportTahunanPresensi implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $value) {
            if ($index === 0 || empty($value[0])) {
                continue; // Lewati header atau baris kosong
            }
        
            // Ambil nip dari value
            $nip = $value[0];
            $pegawai = DataPegawai::where('nip', $nip)->first();
        
            // Jika nip tidak ditemukan di DataPegawai, lewati
            if ($pegawai === null) {
                continue; // Tidak ada data pegawai dengan nip ini, lanjutkan ke iterasi berikutnya
            }
        
            // Format tanggal jika tersedia
            $date = !empty($value[2]) ? Carbon::createFromFormat('Y-m-d', $value[2])->format('Y-m-d') : null;
        
            // Jika tanggal tidak valid, lewati
            if ($date === null) {
                continue;
            }
        
            // Periksa apakah sudah ada record dengan kombinasi nip dan date
            $existingRecord = TahunanPresensi::where('nip', $nip)
                                             ->where('date', $date)
                                             ->first();
        
            // Data untuk update atau insert
            $data = [
                    'hari_kerja'        => $value[3] ?? null,
                    'hadir_normal'      => $value[4] ?? null,
                    'terlambat'         => $value[5] ?? null,
                    'pulang_cepat'      => $value[6] ?? null,
                    'tanpa_absen'       => $value[7] ?? null,
                    'absen_error'       => $value[8] ?? null,
                    'kehadiran'         => $value[9] ?? null,
                    'absen_sekali'      => $value[10] ?? null,
                    'tanpa_keterangan'  => $value[11] ?? null,
                    'cuti'              => $value[12] ?? null,
                    'ketidakhadiran'    => $value[13] ?? null,
                    'DL'             => $value[14] ?? null,
            ];
        
            if ($existingRecord) {
                // Update record yang sudah ada
                $existingRecord->update($data);
            } else {
                // Buat record baru
                TahunanPresensi::create(array_merge(['nip' => $nip, 'date' => $date], $data));
            }
        }        
    }
}
