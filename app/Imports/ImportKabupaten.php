<?php

namespace App\Imports;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
set_time_limit(60 * 10);

class ImportKabupaten implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0]) && !empty($value[1])){
          $data_prov = Provinsi::where('provinsi', strtoupper($value[0]))->get();
          if($data_prov->count() > 0){$id_prov = $data_prov[0]->id;} else {$new_prov = new Provinsi; $new_prov-> provinsi = strtoupper($value[0]); $new_prov->save();$data_prov = Provinsi::where('provinsi', strtoupper($value[0]))->get()->last();$id_prov = $data_prov->id;}

          $data_kab = Kabupaten::where('kabupaten', strtoupper($value[1]))
                      ->where('id_prov', $id_prov)
                      ->get();

          // dd(strtoupper($value[0]));
          if(!$data_kab->count() > 0 && !empty($value[1])){
            $new_data = new Kabupaten();
            $new_data->kabupaten = strtoupper($value[1]);
            $new_data->id_prov    = $id_prov;
            $new_data->save();
          }
        }
        $i++;
      }
        
    }
}
