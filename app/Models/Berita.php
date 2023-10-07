<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita_sekolah";
    protected $primaryKey = "id_berita";
    protected $fillable = [
        "judul_berita",
        "isi_berita",
        "foto_berita"
    ];
    public $timestamps = false;
}
