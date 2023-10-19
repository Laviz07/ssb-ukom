<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = "pelatih";
    protected $primaryKey = "nik_pelatih";
    protected $fillable = [
        'nama_pelatih',
        'nik_pelatih',
        'alamat',
        'deskripsi_pelatih',
        'email',
        'no_telp',
        'tanggal_lahir',
        'tempat_lahir'
    ];

    /**
     * Undocumented variable
     *
     * @var boolean
     */
    public $timestamps = false;

    public function presensi()
    {
        return $this->hasMany(Presensi_detail::class, "id_presensi_detail");
    }

    /**
     * Undocumented function
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user");
    }
}
