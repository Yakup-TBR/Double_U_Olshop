<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partial/navbar.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Navbar</title>
</head>

<body>
    <!-- -- Navbar Start -- -->
    <navbar class="navbar sticky-top">
        <div class="container text-center" id="navnya">
            <div class="col-start" id="logo">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel" class="logo-img">
                        </div>
                        <div class="col">
                            <a class="navbar-brand" href="#">Juli Jewelry</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-center" id="searchContainer">
                <div class="search">
                    <form action="{{ route('search') }}" method="GET">
                        <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari produk pilihanmu" aria-label="Cari">
                    </form>
                </div>
            </div>

            <div class="col-end" id="menu">
                <a class="navbar-brand" href="#">Produk</a>
                <a class="navbar-brand" href="#">About</a>
                <a class="navbar-brand" href="#">Contact</a>
            </div>

            <div class="mobile-only" id="mobileMenuIcon">
                <i class="fa fa-instagram fa-lg"></i> <!-- Icon menu untuk mobile -->
            </div>
        </div>
    </navbar>
    <!-- -- Navbar End -- -->
    <section>
        @yield('isi')
    </section>
    <script src="{{ asset('js/navbar.js') }}"></script>

    @yield('script')
    @extends('partial.footer')
</body>

</html>