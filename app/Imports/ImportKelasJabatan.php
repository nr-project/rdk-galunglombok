<?php

namespace App\Imports;

use App\Models\Jabatan;
use App\Models\KelasJabatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportKelasJabatan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0]) && !empty($value[1])){
          $data_jab = Jabatan::where('jabatan', $value[0])->get();
          if($data_jab->count() > 0){$id_jab = $data_jab[0]->id;} else {$new_jab = new Jabatan(); $new_jab-> jabatan = $value[0]; $new_jab->save();$data_jab = Jabatan::where('jabatan', $value[0])->get()->last();$id_jab = $data_jab->id;}

          $data_kelasjab = KelasJabatan::where('kelas_jab', $value[1])
                      ->where('id_jab', $id_jab)
                      ->get();

          // dd(strtoupper($value[0]));
          if(!$data_kelasjab->count() > 0 && !empty($value[1])){
            $new_data = new KelasJabatan();
            $new_data->kelas_jab = $value[1];
            $new_data->id_jab    = $id_jab;
            $new_data->save();
          }
        }
        $i++;
      }
        
    }
}
