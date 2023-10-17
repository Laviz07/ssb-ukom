<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    protected $primaryKey = "nik_admin";
    protected $fillable = [
        'nama_admin',
        'no_telp',
        'email'
    ];
    public $timestamps = false;
}
