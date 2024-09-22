<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'jabatan'];

    public function datapegawais()
    {
        return $this->hasMany(DataPegawai::class, 'id_jabatan', 'id');
    }
}
