<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double U Olshop | Produk</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @extends('partial.navbar')
    @section('isi')

    <section>
        <div class="container">
            <div class="row">
                <div class="container col text-end" id="gambar">
                    @if(isset($produk['gambar']) && count($produk['gambar']) > 0)
                    <div id="carouselGambar" class="carousel slide" data-bs-ride="carousel">
                        <!-- Carousel Indicators -->
                        <div class="carousel-indicators">
                            @foreach($produk['gambar'] as $index => $gambar)
                            <button type="button" data-bs-target="#carouselGambar" data-bs-slide-to="{{ $index }}" class="@if($index === 0) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach($produk['gambar'] as $index => $gambar)
                            <div class="carousel-item @if($index === 0) active @endif">
                                <img src="{{ $gambar }}" class="d-block w-100 carousel-image" alt="Gambar Produk">
                            </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGambar" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGambar" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="id-hidden">{{ $produk['id'] }}</p>
                    @else
                    <p>Gambar tidak tersedia</p>
                    @endif
                </div>



                <div class="container col" id="isi">
                    <div class="nama">
                        <h1>{{ $produk['nama'] }}</h1>
                    </div>
                    <h2 id="hargaProduk">RP. {{ $produk['harga'] }}</h2>
                    <br>
                    <p>{!! nl2br(e($produk['deskripsi_pendek'])) !!}</p>
                    <p>{!! nl2br(e($produk['deskripsi_panjang'])) !!}</p>
                    <br>

                    <button class="d-flex justify-content-between align-items-center" id="buttonWA" onclick="window.open('https://wa.me/6285792391162', '_blank');">
                        <div id="textButtonWA">
                            <p class="text-start">Tertarik Beli?</p>
                            <p class="text-start">Chat dengan sellernya</p>
                        </div>
                        <div>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_206_3)">
                                    <path d="M0.853593 19.7606C0.852656 23.1213 1.73766 26.4029 3.42047 29.2953L0.692656 39.1778L10.8852 36.526C13.7043 38.0488 16.8629 38.8467 20.0727 38.8469H20.0811C30.6772 38.8469 39.3027 30.2914 39.3072 19.7756C39.3092 14.68 37.3111 9.88833 33.6808 6.28336C30.0511 2.67871 25.2238 0.692511 20.0803 0.690186C9.48297 0.690186 0.858124 9.24522 0.853749 19.7606" fill="url(#paint0_linear_206_3)" />
                                    <path d="M0.167188 19.7544C0.166094 23.2361 1.08281 26.635 2.82562 29.631L0 39.8678L10.558 37.1209C13.467 38.6947 16.7423 39.5245 20.0752 39.5257H20.0837C31.06 39.5257 39.9953 30.6625 40 19.7702C40.0019 14.4915 37.9319 9.5276 34.1719 5.79349C30.4114 2.05984 25.4114 0.00217054 20.0837 0C9.10562 0 0.171563 8.86202 0.167188 19.7544ZM6.45484 29.115L6.06062 28.4941C4.40344 25.8795 3.52875 22.8581 3.53 19.7557C3.53344 10.7022 10.9591 3.33643 20.09 3.33643C24.5119 3.33829 28.6675 5.04868 31.7931 8.15194C34.9186 11.2555 36.6384 15.3811 36.6373 19.769C36.6333 28.8225 29.2075 36.1891 20.0837 36.1891H20.0772C17.1064 36.1876 14.1928 35.396 11.6519 33.9L11.0472 33.5442L4.78188 35.1741L6.45484 29.115Z" fill="url(#paint1_linear_206_3)" />
                                    <path d="M15.1059 11.4958C14.7331 10.6736 14.3408 10.657 13.9863 10.6426C13.6959 10.6302 13.3641 10.6311 13.0325 10.6311C12.7006 10.6311 12.1614 10.755 11.7056 11.2488C11.2494 11.7431 9.96375 12.9375 9.96375 15.3668C9.96375 17.7962 11.747 20.144 11.9956 20.4738C12.2445 20.8029 15.4383 25.9477 20.4964 27.9269C24.7002 29.5717 25.5556 29.2446 26.468 29.1621C27.3805 29.08 29.4123 27.968 29.8269 26.815C30.2417 25.6621 30.2417 24.6739 30.1173 24.4674C29.993 24.2617 29.6611 24.1381 29.1634 23.8913C28.6656 23.6443 26.2191 22.4497 25.763 22.2849C25.3067 22.1203 24.975 22.0381 24.6431 22.5325C24.3113 23.0262 23.3583 24.1381 23.0678 24.4674C22.7777 24.7975 22.4872 24.8386 21.9897 24.5916C21.4917 24.3438 19.8891 23.8231 17.9877 22.141C16.5083 20.8322 15.5095 19.2159 15.2192 18.7215C14.9289 18.2279 15.1881 17.9603 15.4377 17.7142C15.6613 17.493 15.9355 17.1376 16.1845 16.8494C16.4327 16.561 16.5155 16.3553 16.6814 16.026C16.8475 15.6964 16.7644 15.408 16.6402 15.161C16.5155 14.9141 15.5484 12.472 15.1059 11.4958Z" fill="white" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_206_3" x1="1931.42" y1="3849.45" x2="1931.42" y2="0.690186" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#1FAF38" />
                                        <stop offset="1" stop-color="#60D669" />
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_206_3" x1="2000" y1="3986.78" x2="2000" y2="0" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F9F9F9" />
                                        <stop offset="1" stop-color="white" />
                                    </linearGradient>
                                    <clipPath id="clip0_206_3">
                                        <rect width="40" height="40" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                    </button>

                </div>
            </div>

        </div>
    </section>

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/detail.js') }}"> </script>


</body>

</html>