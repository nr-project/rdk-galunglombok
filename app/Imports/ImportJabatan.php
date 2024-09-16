<?php

namespace App\Imports;

use App\Models\Jabatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportJabatan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0])){
          $data = Jabatan::where('jabatan', $value[0])->get();

          if(!$data->count() > 0 ){
            $new_data = new Jabatan();
            if(!empty($value[0])){$new_data->jabatan = $value[0];}
            $new_data->save();
          }
        }
        $i++;
      }
    }
}
