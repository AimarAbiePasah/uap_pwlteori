<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $primaryKey = 'id_properties';

    protected $fillable = [
        'name', 
        'deskripsi', 
        'jumlah_kamar_tidur', 
        'jumlah_kamar_mandi', 
        'luas', 
        'photo', 
        'harga', 
        'alamat', 
        'category', 
        'ketersediaan'
    ];
}
