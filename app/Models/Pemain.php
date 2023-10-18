<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Undocumented function
     *
     * @return HasMany
     */
    public function presensi(): HasMany
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }

    /**
     * Mengembalikan pemain ke user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
