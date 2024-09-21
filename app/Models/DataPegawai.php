<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nip',
        'nama',
        'nama_gelar',
        'jenis_kelamin',
        'ttl',
        'tmt',
        'bup',
        'status_pegawai',
        'jenis_jabatan',
        'id_gol',
        'id_jabatan',
        'id_pendidikan',
        'jenis_pegawai',
        'id_lokasi',
        'foto',
    ];
    
    public function pangkatgols(){
        return $this->belongsTo(PangkatGol::class,'id_gol', 'id');
    }
    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatan', 'id');
    }
    public function pendidikans(){
        return $this->belongsTo(Pendidikan::class,'id_pendidikan', 'id');
    }
    public function kabupatens(){
        return $this->belongsTo(Kabupaten::class,'id_lokasi', 'id');
    }
}
