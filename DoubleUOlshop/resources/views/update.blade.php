<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double U Olshop | Admin</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center" id="isiNavbar">
            <div class="d-flex align-items-center" id="logo">
                <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel" class="me-2">
                <a class="navbar-brand" href="#">Juli Jewelry</a>
            </div>

            <div class="col-6">
                <div class="container" id="searchContainer">
                    <div class="search">
                        <form action="{{ route('searchGudang') }}" method="GET">
                            <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari produk dalam stok" aria-label="Cari">
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button id="buttonBaru" type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#productModal">+ Produk Baru</button>

                <svg width="45" height="45" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                    <g clip-path="url(#clip0_270_4)">
                        <path d="M43.3334 37.9167C44.1681 37.9171 44.9705 38.2386 45.5746 38.8146C46.1786 39.3906 46.5379 40.1769 46.5781 41.0105C46.6182 41.8442 46.336 42.6613 45.79 43.2926C45.2441 43.9239 44.4762 44.321 43.6454 44.4015L43.3334 44.4167H8.66675C7.83211 44.4163 7.02963 44.0948 6.42558 43.5188C5.82153 42.9428 5.46222 42.1566 5.42211 41.3229C5.382 40.4892 5.66416 39.6721 6.21013 39.0408C6.75609 38.4095 7.52401 38.0124 8.35475 37.9319L8.66675 37.9167H43.3334ZM43.3334 22.75C44.1954 22.75 45.022 23.0924 45.6315 23.7019C46.241 24.3114 46.5834 25.1381 46.5834 26C46.5834 26.862 46.241 27.6886 45.6315 28.2981C45.022 28.9076 44.1954 29.25 43.3334 29.25H8.66675C7.80479 29.25 6.97814 28.9076 6.36865 28.2981C5.75916 27.6886 5.41675 26.862 5.41675 26C5.41675 25.1381 5.75916 24.3114 6.36865 23.7019C6.97814 23.0924 7.80479 22.75 8.66675 22.75H43.3334ZM43.3334 7.58337C44.1954 7.58337 45.022 7.92578 45.6315 8.53528C46.241 9.14477 46.5834 9.97142 46.5834 10.8334C46.5834 11.6953 46.241 12.522 45.6315 13.1315C45.022 13.741 44.1954 14.0834 43.3334 14.0834H8.66675C7.80479 14.0834 6.97814 13.741 6.36865 13.1315C5.75916 12.522 5.41675 11.6953 5.41675 10.8334C5.41675 9.97142 5.75916 9.14477 6.36865 8.53528C6.97814 7.92578 7.80479 7.58337 8.66675 7.58337H43.3334Z" fill="#606060" />
                    </g>
                    <defs>
                        <clipPath id="clip0_270_4">
                            <rect width="52" height="52" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <!-- Sidebar Offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="container">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" id="buttonLogOut">
                                <svg width="50" height="39" viewBox="0 0 50 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4167 34.125C9.27083 34.125 8.29028 33.807 7.475 33.1711C6.65972 32.5352 6.25139 31.7698 6.25 30.875V8.125C6.25 7.23125 6.65833 6.46642 7.475 5.8305C8.29167 5.19458 9.27222 4.87608 10.4167 4.875H25V8.125H10.4167V30.875H25V34.125H10.4167ZM33.3333 27.625L30.4687 25.2688L35.7812 21.125H18.75V17.875H35.7812L30.4687 13.7312L33.3333 11.375L43.75 19.5L33.3333 27.625Z" fill="white" />
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </nav>


    <section>
        <div style="padding: 0;">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi Pendek</th>
                        <th scope="col">Deskripsi Panjang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($produk) > 0)
                    @foreach($produk as $data)
                    <tr class="clickable-row" data-href="{{ route('produk.edit', $data['id']) }}" style="cursor: pointer;">
                        <td class="checknya">
                            <input class="form-check-input" type="checkbox" id="produk" name="produk" value="produk">
                            <label class="form-check-label" for="produk"></label>
                        </td>
                        <td>
                            @if(isset($data['gambar'][0]))
                            <img src="{{ $data['gambar'][0] }}" class="card-img-top" alt="Gambar Produk" id="gambar-tabel">
                            <p class="id-hidden">{{ $data['id'] }}</p>
                            @else
                            <p>Gambar tidak tersedia</p>
                            @endif
                        </td>
                        <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['kategori'] }}</td>
                        <td class="harga">Rp. {{ $data['harga'] }}</td>
                        <td>{{ Str::limit($data['deskripsi_pendek'], 30) }}</td>
                        <td>{{ Str::limit($data['deskripsi_panjang'], 30) }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#editModal" data-gambar='@json($data["gambar"])' data-nama="{{ $data['nama'] }}" data-id="{{ $data['id'] }}" data-kategori="{{ $data['kategori'] }}" data-harga="{{ $data['harga'] }}" data-deskripsi_pendek="{{ $data['deskripsi_pendek'] }}" data-deskripsi_panjang="{{ $data['deskripsi_panjang'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                </svg>
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapustModal" data-nama="{{ $data['nama'] }}" data-id="{{ $data['id'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">Data Tidak Ditemukan</td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </section>

    <!-- Modal Pop Up Tambah Produk -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Kalung" value="Kalung">
                                <label class="form-check-label" for="Kalung">Kalung</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Gelang" value="Gelang">
                                <label class="form-check-label" for="Gelang">Gelang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Anting" value="Anting">
                                <label class="form-check-label" for="Anting">Anting</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Liontin" value="Liontin">
                                <label class="form-check-label" for="Liontin">Liontin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Cincin" value="Cincin">
                                <label class="form-check-label" for="Cincin">Cincin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Jam_Fashion" value="Jam Fashion">
                                <label class="form-check-label" for="Jam_Fashion">Jam Fashion</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Gelang_Fashion" value="Gelang Fashion">
                                <label class="form-check-label" for="Gelang_Fashion">Gelang Fashion</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Kuku_Palsu" value="Kuku Palsu">
                                <label class="form-check-label" for="Kuku_Palsu">Kuku Palsu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="Strap_Phone" value="Strap Phone">
                                <label class="form-check-label" for="Strap_Phone">Strap Phone</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_pendek" class="form-label">Deskripsi Pendek</label>
                            <textarea class="form-control" id="deskripsi_pendek" name="deskripsi_pendek"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_panjang" class="form-label">Deskripsi Panjang</label>
                            <textarea class="form-control" id="deskripsi_panjang" name="deskripsi_panjang"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (max 10)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]" multiple accept="image/*" onchange="previewImages()">
                            <small class="form-text text-muted">Pilih hingga 10 gambar.</small>
                        </div>
                        <div class="mb-3" id="imagePreviewContainer"></div>
                        <button type="button" class="btn btn-secondary" id="addMoreImagesButton" style="display: none;" onclick="addMoreImages()">Tambah Gambar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmAddButton">Tambahkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editNama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editKalung" value="Kalung">
                                <label class="form-check-label" for="editKalung">Kalung</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editGelang" value="Gelang">
                                <label class="form-check-label" for="editGelang">Gelang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editAnting" value="Anting">
                                <label class="form-check-label" for="editAnting">Anting</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editLiontin" value="Liontin">
                                <label class="form-check-label" for="editLiontin">Liontin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editCincin" value="Cincin">
                                <label class="form-check-label" for="editCincin">Cincin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editJam_Fashion" value="Jam Fashion">
                                <label class="form-check-label" for="editJam_Fashion">Jam Fashion</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editGelang_Fashion" value="Gelang Fashion">
                                <label class="form-check-label" for="editGelang_Fashion">Gelang Fashion</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editKuku_Palsu" value="Kuku Palsu">
                                <label class="form-check-label" for="editKuku_Palsu">Kuku Palsu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="editStrap_Phone" value="Strap Phone">
                                <label class="form-check-label" for="editStrap_Phone">Strap Phone</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editHarga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="editHarga" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="editDeskripsiPendek" class="form-label">Deskripsi Pendek</label>
                            <textarea class="form-control" id="editDeskripsiPendek" name="deskripsi_pendek" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editDeskripsiPanjang" class="form-label">Deskripsi Panjang</label>
                            <textarea class="form-control" id="editDeskripsiPanjang" name="deskripsi_panjang" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (max 10)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]" multiple accept="image/*" onchange="previewImages()">
                            <small class="form-text text-muted">Pilih hingga 10 gambar.</small>
                        </div>
                        <div class="mb-3 img-thumbnail rounded mx-auto d-block" id="editImagePreviewContainer"></div>
                        <button type="button" class="btn btn-secondary" id="addMoreImagesButton" style="display: none;" onclick="addMoreImages()">Tambah Gambar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button id="buttonPerbarui" type="button" class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Hapus -->
    <div class="modal fade" id="hapustModal" tabindex="-1" aria-labelledby="hapustModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="confirmHapus">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapustModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus <b id="produkNama"></b> dari database?</p>
                    <!-- Formulir Hapus di Dalam Modal -->
                    @if(count($produk) > 0)
                    <form id="hapusForm" action="{{ route('produk.deleteOne', $data['id']) }}" method="GET" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmDeleteButton">Hapus</button>
                </div>
                @else
                <p>Gagal Menghapus</p>
                @endif
            </div>
        </div>
    </div>
    </div>

    <script>
        // Modal Tambah Produk
        document.getElementById('confirmAddButton').addEventListener('click', function() {
            // Mendapatkan nilai dari setiap field
            var nama = document.getElementById('nama').value.trim();
            var kategori = document.querySelector('input[name="kategori"]:checked');
            var harga = document.getElementById('harga').value.trim();
            var deskripsiPendek = document.getElementById('deskripsi_pendek').value.trim();
            var deskripsiPanjang = document.getElementById('deskripsi_panjang').value.trim();
            var gambarInput = document.getElementById('gambar');
            var gambarFiles = gambarInput.files;
            var valid = true;

            // Validasi field
            if (!nama || !kategori || !harga || !deskripsiPendek || !deskripsiPanjang || gambarFiles.length === 0) {
                alert('Semua field harus diisi dan gambar harus dipilih.');
                valid = false; // Hentikan pengiriman form jika validasi gagal
            }

            // Validasi ukuran file (MUNGKIN AKAN DIKECILKAN - Controller Juga)
            for (var i = 0; i < gambarFiles.length; i++) {
                if (gambarFiles[i].size > 10 * 1024 * 1024) { // 10 MB
                    alert('Ukuran file ' + gambarFiles[i].name + ' melebihi batas 10 MB.');
                    valid = false; // Hentikan pengiriman form jika ukuran file melebihi batas
                }
            }

            // Konfirmasi sebelum mengirim form jika semua validasi lolos
            if (valid && confirm('Apakah Anda yakin ingin menambahkan produk ini?')) {
                document.getElementById('productForm').submit();
            }
        });

        // Modal Edit
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var nama = button.getAttribute('data-nama');
                var kategori = button.getAttribute('data-kategori');
                var harga = button.getAttribute('data-harga');
                var deskripsiPendek = button.getAttribute('data-deskripsi_pendek');
                var deskripsiPanjang = button.getAttribute('data-deskripsi_panjang');
                var gambar = JSON.parse(button.getAttribute('data-gambar'));

                var modalNama = document.getElementById('editNama');
                var modalKalung = document.getElementById('editKalung');
                var modalGelang = document.getElementById('editGelang');
                var modalAnting = document.getElementById('editAnting');
                var modalLiontin = document.getElementById('editLiontin');
                var modalCincin = document.getElementById('editCincin');
                var modalJam_Fashion = document.getElementById('editJam_Fashion');
                var modalGelang_Fashion = document.getElementById('editGelang_Fashion');
                var modalKuku_Palsu = document.getElementById('editKuku_Palsu');
                var modalStrap_Phone = document.getElementById('editStrap_Phone');
                var modalHarga = document.getElementById('editHarga');
                var modalDeskripsiPendek = document.getElementById('editDeskripsiPendek');
                var modalDeskripsiPanjang = document.getElementById('editDeskripsiPanjang');
                var modalBodyGambarContainer = document.getElementById('editImagePreviewContainer');
                var modalId = document.getElementById('editId');
                var editForm = document.getElementById('editForm');

                modalNama.value = nama;
                modalHarga.value = harga;
                modalDeskripsiPendek.value = deskripsiPendek;
                modalDeskripsiPanjang.value = deskripsiPanjang;
                modalId.value = id;

                // Update action URL
                var updateUrl = '{{ route("produk.editModal", ":id") }}'.replace(':id', id);
                editForm.action = updateUrl;

                if (kategori === 'Kalung') {
                    modalKalung.checked = true;
                } else if (kategori === 'Gelang') {
                    modalGelang.checked = true;
                } else if (kategori === 'Anting') {
                    modalAnting.checked = true;
                } else if (kategori === 'Liontin') {
                    modalLiontin.checked = true;
                } else if (kategori === 'Cincin') {
                    modalCincin.checked = true;
                } else if (kategori === 'Jam Fashion') {
                    modalJam_Fashion.checked = true;
                } else if (kategori === 'Gelang Fashion') {
                    modalGelang_Fashion.checked = true;
                } else if (kategori === 'Kuku Palsu') {
                    modalKuku_Palsu.checked = true;
                } else if (kategori === 'Strap Phone') {
                    modalStrap_Phone.checked = true;
                }


                // Clear existing images in the container
                modalBodyGambarContainer.innerHTML = '';

                // Add images to the container
                gambar.forEach(function(src, index) {
                    var imgElement = document.createElement('img');
                    imgElement.src = src;
                    imgElement.classList.add('img-thumbnail');
                    imgElement.style.margin = '5px';
                    imgElement.alt = 'Gambar ' + (index + 1);
                    modalBodyGambarContainer.appendChild(imgElement);
                });
            });

            document.getElementById('buttonPerbarui').addEventListener('click', function() {
                var valid = true;
                var nama = document.getElementById('editNama').value.trim();
                var kategori = document.querySelector('input[name="kategori"]:checked');
                var harga = document.getElementById('editHarga').value.trim();
                var deskripsiPendek = document.getElementById('editDeskripsiPendek').value.trim();
                var deskripsiPanjang = document.getElementById('editDeskripsiPanjang').value.trim();
                var gambarInput = document.getElementById('gambar');
                var gambarFiles = gambarInput.files;

                if (!nama || !kategori || !harga || !deskripsiPendek || !deskripsiPanjang) {
                    alert('Semua field harus diisi.');
                    valid = false;
                }

                for (var i = 0; i < gambarFiles.length; i++) {
                    if (gambarFiles[i].size > 10 * 1024 * 1024) { // 10 MB
                        alert('Ukuran file ' + gambarFiles[i].name + ' melebihi batas 10 MB.');
                        valid = false;
                    }
                }

                if (valid && confirm('Apakah Anda yakin ingin memperbarui produk ini?')) {
                    document.getElementById('editForm').submit();
                }
            });
        });





        // Modal Hapus
        document.addEventListener('DOMContentLoaded', function() {
            var hapusModal = document.getElementById('hapustModal');
            hapusModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var nama = button.getAttribute('data-nama');
                var id = button.getAttribute('data-id');

                var modalTitle = hapusModal.querySelector('#produkNama');
                var form = hapusModal.querySelector('#hapusForm');

                // Set nama produk dan action form
                modalTitle.textContent = nama || 'Produk tidak ditemukan';
                form.action = '/delete/' + id; // Pastikan URL sesuai dengan rute
            });

            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                document.getElementById('hapusForm').submit();
            });
        });

        // Agar tiap row bisa di klik
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.clickable-row');
            rows.forEach(row => {
                row.addEventListener('click', function(event) {
                    const target = event.target;
                    // Pastikan klik tidak berasal dari checkbox atau tombol aksi
                    if (!target.closest('.form-check-input') && !target.closest('.btn')) {
                        window.location.href = this.dataset.href;
                    }
                });
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/update.js') }}"></script>
</body>

</html>