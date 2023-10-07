<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peninjauan extends Model
{
    use HasFactory;
    protected $table = "peninjauan";
    protected $primaryKey = "id_peninjauan";
    protected $fillable = [
        "nisn_pemain",
        "nik_pelatih",
        "id_kegiatan",
        "tanggal_peninjauan",
        "evaluasi",
        "nilai"
    ];
    public $timestamps = false;

    public function pemain()
    {
        return $this->belongsTo(Pemain::class, "nisn_pemain");
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, "nik_pelatih");
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "id_kegiatan");
    }

    public function statistik()
    {
        return $this->hasMany(Statistik::class, "id_statistik");
    }
}
