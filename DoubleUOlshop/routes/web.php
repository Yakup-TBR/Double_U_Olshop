<?php

use App\Http\Controllers\Katalog;
use App\Http\Controllers\Update;
use Illuminate\Support\Facades\Route;

// Katalog | Tarik data semua produk
Route::get('/', [Katalog::class, 'index'])->name('katalog');

// Searching Produk
Route::get('/search', [Katalog::class, 'search'])->name('search');

// Searching ChekBox
Route::get('/searchBox', [Katalog::class, 'searchBox'])->name('searchBox');

// Detail Produk
Route::get('/detail/{id}', [Katalog::class, 'detail'])->name('detail');

// Update Produk 
Route::get('/update', [Update::class, 'index'])->name('update');


// CRUD



// Test Navbar
Route::get('/navbar', function(){
    return view('partial.navbar');
});

