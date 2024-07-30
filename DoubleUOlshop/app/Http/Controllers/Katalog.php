<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Firestore;
use Illuminate\Support\Str;

class Katalog extends Controller
{
    public function index()
    {
        // Mengonfigurasi koneksi ke Firestore
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $stok = $database->collection('produk');
        $documents = $stok->documents();

        // Debugging: Tampilkan data dokumen yang diambil
        // dd($documents);

        $data = [];
        foreach ($documents as $document) {
            if ($document->exists()) {
                $data[] = $document->data();
            }
        }

        // Debugging: Tampilkan data yang akan dikirim ke view
        // dd($data);

        return view('index', ['produk' => $data]);
    }

    
}
