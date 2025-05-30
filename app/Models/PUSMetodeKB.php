<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSMetodeKB extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_metode_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_modern',
        'mow',
        'mop',
        'iud',
        'implan',
        'suntik',
        'pil',
        'kondom',
        'mal',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
