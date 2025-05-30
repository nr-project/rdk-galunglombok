<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSBalita extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_balitas';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_dan_anak_terkecil_6bln',
        'jumlah_pus_punya_balita',
        'peserta_kb_modern_0thn',
        'peserta_kb_tradisional_0thn',
        'bukan_peserta_kb_0thn',
        'peserta_kb_modern_1thn',
        'peserta_kb_tradisional_1thn',
        'bukan_peserta_kb_1thn',
        'peserta_kb_modern_2thn',
        'peserta_kb_tradisional_2thn',
        'bukan_peserta_kb_2thn',
        'peserta_kb_modern_3thn',
        'peserta_kb_tradisional_3thn',
        'bukan_peserta_kb_3thn',
        'peserta_kb_modern_4thn',
        'peserta_kb_tradisional_4thn',
        'bukan_peserta_kb_4thn',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }

}
