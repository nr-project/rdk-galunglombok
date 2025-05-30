<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanAnak extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_anaks';

    protected $fillable = [
        'id_rw',
        'klasifikasi_umur',
        'sekolah_lk',
        'tidak_sekolah_lk',
        'sekolah_pr',
        'tidak_sekolah_pr',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }

}
