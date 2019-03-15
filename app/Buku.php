<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $table = 'buku';

    protected $primaryKey = 'no_buku';

    protected $fillable = [
        'judul', 'penulis', 'penerbit', 'tahun_terbit', 'supplier', 'harga', 'stok'
    ];
}

?>