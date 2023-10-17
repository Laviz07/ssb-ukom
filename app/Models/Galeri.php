<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = "galeri";
    protected $primaryKey = "id_foto";
    protected $fillable = [
        "nik_admin",
        "keterangan_foto",
        "foto"
    ];
    public $timestamps = false;
}
