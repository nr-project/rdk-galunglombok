<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kegiatans';

    protected $fillable = [
        'id_rw',
        'jumlah_individu_umur_10',
        'bekerja_umur_10_jumlah',
        'jumlah_individu_umur_10_14',
        'bekerja_umur_10_14_jumlah',
        'jumlah_individu_umur_15',
        'bekerja_umur_15_laki',
        'bekerja_umur_15_perempuan',
        'jumlah_bekerja',
        'tidak_bekerja_laki',
        'tidak_bekerja_perempuan',
        'jumlah_tidak_bekerja',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
