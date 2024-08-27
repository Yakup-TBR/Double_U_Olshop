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
    <div class="wrapper">
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
                    <a class="navbar-brand" href="{{ route('katalog') }}">Product</a>
                    <a class="navbar-brand" href="{{ route('about') }}">About</a>
                    <a class="navbar-brand" href="{{ route('about') }}#contact">Contact</a>
                </div>


            </div>

            <div class="container text-center" id="navbarMobile">
                <div class="row" id="navbarMobileAtas">

                    <div class="col text-start" id="sidebar">
                        <div class="container d-flex align-items-center" id="sidebarcon">
                            <img src="{{ asset('img/icon_sidebar.png') }}" alt="icon_sidebar" id="toggleSidebar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        </div>
                    </div>

                    <!-- Sidebar Offcanvas -->
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <form id="filterForm" action="{{ route('filter') }}" method="GET">

                            <div class="offcanvas-header pb-0">
                                <button type="submit" class="mt-2 d-flex justify-content-center align-items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.6875 7H20.3125M7.29167 12H17.7083M10.4167 17H14.5833" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>FILTER
                                </button>
                                <button type="button" class="btn-close p-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body text-start pt-2">

                                <ul class="list-unstyled" id="perhiasan">
                                    <h5>Perhiasan</h5>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Kalung" name="tipe[]" value="Kalung"
                                            @if(is_array(request()->input('tipe')) && in_array('Kalung', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Kalung">Kalung</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Liontin" name="tipe[]" value="Liontin"
                                            @if(is_array(request()->input('tipe')) && in_array('Liontin', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Liontin">Liontin</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Gelang" name="tipe[]" value="Gelang"
                                            @if(is_array(request()->input('tipe')) && in_array('Gelang', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Gelang">Gelang</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Cincin" name="tipe[]" value="Cincin"
                                            @if(is_array(request()->input('tipe')) && in_array('Cincin', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Cincin">Cincin</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Anting" name="tipe[]" value="Anting"
                                            @if(is_array(request()->input('tipe')) && in_array('Anting', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Anting">Anting</label>
                                    </li>
                                </ul>

                                <ul class="list-unstyled" id="fashion">
                                    <h5>Produk Fashion</h5>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Jam" name="tipe[]" value="Jam Fashion"
                                            @if(is_array(request()->input('tipe')) && in_array('Jam Fashion', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Jam">Jam Fashion</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Gelang_Fashion" name="tipe[]" value="Gelang Fashion"
                                            @if(is_array(request()->input('tipe')) && in_array('Gelang Fashion', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Gelang_Fashion">Gelang Fashion</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Kuku_Palsu" name="tipe[]" value="Kuku Palsu"
                                            @if(is_array(request()->input('tipe')) && in_array('Kuku Palsu', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Kuku_Palsu">Kuku Palsu</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Strap_Phone" name="tipe[]" value="Strap Phone"
                                            @if(is_array(request()->input('tipe')) && in_array('Strap Phone', request()->input('tipe'))) checked @endif>
                                        <label class="form-check-label" for="Strap_Phone">Strap Phone</label>
                                    </li>
                                </ul>

                                <ul class="list-unstyled" id="harga">
                                    <h5>Range Harga</h5>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="harga_bawah_50" name="harga[]" value="<50000"
                                            {{ in_array('<50000', request()->input('harga', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="harga_bawah_50">&lt; 50.000</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="harga_50_100" name="harga[]" value="50000-100000"
                                            {{ in_array('50000-100000', request()->input('harga', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="harga_50_100">50.000 - 100.000</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="harga_100_150" name="harga[]" value="100000-150000"
                                            {{ in_array('100000-150000', request()->input('harga', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="harga_100_150">100.000 - 150.000</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="harga_150_200" name="harga[]" value="150000-200000"
                                            {{ in_array('150000-200000', request()->input('harga', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="harga_150_200">150.000 - 200.000</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" type="checkbox" id="harga_atas_200" name="harga[]" value=">200000"
                                            {{ in_array('>200000', request()->input('harga', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="harga_atas_200">&gt; 200.000</label>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>

                    <div class="col text-center" id="logoMobile">
                        <div class="container">
                            <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="logo_mobile">
                        </div>
                    </div>

                    <div class="col text-end" id="searchMobile">
                        <div class="container d-flex justify-content-end align-items-center" id="searchcon">
                            <img src="{{ asset('img/icon_search.png') }}" alt="icon_search" id="toggleSidebar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                        </div>
                    </div>

                    <!-- Offset searchMobile -->
                    <div class="offcanvas offcanvas-center" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
                        <div class="col-center" id="searchContainerMobile">
                            <div class="search">
                                <form action="{{ route('searchBox') }}" method="GET">
                                    <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari produk pilihanmu" aria-label="Cari">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container text-center" id="navbarMobileBawah">
                    <div class="row">
                        <div class="col" id="menu">
                            <div class="col text-start" id="produk">
                                <a class="navbar-brand m-0" href="{{ route('katalog') }}">Produk</a>
                            </div>
                            <div class="col text-center">
                                <a class="navbar-brand m-0" href="{{ route('about') }}">About</a>
                            </div>
                            <div class="col text-end">
                                <a class="navbar-brand m-0" href="#">Contact</a>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        @yield('script')
        @extends('partial.footer')
    </div>

</body>

</html>