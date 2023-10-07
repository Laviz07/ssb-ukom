<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    use HasFactory;
    protected $table = "pemain";
    protected $primaryKey = "nisn_pemain";
    protected $fillable = [
        "nama_pemain",
        "alamat_pemain",
        "tempat_lahir_pemain",
        "tanggal_lahir_pemain",
        "foto_pemain",
        "deskripsi_pemain",
        "posisi",
        "kategori_umur",
        "no_punggung"
    ];
    public $timestamps = false;

    public function presensi()
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }
}
