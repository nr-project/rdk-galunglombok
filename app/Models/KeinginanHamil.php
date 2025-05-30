<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeinginanHamil extends Model
{
    use HasFactory;

    protected $table = 'keinginan_hamils';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_status_hamil',
        'ingin_hamil_saat_itu',
        'ingin_hamil_nantikedepan',
        'tidak_ingin_anak_lagi',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }

}
