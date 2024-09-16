<?php

namespace App\Imports;

use App\Models\Jabatan;
use App\Models\Kabupaten;
use App\Models\PangkatGol;
use App\Models\Pendidikan;
use App\Models\DataPegawai;
use App\Models\DataPKB;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDataPKB implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $value) {
            if ($index === 0 || empty($value[0])) {
                continue;
            }
            $pangkat     = PangkatGol::where('gol', $value[9])->get();
            $jabatan     = Jabatan::where('jabatan', $value[10])->get();
            $pendidikan  = Pendidikan::where('pendidikan', $value[11])->get();
            $lokasi      = Kabupaten::where('id_prov', '30')->where('kabupaten', $value[13])->get();
            DataPKB::updateOrCreate(
                ['nip' => $value[0]],
                [
                    'nama'           => $value[1] ?? null,
                    'nama_gelar'     => $value[2] ?? null,
                    'jenis_kelamin'  => $value[3] ?? null,
                    'ttl'            => !empty($value[4]) ? Carbon::createFromFormat('d-m-Y', $value[4])->format('Y-m-d') : null,
                    'tmt'            => !empty($value[5]) ? Carbon::createFromFormat('d-m-Y', $value[5])->format('Y-m-d') : null,
                    'bup'            => !empty($value[6]) ? Carbon::createFromFormat('d-m-Y', $value[6])->format('Y-m-d') : null,
                    'status_pegawai' => $value[7] ?? null,
                    'jenis_jabatan'  => $value[8] ?? null,
                    'id_gol'         => isset($pangkat[0]->id) ? $pangkat[0]->id : null,
                    'id_jabatan'     => isset($jabatan[0]->id) ? $jabatan[0]->id : null,
                    'id_pendidikan'  => isset($pendidikan[0]->id) ? $pendidikan[0]->id : null,
                    'jenis_pegawai'  => $value[12] ?? null,
                    'id_lokasi'      => isset($lokasi[0]->id) ? $lokasi[0]->id : null,
                    'foto'           => $value[14] ?? null,
                ]
            );
        }
    }
}
