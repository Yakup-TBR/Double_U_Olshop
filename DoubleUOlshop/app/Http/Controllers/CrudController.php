<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    // Tampilkan daftar produk
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

        return view('update', ['produk' => $data]);
    }


    // Fungsi untuk menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi_pendek' => 'required',
            'deskripsi_panjang' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        // Generate a random ID for the document and the item
        $documentId = Str::random(16);

        $data = $request->only(['nama', 'kategori', 'harga', 'deskripsi_pendek', 'deskripsi_panjang']);
        $data['id'] = $documentId; // id jadi id document  juga
        $data['gambar'] = [];

        // Mengonfigurasi Firebase Storage
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
        $storage = $factory->createStorage();
        $bucket = $storage->getBucket();

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $fileName = Str::random(16) . '.' . $file->getClientOriginalExtension();
                $filePath = 'images/' . $fileName;

                // Unggah gambar ke Firebase Storage
                $uploadedFile = $bucket->upload(file_get_contents($file->getPathname()), [
                    'name' => $filePath
                ]);

                // Mengatur akses file menjadi publik
                $uploadedFile->acl()->add('allUsers', 'READER');

                // Dapatkan URL publik
                $imageUrl = 'https://storage.googleapis.com/' . $bucket->name() . '/' . $filePath;

                $data['gambar'][] = $imageUrl;
            }
        }

        // Menyimpan data ke Firestore dengan ID dokumen yang telah ditentukan
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $stok = $database->collection('produk');
        $stok->document($documentId)->set($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    // Fungsi ke halaman Edit Produk (Detail)
    public function editPage($id)
    {
        $detailProduk = app('firebase.firestore')->database()->collection('produk')->document($id)->snapshot();

        if ($detailProduk->exists()) {
            return view('edit', ['produk' => $detailProduk->data(), 'id' => $id]);
        } else {
            return redirect()->route('produk.index')->with('error', 'Kos tidak ditemukan');
        }
    }

    // Fungsi Hapus Produk di detail
    public function deleteDetail($id)
    {
        $db = app('firebase.firestore')->database();
        $produkRef = $db->collection('produk')->document($id);

        $snapshot = $produkRef->snapshot();

        if ($snapshot->exists()) {
            $data = $snapshot->data();
            $gambarUrls = $data['gambar'] ?? [];

            // Mengonfigurasi Firebase Storage
            $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
            $storage = $factory->createStorage();
            $bucket = $storage->getBucket();

            // Hapus gambar dari Firebase Storage
            foreach ($gambarUrls as $url) {
                $path = parse_url($url, PHP_URL_PATH);
                $fileName = basename($path);

                // Hapus gambar dari Firebase Storage
                $bucket->object('images/' . $fileName)->delete();
            }

            // Hapus dokumen produk dari Firestore
            $produkRef->delete();

            return redirect()->route('produk.index')->with('success', 'Produk dan gambar telah dihapus.');
        } else {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }


    // Fungsi Hapus 1 Produk di Tabel
    public function deleteOne($id)
    {
        $db = app('firebase.firestore')->database();
        $produkRef = $db->collection('produk')->document($id);

        $snapshot = $produkRef->snapshot();

        if ($snapshot->exists()) {
            $data = $snapshot->data();
            $gambarUrls = $data['gambar'] ?? [];

            // Mengonfigurasi Firebase Storage
            $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
            $storage = $factory->createStorage();
            $bucket = $storage->getBucket();

            // Hapus gambar dari Firebase Storage
            foreach ($gambarUrls as $url) {
                $path = parse_url($url, PHP_URL_PATH);
                $fileName = basename($path);

                // Hapus gambar dari Firebase Storage
                $bucket->object('images/' . $fileName)->delete();
            }

            // Hapus dokumen produk dari Firestore
            $produkRef->delete();

            return redirect()->route('produk.index')->with('success', 'Produk dan gambar telah dihapus.');
        } else {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }
}
