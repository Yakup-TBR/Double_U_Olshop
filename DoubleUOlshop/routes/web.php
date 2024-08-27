<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\Katalog;
use App\Http\Controllers\ProtectedController;

use App\Http\Controllers\Update;
use Illuminate\Support\Facades\Route;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\Controllers\FirebaseTestController;

// Katalog | Tarik data semua produk
Route::get('/', [Katalog::class, 'index'])->name('katalog');

// Katalog | Searching Produk
Route::get('/search', [Katalog::class, 'search'])->name('searchBox');

// Katalog | Filter checkbox
Route::get('/filter', [Katalog::class, 'filter'])->name('filter');
// Route::get('/searchFilter', [Katalog::class, 'searchFilter'])->name('searchFilter');

// Katalog | Searching Searchbox
// Route::get('/searchBox', [Katalog::class, 'search'])->name('searchBox');

// Detail Produk
Route::get('/detail/{id}', [Katalog::class, 'detailPage'])->name('detail');

//  -------- PUBLIC END, ADMIN START ---------

// Rute untuk halaman login tanpa middleware
Route::get('/login', [ProtectedController::class, 'loginView'])->name('loginView');
Route::post('/login', [ProtectedController::class, 'loginSubmit'])->name('login.submit');

Route::middleware(['firebase.auth'])->group(function () {
    Route::get('/gudang', [CrudController::class, 'index'])->name('produk.index');
});

Route::post('/logout', [ProtectedController::class, 'logout'])->name('logout');

// CRUD | Searching produk
Route::get('/searchGudang', [CrudController::class, 'search'])->name('searchGudang');

// CRUD | Tarik data semua produk
// Route::get('/gudang', [CrudController::class, 'index'])->name('produk.index');

// CRUD | Tambah produk
Route::post('/produk', [CrudController::class, 'store'])->name('produk.store');

// CRUD | Edit Page produk
Route::get('/edit/{id}', [CrudController::class, 'editPage'])->name('produk.edit');

// CRUD | Edit Modal Produk
Route::put('/produk/{id}', [CrudController::class, 'editModal'])->name('produk.editModal');

// CRUD | Hapus Produk di detail
Route::get('/deleteDetail/{id}', [CrudController::class, 'deleteDetail'])->name('produk.deleteDetail');

// CRUD | Hapus 1 Produk di Update
Route::get('/delete/{id}', [CrudController::class, 'deleteOne'])->name('produk.deleteOne');

// ABOUT
Route::get('/about', function () {
    return view('about');
})->name('about');

// Test Navbar
Route::get('/navbar', function () {
    return view('partial.navbar');
});
