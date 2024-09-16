<?php

namespace App\Imports;

use App\Models\TimKerja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportTimKerja implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0])){
          $data = TimKerja::where('nama_tim', $value[0])->get();

          if(!$data->count() > 0 ){
            $new_data = new TimKerja();
            if(!empty($value[0])){$new_data->nama_tim = $value[0];}
            $new_data->save();
          }
        }
        $i++;
      }
    }
}
