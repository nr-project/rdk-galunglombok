<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarianDisiplin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'date',
        'telat_menit',
        'pc_menit',
        'a1_menit',
        'tk_hari',
        'telat_sanggah',
        'pc_sanggah',
        'total',
    ];
    
    public function pegawais(){
        return $this->belongsTo(DataPegawai::class, 'nip', 'nip');
    }
}
