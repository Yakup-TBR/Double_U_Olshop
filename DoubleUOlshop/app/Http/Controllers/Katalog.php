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

    public function detail($id){
        $produk = Produk::findOrFail($id); // Untuk cari sesuai id
        return view("detail",compact(['produk']));
    }

    public function search(Request $request)
    {   
        if($request->has('search')) {
            $searchQuery = $request->search;
            $produk = Produk::where('name', 'like', '%' . $searchQuery . '%')->get();
        } else {
            $produk = Produk::all();
        }

        return view("index", compact('produk')); 
    }

    public function searchBox(Request $request)
    {
        $query = Produk::query();
    
        if ($request->has('tipe')) {
            $query->whereIn('tipe', $request->tipe);
        }
    
        $produk = $query->get();
    
        return response()->json($produk);
    }

}
