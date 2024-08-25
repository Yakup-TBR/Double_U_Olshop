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

        <div class="row" id="perbaikiRow">
            <div class="container col border-end" id="filter">
                <form id="filterForm" action="{{ route('filter') }}" method="GET">
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mt-4 d-flex justify-content-center align-items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.6875 7H20.3125M7.29167 12H17.7083M10.4167 17H14.5833" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>FILTER
                        </button>
                    </div>
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
                </form>
            </div>

            <div class="container col" id="katalog">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-1" id="perbaiki">
                    <div id="loading" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    @if(count($produk) > 0)
                    @foreach($produk as $data)
                    <form action="{{ route('katalog') }}" method="get">
                        <div class="col">
                            <div class="card m-2 pb-2" id="produkCard" data-category="{{ strtolower($data['kategori']) }}" data-deksripsi_pendek="{{ strtolower($data['deskripsi_pendek']) }}" data-href="{{ route('detail', $data['id']) }}" onclick="handleCardClick(this)" style="cursor: pointer;">
                                @if(isset($data['gambar'][0]))
                                <img src="{{ $data['gambar'][0] }}" class="card-img-top" alt="Gambar Produk">
                                @else
                                <p>Gambar tidak tersedia</p>
                                @endif
                                <div class="card-body" id="isiCard">
                                    <div class="container text-center" id="nama">
                                        <h5 class="card-title">{{ Str::limit($data['nama'], 43) }}</h5>
                                    </div>
                                    <div class="container text-center harga-container" id="hargaCard">
                                        <h6 class="card-text">Harga: Rp.{{ $data['harga'] }}</h6>
                                    </div>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        window.addEventListener('scroll', function() {
            const footer = document.getElementById('footer');
            const floatingDiv = document.getElementById('filter');
            const footerRect = footer.getBoundingClientRect();
            const viewportHeight = window.innerHeight;

            // Cek jika footer mulai masuk viewport
            if (footerRect.top <= viewportHeight) {
                // Pindahkan div fixed mengikuti posisi footer
                floatingDiv.style.position = 'absolute';
                floatingDiv.style.top = `${window.scrollY + viewportHeight - footerRect.height}px`;
            } else {
                // Kembalikan div ke posisi fixed jika footer tidak di viewport
                floatingDiv.style.position = 'fixed';
                floatingDiv.style.top = '0';
            }
        });
    </script>
    @endsection
</body>

</html>