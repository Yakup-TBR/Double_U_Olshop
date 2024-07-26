<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    
    protected $fillable =[
        'nama', 'harga','deskripsi_pendek', 'deskripsi_panjang', 'tipe', 'gambar_1'
    ];
    protected $primaryKey = 'id';
}
