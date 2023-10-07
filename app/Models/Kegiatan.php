<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $primaryKey = "id_kegiatan";
    protected $fillable = [
        "nik_pelatih",
        "id_jadwal",
        "jam_kegiatan",
        "tipe_kegiatan",
        "foto_kegiatan",
        "detail_kegiatan",
        "laporan_kegiatan"
    ];
    public $timestamps = false;

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, "nik_pelatih");
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, "id_jadwal");
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, "id_presensi");
    }
}
