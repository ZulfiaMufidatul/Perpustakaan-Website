<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';
    protected $fillable = [
        'noTr',
        'judul_buku',
        'harga_buku',
        'jumlah',
        'asal_dana'
    ];

}


