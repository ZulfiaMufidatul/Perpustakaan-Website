<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'id_peminjaman',
        'nisn',
        'judul_buku',
        'tanggal_pinjam',
        'tanggal_jatuhtempo',
        'tanggal_kembali',
        'status_peminjaman'
    ];

    
    
}
