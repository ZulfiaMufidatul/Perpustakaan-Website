<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $fillable = [
        'id_stok',
        'id_buku',
        'jml_stok'
    ];

    // public function buku()
    // {
    //     return $this->belongsTo(Buku::class, 'id_buku');
    // }
}
