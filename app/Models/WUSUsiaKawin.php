<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WUSUsiaKawin extends Model
{
    use HasFactory;

    protected $table = 'w_u_s_usia_kawins';

    protected $fillable = [
        'id_rw',
        'dibawah_20',
        'diatas_20',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
