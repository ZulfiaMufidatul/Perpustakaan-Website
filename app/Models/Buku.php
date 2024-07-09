<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'id_buku',
        'judul_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok_buku',
        'buku_tersedia',
        'sampul',
        'deskripsi'
    ];

   

}