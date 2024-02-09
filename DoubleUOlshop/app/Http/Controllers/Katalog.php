<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class Katalog extends Controller
{
    public function index(){
        $produk = produk::all();
        return view("index",compact(['produk']));
    }
}
