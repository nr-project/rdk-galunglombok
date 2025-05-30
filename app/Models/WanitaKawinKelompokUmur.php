<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WanitaKawinKelompokUmur extends Model
{
    use HasFactory;

    protected $table = 'wanita_kawin_kelompok_umurs';

    protected $fillable = [
        'id_rw',
        'jumlah_wanita_kawin',
        'umur_10_14',
        'umur_15_19',
        'umur_20_24',
        'umur_25_29',
        'umur_30_34',
        'umur_35_39',
        'umur_40_44',
        'umur_45_49',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
