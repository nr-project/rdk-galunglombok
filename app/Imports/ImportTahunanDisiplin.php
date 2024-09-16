<?php

namespace App\Imports;

use App\Models\DataPegawai;
use App\Models\TahunanDisiplin;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportTahunanDisiplin implements ToCollection
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
            $existingRecord = TahunanDisiplin::where('nip', $nip)
                                             ->where('date', $date)
                                             ->first();
        
            // Data untuk update atau insert
            $data = [
                    'telat_menit'        => $value[3] ?? null,
                    'pc_menit'           => $value[4] ?? null,
                    'a1_menit'           => $value[5] ?? null,
                    'tk_hari'            => $value[6] ?? null,
                    'telat_sanggah'      => $value[7] ?? null,
                    'pc_sanggah'         => $value[8] ?? null,
                    'total'              => $value[9] ?? null,
            ];
        
            if ($existingRecord) {
                // Update record yang sudah ada
                $existingRecord->update($data);
            } else {
                // Buat record baru
                TahunanDisiplin::create(array_merge(['nip' => $nip, 'date' => $date], $data));
            }
        }
    }
}
