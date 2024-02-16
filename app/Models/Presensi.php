<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Presensi
 *
 * @property int $id_presensi
 * @property string $hari_tanggal_hadir
 * @method static \Database\Factories\PresensiFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Presensi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presensi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presensi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Presensi whereHariTanggalHadir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presensi whereIdPresensi($value)
 * @mixin \Eloquent
 */
class Presensi extends Model
{
    use HasFactory;
    protected $table = "presensi";
    protected $primaryKey = "id_presensi";
    protected $keyType = 'string';
    protected $fillable = [
        "id_presensi",
        "id_kegiatan",
        "hari_tanggal_hadir"
    ];
    public $timestamps = false;

    public function presensi_detail()
    {
        return $this->hasMany(PresensiDetail::class, "id_presensi_detail");
    }

    public function kegiatan(): BelongsTo
    {
      return $this->belongsTo(Kegiatan::class, "id_kegiatan");
    }
}
