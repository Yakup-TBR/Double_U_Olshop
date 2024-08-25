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

    public function detailPage($id)
    {
        $detailProduk = app('firebase.firestore')->database()->collection('produk')->document($id)->snapshot();

        if ($detailProduk->exists()) {
            return view('detail', ['produk' => $detailProduk->data(), 'id' => $id]);
        } else {
            return redirect()->route('produk.index')->with('error', 'Kos tidak ditemukan');
        }
    }

    public function search(Request $request)
    {
        $query = strtolower($request->input('search'));

        // Mengonfigurasi koneksi ke Firestore
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $stok = $database->collection('produk');

        $documents = $stok->documents();
        $data = [];

        foreach ($documents as $document) {
            if ($document->exists()) {
                $produk = $document->data();

                // Konversi setiap field yang relevan menjadi huruf kecil
                $nama = strtolower($produk['nama']);
                $kategori = strtolower($produk['kategori']);
                $deskripsi_pendek = strtolower($produk['deskripsi_pendek']);

                // Cek apakah di query ada nama, kategori, atau deskripsi_pendek
                if (strpos($nama, $query) !== false || strpos($kategori, $query) !== false || strpos($deskripsi_pendek, $query) !== false) {
                    $data[] = $produk;
                }
            }
        }

        return view('index', ['produk' => $data]);
    }

    public function searchFilter(Request $request)
    {
        $query = strtolower($request->input('search'));

        // Mengonfigurasi koneksi ke Firestore
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $stok = $database->collection('produk');

        $documents = $stok->documents();
        $data = [];

        foreach ($documents as $document) {
            if ($document->exists()) {
                $produk = $document->data();

                $nama = strtolower($produk['nama']);
                $kategori = strtolower($produk['kategori']);
                $deskripsi_pendek = strtolower($produk['deskripsi_pendek']);

                // Cek apakah query ada di nama, kategori, atau deskripsi_pendek
                $match = strpos($nama, $query) !== false ||
                    strpos($kategori, $query) !== false;

                // Periksa apakah query ada di deskripsi_pendek
                $deskripsi_words = explode(' ', $deskripsi_pendek);
                foreach ($deskripsi_words as $word) {
                    if (strpos($word, $query) !== false) {
                        $match = true;
                        break;
                    }
                }

                // Jika filter kategori diaktifkan, cek apakah kategori atau deskripsi_pendek cocok
                if ($request->has('tipe')) {
                    $checkedValues = array_map('strtolower', $request->input('tipe'));

                    // Cek apakah deskripsi_pendek mengandung salah satu kata dari filter kategori
                    $deskripsi_match = false;
                    foreach ($checkedValues as $value) {
                        if (strpos($deskripsi_pendek, $value) !== false) {
                            $deskripsi_match = true;
                            break;
                        }
                    }

                    $match = $match && (in_array($kategori, $checkedValues) || $deskripsi_match);
                }

                if ($match) {
                    $data[] = $produk;
                }
            }
        }

        return view('index', ['produk' => $data]);
    }

    // filter Checkbox
    public function filter(Request $request)
    {
        // Mendapatkan input dari form
        $tipe = $request->input('tipe', []);
        $hargaRange = $request->input('harga', []);

        // Mengonfigurasi koneksi ke Firestore
        $firestore = (new Factory)
            ->withServiceAccount(config_path('firebase-credential.json'))
            ->createFirestore();

        $stok = $firestore->database()->collection('produk');

        // Memulai query Firestore
        $query = $stok;
        $filteredData = [];
        $documents = $query->documents();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $produk = $document->data();

                // Filter berdasarkan kategori (tipe)
                if (!empty($tipe) && !in_array($produk['kategori'], $tipe)) {
                    continue; // Lewati jika kategori tidak sesuai
                }

                // Filter berdasarkan harga (rentang)
                if (!empty($hargaRange)) {
                    $harga = $produk['harga']; // Asumsi field harga di Firestore adalah angka

                    // Memeriksa apakah harga produk sesuai dengan rentang harga yang dipilih
                    $hargaValid = false;
                    foreach ($hargaRange as $range) {
                        switch ($range) {
                            case '<50000':
                                if ($harga < 50000) $hargaValid = true;
                                break;
                            case '50000-100000':
                                if ($harga >= 50000 && $harga <= 100000) $hargaValid = true;
                                break;
                            case '100000-150000':
                                if ($harga >= 100000 && $harga <= 150000) $hargaValid = true;
                                break;
                            case '150000-200000':
                                if ($harga >= 150000 && $harga <= 200000) $hargaValid = true;
                                break;
                            case '>200000':
                                if ($harga > 200000) $hargaValid = true;
                                break;
                        }
                    }

                    if (!$hargaValid) {
                        continue; // Lewati jika harga tidak sesuai
                    }
                }

                // Jika lolos semua filter, tambahkan ke hasil
                $filteredData[] = $produk;
            }
        }

        return view('index', ['produk' => $filteredData]);
    }
}
