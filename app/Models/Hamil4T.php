<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hamil4T extends Model
{
    use HasFactory;

    protected $table = 'hamil4_t_s';

    protected $fillable = [
        'id_rw',
        'jumlah_pus_status_hamil',
        'umur_kurang_20',
        'umur_20_35',
        'umur_lebih_35',
        'jumlah_anak_lahir_lebih_2',
        'jarak_kelahiran_sebelumnya_kurang_2_tahun',
        'umur_anak_terkecil_kurang_3_tahun',
    ];

    public function rw(){
        return $this->belongsTo(NamaRW::class, 'id_rw', 'id');
    }
}
