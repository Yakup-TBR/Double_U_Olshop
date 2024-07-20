<?php

namespace App\Http\Controllers;
use App\Models\produk;

use Illuminate\Http\Request;

class Update extends Controller
{
    public function index(){
        $produk = produk::all();
        return view("update",compact(['produk']));
    }
}
