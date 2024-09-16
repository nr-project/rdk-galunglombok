<?php

namespace App\Imports;

use App\Models\Pendidikan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportPendidikan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
      foreach ($collection as $value) {
        if($i > 0 && !empty($value[0])){
          $data = Pendidikan::where('pendidikan', $value[0])->get();

          if(!$data->count() > 0 ){
            $new_data = new Pendidikan();
            if(!empty($value[0])){$new_data->pendidikan = $value[0];}
            $new_data->save();
          }
        }
        $i++;
        }
    }
}
