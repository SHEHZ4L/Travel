<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paketwisata extends Model
{
    use HasFactory;

    protected $table = 'paketwisata';

    protected $fillable = [
        'nama_paket','daerah_wisata','harga_paket'
    ];
}