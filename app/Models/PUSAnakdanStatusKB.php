<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSAnakdanStatusKB extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_anakdan_status_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus',
        '0_anak_peserta_kb_modern',
        '0_anak_peserta_kb_tradisional',
        '0_anak_bukan_peserta_kb',
        '1_anak_peserta_kb_modern',
        '1_anak_peserta_kb_tradisional',
        '1_anak_bukan_peserta_kb',
        '2_anak_peserta_kb_modern',
        '2_anak_peserta_kb_tradisional',
        '2_anak_bukan_peserta_kb',
        'lebih_2_anak_peserta_kb_modern',
        'lebih_2_anak_peserta_kb_tradisional',
        'lebih_2_anak_bukan_peserta_kb',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
