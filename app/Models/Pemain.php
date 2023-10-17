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
        "nisn_pemain",
        "nama_pemain",
        "alamat",
        "tempat_lahir",
        "tanggal_lahir",
        "deskripsi_pemain",
        "posisi",
        "kategori_umur",
        "no_punggung",
        "no_telp",
        "email"
    ];
    public $timestamps = false;

    public function presensi()
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
