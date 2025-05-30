<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatPendidikan extends Model
{
    use HasFactory;

    protected $table = 'tingkat_pendidikans';

    protected $fillable = [
        'id_rw',
        'jenis_kelamin',
        'tidak_sekolah',
        'tidak_tamat_sd',
        'tamat_sd',
        'tamat_smp',
        'tamat_sma',
        'tamat_pt',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
