<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseTestController extends Controller
{
    public function testConnection()
    {
        try {
            // Ambil path dari konfigurasi
            $path = config('firebase.credentials.file');
            $fullPath = base_path($path);

            // Tes apakah file kredensial ada
            if (!file_exists($fullPath)) {
                throw new \Exception('Firebase credentials file does not exist at path: ' . $fullPath);
            }

            // Buat instance Factory dengan file kredensial
            $factory = (new Factory)->withServiceAccount($fullPath);
            $firestore = $factory->createFirestore()->database();

            // Uji koneksi dengan mendapatkan daftar koleksi
            $collections = $firestore->collections();

            $collectionNames = [];
            foreach ($collections as $collection) {
                $collectionNames[] = $collection->id();
            }

            return response()->json([
                'message' => 'Firebase connected successfully!',
                'collections' => $collectionNames
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Firebase connection failed: ' . $e->getMessage()], 500);
        }
    }
}

