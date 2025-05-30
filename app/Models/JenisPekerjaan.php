<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pekerjaans';

    protected $fillable = [
        'id_rw',
        'jumlah_individu_dalam_keluarga',
        'petani_jumlah',
        'nelayan_jumlah',
        'pedagang_jumlah',
        'pejabat_negara_jumlah',
        'pns_tni_polri_jumlah',
        'swasta_jumlah',
        'pensiunan_jumlah',
        'pekerja_lepas_jumlah',
        'jumlah_bekerja',
        'tidak_bekerja_jumlah',
    ];
    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
