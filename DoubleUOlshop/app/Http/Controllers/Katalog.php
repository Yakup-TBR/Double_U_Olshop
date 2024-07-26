<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Firestore;
use Illuminate\Support\Str;

class Katalog extends Controller
{
    protected $firestore;

    public function __construct()
    {
        $path = config('firebase.credentials.file');
        // dd($path); // Hapus atau komentari ini setelah memastikan path benar
        
        $factory = (new Factory)->withServiceAccount($path);
        $this->firestore = $factory->createFirestore()->database();
    }

    // Tarik semua data di collection produk
    public function index()
    {
        $produkRef = $this->firestore->collection('produk');
        $documents = $produkRef->documents();
        
        $produk = [];
        foreach ($documents as $document) {
            $data = $document->data();
            $data['id'] = $document->id();
            $produk[] = $data;
        }
        
        return view("index", compact('produk'));
    }

    public function detail($id)
    {
        $produkRef = $this->firestore->collection('produk')->document($id);
        $snapshot = $produkRef->snapshot();

        if (!$snapshot->exists()) {
            abort(404);
        }

        $produk = $snapshot->data();
        return view("detail", compact('produk'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['gambar_1'] = $this->uploadFile($request->file('gambar_1'));
        $data['gambar_2'] = $request->hasFile('gambar_2') ? $this->uploadFile($request->file('gambar_2')) : null;
        $data['gambar_3'] = $request->hasFile('gambar_3') ? $this->uploadFile($request->file('gambar_3')) : null;

        $this->firestore->collection('produk')->add($data);

        return redirect()->route('produk.index');
    }

    public function edit($id)
    {
        $produkRef = $this->firestore->collection('produk')->document($id);
        $snapshot = $produkRef->snapshot();

        if (!$snapshot->exists()) {
            abort(404);
        }

        $produk = $snapshot->data();
        return view('form', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('gambar_1')) {
            $data['gambar_1'] = $this->uploadFile($request->file('gambar_1'));
        }
        if ($request->hasFile('gambar_2')) {
            $data['gambar_2'] = $this->uploadFile($request->file('gambar_2'));
        }
        if ($request->hasFile('gambar_3')) {
            $data['gambar_3'] = $this->uploadFile($request->file('gambar_3'));
        }

        $this->firestore->collection('produk')->document($id)->set($data, ['merge' => true]);

        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $this->firestore->collection('produk')->document($id)->delete();

        return redirect()->route('produk.index');
    }

    protected function uploadFile($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        return $filename;
    }
}
