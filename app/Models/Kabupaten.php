<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    public function provinsis(){
      return $this->belongsTo(Provinsi::class, 'id_prov', 'id');
    }
}
