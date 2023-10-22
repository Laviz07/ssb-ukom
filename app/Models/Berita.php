<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Berita
 *
 * @property int $id_berita
 * @property string $judul_berita
 * @property string|null $foto_berita
 * @property string|null $isi_berita
 * @method static \Database\Factories\BeritaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Berita newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Berita newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Berita query()
 * @method static \Illuminate\Database\Eloquent\Builder|Berita whereFotoBerita($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Berita whereIdBerita($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Berita whereIsiBerita($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Berita whereJudulBerita($value)
 * @mixin \Eloquent
 */
class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    protected $fillable = [
        "judul_berita",
        "isi_berita",
        "foto_berita"
    ];
    public $timestamps = false;
}
