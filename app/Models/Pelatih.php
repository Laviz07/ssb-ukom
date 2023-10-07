<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = "pelatih";
    protected $primaryKey = "nik_pelatih";
    protected $fillable = [
        'nama_pelatih',
        'alamat',
        'deskripsi_pelatih',
        'foto_pelatih',
        'no_telp',
        'tanggal_lahir_pelatih',
        'tempat_lahir_pelatih'
    ];
    public $timestamps = false;

    public function presensi()
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }
}
