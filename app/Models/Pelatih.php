<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = "pelatih";
    protected $primaryKey = "nik_pelatih";
    protected $fillable = [
        'nama_pelatih',
        'alamat',
        'deskripsi',
        'email',
        'no_telp',
        'tanggal_lahir',
        'tempat_lahir'
    ];
    public $timestamps = false;

    public function presensi(): HasMany
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }
}
