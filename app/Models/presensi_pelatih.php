<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi_pelatih extends Model
{
    use HasFactory;
    protected $table =  "presensi_pelatih";
    protected $primaryKey = "id_presensi_pelatih";
    protected $keyType = 'string';
    protected $fillable =  [
        "id_presensi",
        "id_presensi_pelatih",
        "nik_pelatih",
        "keterangan",
    ];
    public $timestamps = false;

    public function presensi()
    {
        return $this->belongsTo(Presensi::class, "id_presensi");
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, "nik_pelatih");
    }
}
