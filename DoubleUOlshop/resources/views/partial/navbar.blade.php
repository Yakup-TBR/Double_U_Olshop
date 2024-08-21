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
    <navbar class="navbar sticky-top" id="navbar">
        <div class="container text-center col-xl-11 col-xxl-11" id="navnya">
            <div class="col-start" id="logo">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo" class="logo-img">
                        </div>
                        <div class="col">
                            <a class="navbar-brand" href="{{ route('katalog') }}">Juli Jewelry</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-center" id="searchContainer">
                <div class="search">
                    <form action="{{ route('searchBox') }}" method="GET">
                        <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari produk pilihanmu" aria-label="Cari">
                    </form>
                </div>
            </div>

            <div class="col-end" id="menu">
                <a class="navbar-brand" href="{{ route('katalog') }}">Produk</a>
                <a class="navbar-brand" href="#">About</a>
                <a class="navbar-brand" href="#">Contact</a>
            </div>


        </div>

        <div class="container text-center" id="navbarMobile">
            <div class="row" id="navbarMobileAtas">

                <div class="col text-start" id="sidebar">
                    <div class="container d-flex align-items-center" id="siderbarcon">
                        <img src="{{ asset('img/icon_sidebar.png') }}" alt="icon_sidebar" id="toggleSidebar">
                    </div>
                </div>


                <div class="col text-center" id="logoMobile">
                    <div class="container">
                        <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="logo_mobile">
                    </div>
                </div>

                <div class="col text-end" id="searchMobile">
                    <div class="container d-flex justify-content-end align-items-center" id="searchcon">
                        <img src="{{ asset('img/icon_search.png') }}" alt="icon_search">
                    </div>
                </div>

            </div>
            <div class="container text-center" id="navbarMobileBawah">
                <div class="row">
                    <div class="col" id="menu">
                        <div class="col text-start" id="produk">
                            <a class="navbar-brand" href="{{ route('katalog') }}">Produk</a>
                        </div>
                        <div class="col text-center">
                            <a class="navbar-brand" href="#">About</a>
                        </div>
                        <div class="col text-end">
                            <a class="navbar-brand" href="#">Contact</a>

                        </div>
                    </div>
                </div>
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