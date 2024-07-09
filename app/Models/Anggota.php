<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = [
        'nisn',
        'nama_anggota',
        'kelas',
        'no_hp',
        'foto'
    ];

}


