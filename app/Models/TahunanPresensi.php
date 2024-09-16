<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunanPresensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'date',
        'hari_kerja',
        'hadir_normal',
        'terlambat',
        'pulang_cepat',
        'tanpa_absen',
        'absen_error',
        'kehadiran',
        'absen_sekali',
        'tanpa_keterangan',
        'cuti',
        'ketidakhadiran',
        'DL',
    ];
    
    public function pegawais(){
        return $this->belongsTo(DataPegawai::class, 'nip', 'nip');
    }
}
