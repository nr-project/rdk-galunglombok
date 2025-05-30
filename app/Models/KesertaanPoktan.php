<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesertaanPoktan extends Model
{
    use HasFactory;

    protected $table = 'kesertaan_poktans';

    protected $fillable = [
        'id_rw',
        'poktan',
        'total_keluarga',
        'total_ikut',
        'bukan_pus',
        'mow',
        'mop',
        'iud',
        'implan',
        'suntik',
        'pil',
        'kondom',
        'mal',
        'tradisional',
        'tidak_kb',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
