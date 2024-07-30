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
    @extends('partial.navbar')
    @section('isi')
    <section>

        <div class="row">
            <div class="container col border-end" id="filter">
                <form action="{{ route('searchBox') }}" method="GET">
                    <ul class="list-unstyled" id="perhiasan">
                        <h5>Perhiasan</h5>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Kalung" name="tipe[]" value="Kalung">
                            <label class="form-check-label" for="Kalung">Kalung</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Liontin" name="tipe[]" value="Liontin">
                            <label class="form-check-label" for="Liontin">Liontin</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Gelang" name="tipe[]" value="Gelang">
                            <label class="form-check-label" for="Gelang">Gelang</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Cincin" name="tipe[]" value="Cincin">
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
                            <input class="form-check-input" type="checkbox" id="Jam" name="tipe[]" value="Jam">
                            <label class="form-check-label" for="Jam">Jam Fashion</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Gelang_Fashion" name="tipe[]" value="Gelang_Fashion">
                            <label class="form-check-label" for="Gelang_Fashion">Gelang Fashion</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Kuku_Palsu" name="tipe[]" value="Kuku_Palsu">
                            <label class="form-check-label" for="Kuku_Palsu">Kuku Palsu</label>
                        </li>
                    </ul>

                    <ul class="list-unstyled" id="material">
                        <h5>Produk Fashion</h5>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Alloy" name="tipe[]" value="Alloy">
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
                </form>

                <ul class="list-unstyled" id="harga"> <!--Filter Harga-->
                    <h5>Kisaran Harga</h5>
                    <div class="price-input row">
                        <div class="field" id="min">
                            <span>Min</span>
                            Rp.<input type="number" class="input-min" value="0">
                        </div>
                        <div class="separator">-</div>
                        <div class="field" id="max">
                            <span>Max</span>
                            Rp.<input type="number" class="input-max" value="150000">
                        </div>
                        <div class="slider">
                            <div class="progress" style="display: none;"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="150000" value="0" step="100">
                            <input type="range" class="range-max" min="0" max="150000" value="150000" step="100">
                        </div>
                    </div>
                </ul>
            </div>

            <div class="container col" id="katalog">
                <div class="row row-cols-md-5 g-1">
                    @if(count($produk) > 0)
                    @foreach($produk as $data)
                    <form action="{{ route('katalog') }}" method="get">
                        <div class="card" style="width: 95%; height: 96%">
                            @if(isset($data['gambar'][0]))
                            <img src="{{ $data['gambar'][0] }}" class="card-img-top">
                            @else
                            <p>Gambar tidak tersedia</p>
                            @endif
                            <div class="card-body p-1 pb-0">
                                <h5 class="card-title text-center" onclick="handleCardClick(this)">{{ $data['nama'] }}</h5>
                                <h6 class="card-text1 text-center" onclick="handleCardClick(this)">Harga : Rp. {{ $data['harga'] }}</h6>
                                <p class="card-text2" onclick="handleCardClick(this)">{!! nl2br(e($data['deskripsi_pendek'])) !!}</p>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @else
                    <tr>
                        <p>Data Tidak Ditemukan</p>
                    </tr>
                    @endif
                </div>

            </div>
        </div>

    </section>

    <script src="{{ asset('js/index.js') }}"></script>
    @endsection
</body>

</html>