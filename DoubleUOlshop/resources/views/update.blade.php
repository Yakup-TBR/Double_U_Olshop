<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobule U Olshop | Admin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<navbar class="navbar sticky-top">
        <div class="container text-center" id="navnya">

                <div class="col-start" id="logo">     
                        <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel">
                        <a class="navbar-brand" href="#">DOUBLE U OLSHOP</a>
                </div>

                <div class="col-center" id="cariProduk">
                    <div class="search" id="search">
                        <form action="{{ route('cariProduk') }}" method="GET">
                            <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari Produk Pilihanmu" aria-label="Cari">
                        </form>
                        <!-- <button type="submit" class="btn">
                            <i class="bi bi-search"></i>
                        </button> -->
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-lg"> + New Item</button>

        </div>
    </navbar>

    <section>
        <div style="padding: 0;">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Produk</th>
                            <th scope="col">nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Bahan</th>
                            <th scope="col">Deksripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $data)
                        <form action="/updateData/{{ $data->id_kos }}" method="get">
                            <tr>
                                <td class="checknya">
                                    <input class="form-check-input" type="checkbox" id="produk" name="produk" value="produk">
                                    <label class="form-check-label" for="produk"></label>
                                </td>
                                <td><img src="{{ asset('uploads/' . $data->gambar_1) }}" class="card-img-top"></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->tipe}}</td>
                                <td class="harga">{{ $data->harga }}</td>
                                <td>{{ Str::limit($data->deskripsi_pendek, 30) }}</td>
                                <td>{{ Str::limit($data->deskripsi_panjang, 30) }}</td>
                                <td>
                                    <button class="btn btn-secondary" type="submit" id="edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>                           
                                    </button>
                                    <button class="btn btn-danger" type="submit" id="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg> 
                                    </button>
                            </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
        </div>
        
    </section>
    script src="{{ asset('js/update.js') }}"></script>
</body>
</html>