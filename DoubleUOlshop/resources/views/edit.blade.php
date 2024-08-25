<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <h2>Harga: RP. {{ $produk['harga'] }}</h2>
                <br>
                <p>{!! nl2br(e($produk['deskripsi_pendek'])) !!}</p>
                <p>{!! nl2br(e($produk['deskripsi_panjang'])) !!}</p>
                <br>

                <button id="hapusProduk" type="button" class="btn btn-lg d-flex align-items-center justify-content-center text-decoration-none" data-bs-toggle="modal" data-bs-target="#hapustModal">
                    Hapus Produk
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash-fill ms-2" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3"></path>
                    </svg>
                </button>

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapustModal" tabindex="-1" aria-labelledby="hapustModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="confirmHapus">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapustModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b>{{ $produk['nama'] }}</b> dari database?</p>
                                <!-- Formulir Hapus di Dalam Modal -->
                                <form id="hapusForm" action="{{ route('produk.deleteDetail', ['id' => $produk['id']]) }}" method="GET" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="confirmDeleteButton">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hapusButton = document.getElementById('confirmDeleteButton');
            var hapusForm = document.getElementById('hapusForm');

            hapusButton.addEventListener('click', function() {
                hapusForm.submit();
            });
        });
    </script>
</body>

</html>