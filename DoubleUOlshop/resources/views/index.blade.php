<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double U Olshop | Katalog</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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

                <div class="col-end" id="menu">
                    <a class="navbar-brand" href="#">Produk</a>
                    <a class="navbar-brand" href="#">About</a>
                    <a class="navbar-brand" href="#">Contact</a>
                </div>

        </div>
    </navbar>
    <section>

    </section>
    <footer>

    </footer>
</body>
</html>