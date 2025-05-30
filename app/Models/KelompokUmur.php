<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUmur extends Model
{
    use HasFactory;

    protected $table = 'kelompok_umurs';

    protected $fillable = [
        'id_rw',
        'jenis_kelamin',
        'umur_0_1',
        'umur_2_4',
        'umur_5_9',
        'umur_10_14',
        'umur_15-19',
        'umur_20_24',
        'umur_25_29',
        'umur_30_34',
        'umur_35_39',
        'umur_40_44',
        'umur_45_49',
        'umur_50_54',
        'umur_55_59',
        'umur_60_64',
        'umur_65_69',
        'umur_70_74',
        'umur_75',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
