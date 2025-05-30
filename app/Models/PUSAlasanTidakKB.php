<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUSAlasanTidakKB extends Model
{
    use HasFactory;

    protected $table = 'p_u_s_alasan_tidak_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_bukan_peserta_kb',
        'ingin_hamil_anak',
        'tidak_tahu_tentang_kb',
        'alasan_kesehatan',
        'efek_samping_kegagalan_kb',
        'tempat_pelayanan_jauh',
        'alat_obat_cara_kb_tidak_tersedia',
        'biaya_mahal',
        'tidak_ada_alat_cara_kb_yang_cocok',
        'suami_keluarga_menolak',
        'alasan_agama',
        'tidak_ada_petugas_pelayanan_kb',
        'baru_melahirkan',
        'jarang_melakukan_hubungan_suami_istri',
        'infertilitas_menopause',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
