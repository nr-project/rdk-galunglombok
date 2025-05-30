<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSKesertaanKB extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_kesertaan_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus',
        'pus_peserta_kb_modern',
        'pus_peserta_kb_tradisional',
        'jumlah_pus_peserta_kb',
        'pus_bukan_peserta_kb',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }

}
