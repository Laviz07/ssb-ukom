<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiDetail extends Model
{
    use HasFactory;
    protected $table =  "presensi_detail";
    protected $primaryKey = "id_presensi_detail";
    protected $keyType = 'string';
    protected $fillable =  [
        "id_presensi",
        "id_presensi_detail",
        "nik_pelatih",
        "nisn_pelatih",
        "keterangan"
    ];
    public $timestamps = false;

    public function presensi()
    {
        return $this->belongsTo(Presensi::class, "id_presensi");
    }

    public function pemain()
    {
        return $this->belongsTo(Pemain::class, "nisn_pemain");
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, "nik_pelatih");
    }
}
