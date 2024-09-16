<?php

namespace App\Imports;

use App\Models\PangkatGol;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportPangkatGol implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0])){
          $data = PangkatGol::where('gol', $value[0])->get();

          if(!$data->count() > 0 ){
            $new_data = new PangkatGol();
            if(!empty($value[0])){
                $new_data->gol = $value[0];
                $new_data->pangkat = $value[1];
            }
            $new_data->save();
          }
        }
        $i++;
      }
    }
}
