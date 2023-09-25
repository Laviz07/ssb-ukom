<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = "pelatih";
    protected $primaryKey = "id_pelatih";
    protected $fillable = [
        'nama_pelatih',
        'alamat',
        'desk_pelatih',
        'foto_pelatih',
        'no_telp',
        'tgl_lahir',
        'tmpt_lahir'
    ];
    public $timestamps = false;
}
