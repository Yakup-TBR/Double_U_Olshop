<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    
    protected $fillable =[
        'name', 'harga','deskripsi_pendek', 'deskripsi_panjang', 'tipe'
    ];
    protected $primaryKey = 'id';
}
