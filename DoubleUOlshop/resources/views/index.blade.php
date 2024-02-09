<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double U Olshop | Katalog</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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

                <div class="col-end" id="menu">
                    <a class="navbar-brand" href="#">Produk</a>
                    <a class="navbar-brand" href="#">About</a>
                    <a class="navbar-brand" href="#">Contact</a>
                </div>

        </div>
    </navbar>
    <section>

        <div class="row">
            <div class="container col border-end" id="filter">
                
                <ul class="list-unstyled" id="perhiasan">
                    <h5>Perhiasan</h5>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Kalung" name="Kalung" value="Kalung">
                        <label class="form-check-label" for="Kalung">Kalung</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Liontin" name="Liontin" value="Liontin">
                        <label class="form-check-label" for="Liontin">Liontin</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Gelang" name="Gelang" value="Gelang">
                        <label class="form-check-label" for="Gelang">Gelang</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Cincin" name="Cincin" value="Cincin">
                        <label class="form-check-label" for="Cincin">Cincin</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Anting" name="Anting" value="Anting">
                        <label class="form-check-label" for="Anting">Anting</label>
                    </li>
                </ul>

                <ul class="list-unstyled" id="fashion">
                    <h5>Produk Fashion</h5>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Jam" name="Jam" value="Jam">
                        <label class="form-check-label" for="Jam">Jam Fashion</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Gelang_Fashion" name="Gelang_Fashion" value="Gelang_Fashion">
                        <label class="form-check-label" for="Gelang_Fashion">Gelang Fashion</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Kuku_Palsu" name="Kuku_Palsu" value="Kuku_Palsu">
                        <label class="form-check-label" for="Kuku_Palsu">Kuku Palsu</label>
                    </li>
                </ul>

                <ul class="list-unstyled" id="material">
                    <h5>Produk Fashion</h5>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Alloy" name="Alloy" value="Alloy">
                        <label class="form-check-label" for="Alloy">Alloy</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Alloy_Rhodium" name="Alloy_Rhodium" value="Alloy_Rhodium">
                        <label class="form-check-label" for="Alloy_Rhodium">Alloy Rhodium</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Stainless_Steal" name="Stainless_Steal" value="Stainless_Steal">
                        <label class="form-check-label" for="Stainless_Steal">Stainless Steal</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Silver" name="Silver" value="Silver">
                        <label class="form-check-label" for="Silver">Silver</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Plastic" name="Plastic" value="Plastic">
                        <label class="form-check-label" for="Plastic">Plastic</label>
                    </li>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="Sintetic" name="Sintetic" value="Sintetic">
                        <label class="form-check-label" for="Sintetic">Sintetic</label>
                    </li>
                </ul>

                <ul class="list-unstyled" id="harga">
                    <h5>Kisaran Harga</h5>
                    <div class="price-input row">
                        <div class="field" id="min">
                            <span>Min</span>
                            <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="separator">-</div>
                        <div class="field" id="max">
                            <span>Max</span>
                            <input type="number" class="input-max" value="7500">
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                            <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                        </div>
                    </div>
                </ul>
            </div>

            <div class="container col" id="katalog">
                <div class="row row-cols-md-5 g-1">
                    @foreach($produk as $data)  
                    <form action="/updateData/{{ $data->id }}" method="get">
                        <div class="card" style="width: 14rem;">
                            <img src="{{ asset('uploads/' . $data->gambar_1) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-center" data-href="{{ route('katalog', ['id' => $data->id]) }}" onclick="handleCardClick(this)">{{ $data->name}}</h5>
                                <h6 class="card-text1 text-center" data-harga="{{ $data->harga }}" data-href="{{ route('katalog', ['id' => $data->id]) }}" onclick="handleCardClick(this)">Harga : Rp. {{ $data->harga }}</h6>
                                <p id="jarak-{{ $data->id }}" class="card-text2" data-href="{{ route('katalog', ['id' => $data->id]) }}" onclick="handleCardClick(this)">{{ $data->deskripsi_pendek}}</p>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                
            </div>
        </div>
        
    </section>
    <footer>
        <div class="container">

            <div class="row">

                <div class="col" id="logo">
                    <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel">
                    <a class="navbar-brand" href="#">DOUBLE U OLSHOP</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>

                <div class="col" id="follow">
                    <h5>Follow Us</h5>
                        <div class="row"  id="social">
                            <div class="col">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="#" id="instagram">
                                            <i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
                                            juli_jewelry
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#" id="tokopedia">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 27 27" fill="none">
                                                <path d="M15.2117 7.27988C13.2823 5.65032 5.73356 6.01594 5.73356 6.01594L5.4675 24.3816C5.4675 24.3816 15.5109 24.4569 18.6036 24.3816C21.6962 24.3062 23.8579 21.8458 23.8911 19.9502C23.9242 18.0546 23.8911 6.34894 23.8911 6.34894C20.0334 5.88263 17.1737 6.24882 15.2117 7.27988Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.9862 17.5208C13.1534 17.5208 14.9102 15.7639 14.9102 13.5968C14.9102 11.4296 13.1534 9.67276 10.9862 9.67276C8.81903 9.67276 7.06219 11.4296 7.06219 13.5968C7.06219 15.7639 8.81903 17.5208 10.9862 17.5208Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M18.0242 16.4981C18.8112 16.8553 19.702 16.9111 20.5275 16.6549C21.3529 16.3988 22.0557 15.8486 22.5023 15.1087C22.949 14.3688 23.1085 13.4907 22.9506 12.6409C22.7928 11.7912 22.3284 11.029 21.6458 10.4989C20.9632 9.96879 20.1097 9.70773 19.2473 9.76522C18.385 9.82271 17.5737 10.1948 16.9675 10.8108C16.3612 11.4268 16.0022 12.2439 15.9585 13.1071C15.9148 13.9702 16.1895 14.8194 16.7304 15.4935M5.73356 6.01593L3.20569 7.84519L3.09375 22.1451L5.4675 24.3821M18.9534 6.24094C18.7834 5.2334 18.2668 4.31689 17.4929 3.64966C16.7191 2.98243 15.7365 2.60638 14.7149 2.58644C13.6934 2.5665 12.6969 2.90392 11.8976 3.54044C11.0983 4.17696 10.5463 5.07262 10.3371 6.07275" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11.5447 11.2539C11.6493 11.5624 11.6401 11.8981 11.5186 12.2003C11.3972 12.5025 11.1716 12.7512 10.8826 12.9015C10.5937 13.0518 10.2605 13.0937 9.94334 13.0196C9.62619 12.9455 9.34603 12.7604 9.15355 12.4976C8.90328 12.9535 8.80624 13.4778 8.87677 13.9931C8.9473 14.5084 9.18167 14.9873 9.54525 15.3592C9.90883 15.731 10.3824 15.9761 10.8959 16.0583C11.4095 16.1404 11.9358 16.0552 12.3972 15.8152C12.8587 15.5753 13.2307 15.1933 13.4584 14.7258C13.6861 14.2582 13.7574 13.7298 13.6618 13.2186C13.5662 12.7074 13.3087 12.2404 12.9274 11.8868C12.5461 11.5331 12.0611 11.3114 11.5442 11.2545M19.3477 11.0599C19.4808 11.3471 19.5068 11.6724 19.4211 11.9771C19.3354 12.2819 19.1437 12.5459 18.8805 12.7217C18.6172 12.8976 18.2998 12.9735 17.9855 12.9359C17.6712 12.8983 17.3807 12.7497 17.1664 12.5168C16.9728 12.9843 16.9348 13.5017 17.0578 13.9925C17.1808 14.4834 17.4584 14.9216 17.8496 15.2427C18.2407 15.5637 18.7247 15.7504 19.2302 15.7753C19.7356 15.8002 20.2356 15.6619 20.6564 15.3808C21.0772 15.0998 21.3965 14.6909 21.5671 14.2145C21.7377 13.7381 21.7507 13.2195 21.604 12.7352C21.4573 12.2509 21.1588 11.8266 20.7525 11.5249C20.3463 11.2233 19.8538 11.0602 19.3477 11.0599ZM13.7031 17.6726C13.7031 16.0881 14.8455 15.444 16.3586 15.444C17.7058 15.444 18.4708 17.2733 18.4708 17.2733C17.1468 17.8368 15.7188 18.1145 14.2802 18.0883C15.1095 18.8578 16.1535 19.3565 17.2732 19.5182C17.2732 19.5182 16.8081 19.8669 15.2117 19.8669C13.9146 19.8675 13.7031 18.4877 13.7031 17.6726Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.0533 17.7576C17.0875 18.3256 17.0386 18.8956 16.9082 19.4496" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            juli_jewelry
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="#" id="shopee">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" >
                                                <path d="M15.941 17.963C16.171 16.084 14.961 14.886 11.766 13.866C10.218 13.338 9.489 12.646 9.506 11.695C9.571 10.639 10.554 9.87 11.858 9.845C12.885 9.8555 13.8868 10.1648 14.741 10.735C14.857 10.807 14.938 10.795 15.004 10.695C15.094 10.551 15.319 10.202 15.394 10.075C15.445 9.995 15.455 9.889 15.326 9.795C15.141 9.658 14.622 9.38 14.343 9.263C13.5487 8.92593 12.6949 8.75117 11.832 8.749C9.922 8.757 8.419 9.964 8.292 11.575C8.211 12.738 8.787 13.682 10.022 14.402C10.285 14.554 11.702 15.118 12.266 15.294C14.04 15.846 14.961 16.836 14.744 17.991C14.547 19.038 13.445 19.715 11.926 19.735C10.723 19.689 9.639 19.198 8.799 18.545L8.658 18.435C8.554 18.355 8.44 18.36 8.371 18.465C8.321 18.542 7.995 19.012 7.913 19.135C7.836 19.243 7.878 19.303 7.958 19.369C8.308 19.662 8.775 19.982 9.092 20.144C9.97018 20.5911 10.9361 20.8393 11.921 20.871C12.6301 20.9046 13.3381 20.7838 13.996 20.517C15.091 20.052 15.799 19.123 15.941 17.963ZM12 1.401C9.932 1.401 8.246 3.351 8.167 5.791H15.832C15.751 3.35 14.066 1.4 12 1.4M19.851 23.998L19.771 23.999L3.987 23.997C2.913 23.957 2.124 23.087 2.016 22.006L2.006 21.811L1.299 6.285C1.29422 6.2226 1.30225 6.15987 1.3226 6.10069C1.34295 6.0415 1.37519 5.98711 1.41734 5.94084C1.45949 5.89457 1.51065 5.85741 1.56769 5.83164C1.62472 5.80588 1.68642 5.79204 1.749 5.791H6.724C6.845 2.568 9.16 0 12 0C14.838 0 17.153 2.569 17.275 5.79H22.243C22.3053 5.79005 22.3669 5.80277 22.4241 5.82738C22.4813 5.852 22.5329 5.88799 22.5757 5.93317C22.6185 5.97835 22.6517 6.03178 22.6733 6.0902C22.6948 6.14863 22.7043 6.21082 22.701 6.273L21.928 21.861L21.921 21.992C21.827 23.086 20.942 23.969 19.851 23.998Z" fill="black"/>
                                            </svg>
                                            juli_jewelry
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#" id="tiktok">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M16.6 5.82C15.9164 5.03962 15.5397 4.03743 15.54 3H12.45V15.4C12.4262 16.071 12.1429 16.7066 11.6598 17.1729C11.1767 17.6393 10.5315 17.8999 9.86 17.9C8.44 17.9 7.26 16.74 7.26 15.3C7.26 13.58 8.92 12.29 10.63 12.82V9.66C7.18 9.2 4.16 11.88 4.16 15.3C4.16 18.63 6.92 21 9.85 21C12.99 21 15.54 18.45 15.54 15.3V9.01C16.793 9.90985 18.2974 10.3926 19.84 10.39V7.3C19.84 7.3 17.96 7.39 16.6 5.82Z" fill="black"/>
                                            </svg>
                                            juli_jewelry
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>

                <div class="col" id="about">
                    <h5>About</h5>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>