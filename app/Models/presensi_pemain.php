<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi_pemain extends Model
{
    use HasFactory;
    protected $table =  "presensi_pemain";
    protected $primaryKey = "id_presensi_pemain";
    protected $keyType = 'string';
    protected $fillable =  [
        "id_presensi",
        "id_presensi_pemain",
        "nisn_pemain",
        "keterangan",
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
}
