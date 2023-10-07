<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;
    protected $table = "statistik";
    protected $primaryKey = "id_statistik";
    protected $fillble = [
        "id_peninjauan",
        "detail_statistik"
    ];
    public $timestamps = false;

    public function peninjauan()
    {
        return $this->belongsTo(Peninjauan::class, 'id_peninjauan');
    }
}
