<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSTempatKB extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_tempat_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_modern',
        'rs_pemerintah_tni_polri',
        'rs_swasta',
        'puskesmas_klinik_tni_polri',
        'klinik_swasta',
        'praktek_dokter',
        'pustu_pusling_bidan_desa',
        'praktek_mandiri_bidan',
        'mobil_pelayanan_kb',
        'toko_obat_apotik',
        'lainnya',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }

}
