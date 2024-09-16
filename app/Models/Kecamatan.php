<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    public function kabupatens(){
      return $this->belongsTo(Kabupaten::class,'id_kab');
    }
    public function provinsis(){
      return $this->belongsTo(Provinsi::class,'id_prov');
    }
    
}
