<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKB extends Model
{
    use HasFactory;

    protected $table = 'informasi_k_b_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_peserta_kb_dan_pernah_kb',
        'jenis_alat_obat_cara_kb_kontrasepsi',
        'efek_samping_alat_obat_cara_kb_kontrasepsi',
        'apa_yang_harus_dilakukan_jika_efek_samping',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
