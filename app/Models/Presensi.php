<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = "presensi";
    protected $primaryKey = "id_presensi";
    protected $fillable = [
        "id_kegiatan",
        "tanggal_presensi"
    ];
    public $timestamps = false;

    public function presensi_detail()
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }
}
