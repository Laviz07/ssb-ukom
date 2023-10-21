<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey = "id_jadwal";
    protected $fillable = [
        "judul_kegiatan",
        "tanggal_kegiatan"
    ];
    public $timestamps = false;

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, "id_kegiatan");
    }
}
