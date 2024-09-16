<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasJabatan extends Model
{
    use HasFactory;
    public function jabatans(){
        return $this->belongsTo(Jabatan::class, 'id_jab', 'id');
    }
}
