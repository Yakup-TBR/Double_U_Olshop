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
                <form id="filterForm" action="{{ route('searchFilter') }}" method="GET">
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
                            <input class="form-check-input" type="checkbox" id="Anting" name="tipe[]" value="Anting">
                            <label class="form-check-label" for="Anting">Anting</label>
                        </li>
                    </ul>

                    <ul class="list-unstyled" id="fashion">
                        <h5>Produk Fashion</h5>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Jam" name="tipe[]" value="Jam Fashion">
                            <label class="form-check-label" for="Jam">Jam Fashion</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Gelang_Fashion" name="tipe[]" value="Gelang Fashion">
                            <label class="form-check-label" for="Gelang_Fashion">Gelang Fashion</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Kuku_Palsu" name="tipe[]" value="Kuku Palsu">
                            <label class="form-check-label" for="Kuku_Palsu">Kuku Palsu</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Strap_Phone" name="tipe[]" value="Strap Phone">
                            <label class="form-check-label" for="Strap_Phone">Strap Phone</label>
                        </li>
                    </ul>

                    <!-- <ul class="list-unstyled" id="material">
                        <h5>Material</h5>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Crystal" name="tipe[]" value="Crystal">
                            <label class="form-check-label" for="Crystal">Crystal</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Alloy_Rhodium" name="tipe[]" value="Alloy">
                            <label class="form-check-label" for="Alloy_Rhodium">Alloy Rhodium</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Stainless_Steel" name="tipe[]" value="Stainless Steel">
                            <label class="form-check-label" for="Stainless_Steel">Stainless Steel</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Silver" name="tipe[]" value="Silver">
                            <label class="form-check-label" for="Silver">Silver</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Plastic" name="tipe[]" value="Plastic">
                            <label class="form-check-label" for="Plastic">Plastic</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input" type="checkbox" id="Sintetic" name="tipe[]" value="Sintetic">
                            <label class="form-check-label" for="Sintetic">Sintetic</label>
                        </li>
                    </ul> -->
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
                                    <div class="container text-center" id="harga">
                                        <h6 class="card-text">Harga: Rp. {{ $data['harga'] }}</h6>
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
        // Filter Checkbox
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('#filterForm input[type="checkbox"]');
            const produkCards = document.querySelectorAll('#katalog .card');
            const loadingElement = document.getElementById('loading');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    showLoading();
                    setTimeout(() => {
                        filterProducts();
                        hideLoading();
                    }, 500); // Simulasi delay untuk loading
                });
            });

            function filterProducts() {
                const selectedCategories = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value.toLowerCase());

                let filteredCount = 0;

                produkCards.forEach(card => {
                    const cardCategory = card.dataset.category.toLowerCase();
                    if (selectedCategories.length === 0 || selectedCategories.includes(cardCategory)) {
                        card.style.display = 'block';
                        card.style.order = filteredCount; // Tetapkan urutan sesuai dengan filter
                        filteredCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Atur ulang tata letak grid jika diperlukan
                const katalogContainer = document.getElementById('katalog');
                katalogContainer.style.display = 'none'; // Hilangkan sejenak untuk memastikan render ulang
                katalogContainer.offsetHeight; // Memicu reflow
                katalogContainer.style.display = ''; // Tampilkan kembali
            }

            function showLoading() {
                loadingElement.style.display = 'block';
            }

            function hideLoading() {
                loadingElement.style.display = 'none';
            }

            // Call the filter function initially to ensure the correct state after page load
            filterProducts();
        });



        // ClickAble
        function handleCardClick(element) {
            const url = element.getAttribute('data-href');
            if (url) {
                window.location.href = url;
            }
        }
    </script>
    @endsection
</body>

</html>