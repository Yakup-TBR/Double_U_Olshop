<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | Nama Produk</title>
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
        <div class="row">
            <div class="container col text-end" id="gambar">

                @if(isset($produk['gambar'][0]))
                <img src="{{ $produk['gambar'][0] }}" class="card-img-top" alt="Gambar Produk" style="width: 400px;">
                <p class="id-hidden">{{ $produk['id'] }}</p>
                @else
                <p>Gambar tidak tersedia</p>
                @endif
            </div>

            <div class="container col" id="isi">
                <div class="row">
                    <h1>{{ $produk['nama'] }}
                        <a href="{{ route('search') }}" id="editNama">
                            <svg id="svg-nama" width="35" height="35" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75 35H33.25C33.7141 35 34.1592 35.1844 34.4874 35.5126C34.8156 35.8408 35 36.2859 35 36.75C35 37.2141 34.8156 37.6593 34.4874 37.9874C34.1592 38.3156 33.7141 38.5 33.25 38.5H8.75C8.28587 38.5 7.84075 38.3156 7.51256 37.9874C7.18437 37.6593 7 37.2141 7 36.75C7 36.2859 7.18437 35.8408 7.51256 35.5126C7.84075 35.1844 8.28587 35 8.75 35ZM7 26.25L24.5 8.75L29.75 14L12.25 31.5H7V26.25ZM26.25 7L29.75 3.5L35 8.75L31.4983 12.2518L26.25 7Z" class="svg-path" />
                            </svg>
                        </a>
                    </h1>
                </div>

                <h2>Harga: RP. {{ $produk['harga'] }}</h2>
                <p>{!! nl2br(e($produk['deskripsi_pendek'])) !!}</p>
                <br>
                <p>{!! nl2br(e($produk['deskripsi_panjang'])) !!}</p>

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