<?php

namespace App\Imports;

use App\Models\Provinsi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
set_time_limit(60 * 10);

class ImportProvinsi implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0])){
          $data = Provinsi::where('provinsi', strtoupper($value[0]))->get();
          // dd(strtoupper($value[0]));
          if(!$data->count() > 0 ){
            $new_data = new Provinsi();
            if(!empty($value[0])){$new_data->provinsi = strtoupper($value[0]);}
            $new_data->save();
          }
        }
        $i++;
      }
    }
}
