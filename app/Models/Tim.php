<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    protected $table = "tim";
    protected $primaryKey = "id_tim";
    protected $fillable = [
        "nik_pelatih",
        "nama_tim",
        "deskripsi_tim",
        "foto_tim"
    ];

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, "nik_pelatih");
    }

    public function pemain()
    {
        return $this->hasMany(Pemain::class, "nisn_pemain");
    }
}
