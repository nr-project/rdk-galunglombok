<?php

namespace App\Imports;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
set_time_limit(60 * 20);

class ImportKecamatan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0]) && !empty($value[1]) && !empty($value[2])){
          $data_prov = Provinsi::where('provinsi', strtoupper($value[0]))->get();
          if($data_prov->count() > 0){$id_prov = $data_prov[0]->id;} else {$new_prov = new Provinsi;$new_prov->provinsi = strtoupper($value[0]);$new_prov->save();$data_prov = Provinsi::where('provinsi', strtoupper($value[0]))->get()->last();$id_prov = $data_prov->id;}

          $data_kab = Kabupaten::where('kabupaten', strtoupper($value[1]))->get();
          if($data_kab->count() > 0){$id_kab = $data_kab[0]->id;} else {$new_kab = new Kabupaten;$new_kab->kabupaten = strtoupper($value[1]);$new_kab->id_prov = $id_prov;$new_kab->save();$data_kab = Kabupaten::where('kabupaten', strtoupper($value[1]))->get()->last();$id_kab = $data_kab->id;}

          $data_kec = Kecamatan::where('kecamatan', strtoupper($value[2]))
                      ->where('id_prov', $id_prov)
                      ->where('id_kab', $id_kab)
                      ->get();

          // dd(strtoupper($value[0]));
          if(!$data_kec->count() > 0 && !empty($value[1]) && !empty($value[2])){
            $new_data = new Kecamatan();
            $new_data->kecamatan = strtoupper($value[2]);
            $new_data->id_prov = $id_prov;
            $new_data->id_kab = $id_kab;
            $new_data->save();
          }
        }
        $i++;
      }
    }
}
