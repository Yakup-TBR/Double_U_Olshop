<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CrudController extends Controller
{
    // Tampilkan daftar produk
    public function index(Request $request)
    {
        // Mengambil informasi pengguna dari session
        $firebaseUser = $request->session()->get('firebase_user');

        // Mengonfigurasi koneksi ke Firestore
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));

        // Membuat koneksi ke Firestore
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $stok = $database->collection('produk');
        $documents = $stok->documents();

        // Mengambil data dari Firestore
        $data = [];
        foreach ($documents as $document) {
            if ($document->exists()) {
                $data[] = $document->data();
            }
        }

        // Mengirim data ke view 'update'
        return view('update', [
            'produk' => $data,
            'user' => $firebaseUser
        ]);
    }


    // Fungsi searching di gudang
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

        return view('update', ['produk' => $data]);
    }


    // Fungsi untuk menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric|min:0',
            'deskripsi_pendek' => 'required',
            'deskripsi_panjang' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        // Generate a unique ID combining timestamp and random string
        $timestamp = Carbon::now()->format('YmdHis');
        $randomString = Str::random(8);
        $documentId = $timestamp . '_' . $randomString;

        $data = $request->only(['nama', 'kategori', 'harga', 'deskripsi_pendek', 'deskripsi_panjang']);
        $data['id'] = $documentId; // id jadi id document juga
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

    public function editModal(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi_pendek' => 'required',
            'deskripsi_panjang' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $data = $request->only(['nama', 'kategori', 'harga', 'deskripsi_pendek', 'deskripsi_panjang']);
        $data['id'] = $id;
        $data['gambar'] = [];

        // Mengonfigurasi Firebase
        $factory = (new Factory)->withServiceAccount(config_path('firebase-credential.json'));
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $produkRef = $database->collection('produk')->document($id);

        $snapshot = $produkRef->snapshot();

        // Hapus gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            $oldGambar = $snapshot->data()['gambar'] ?? [];
            $storage = $factory->createStorage();
            $bucket = $storage->getBucket();

            foreach ($oldGambar as $url) {
                $path = parse_url($url, PHP_URL_PATH);
                $fileName = basename($path);
                $bucket->object('images/' . $fileName)->delete();
            }

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
        } else {
            $data['gambar'] = $snapshot->data()['gambar'] ?? [];
        }

        // Perbarui data produk di Firestore
        $produkRef->set($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
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
