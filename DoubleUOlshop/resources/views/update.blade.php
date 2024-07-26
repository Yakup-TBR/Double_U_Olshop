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
        <div class="container text-center" id="navnya">
            <div class="col-start" id="logo">
                <img src="{{ asset('img/logo_juli_jewelry.png') }}" alt="Logo KosTel">
                <a class="navbar-brand" href="#">DOUBLE U OLSHOP</a>
            </div>

            <div class="col-center" id="searchContainer">
                <div class="search">
                    <form action="{{ route('search') }}" method="GET">
                        <input class="form-control" id="searchInput" name="search" type="search" placeholder="Cari produk pilihanmu" aria-label="Cari">
                    </form>
                </div>
            </div>


            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#productModal">+ Produk Baru</button>
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
                    @foreach($produk as $data)
                    <tr>
                        <td class="checknya">
                            <input class="form-check-input" type="checkbox" id="produk" name="produk" value="produk">
                            <label class="form-check-label" for="produk"></label>
                        </td>
                        <td>
                            @if(isset($data['gambar'][0]))
                            <img src="{{ $data['gambar'][0] }}" class="card-img-top" alt="Gambar Produk">
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
                            <a href="{{ route('produk.edit', $data['id']) }}" class="btn btn-secondary mb-1" id="editModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                </svg>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapustModal" data-nama="{{ $data['nama'] }}" data-id="{{ $data['id'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3"></path>
                                </svg>
                            </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal Pop Up Store Data -->
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
                                <input class="form-check-input" type="radio" name="kategori" id="kalung" value="Kalung">
                                <label class="form-check-label" for="kalung">Kalung</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="gelang" value="Gelang">
                                <label class="form-check-label" for="gelang">Gelang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="anting" value="Anting">
                                <label class="form-check-label" for="anting">Anting</label>
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

    <!-- Modal Hapus -->
    <div class="modal fade" id="hapustModal" tabindex="-1" aria-labelledby="hapustModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="confirmHapus">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapustModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus <b id="productName"></b> dari database?</p>
                    <!-- Formulir Hapus di Dalam Modal -->
                    <form id="hapusForm" action="" method="GET" style="display: none;">
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

    <script>
        // Modal Konfirmasi
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

        // Modal Hapus
        document.addEventListener('DOMContentLoaded', function() {
            var hapusModal = document.getElementById('hapustModal');
            hapusModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var nama = button.getAttribute('data-nama');
                var id = button.getAttribute('data-id');

                var modalTitle = hapusModal.querySelector('#productName');
                var form = hapusModal.querySelector('#hapusForm');

                // Set nama produk dan action form
                modalTitle.textContent = nama || 'Produk tidak ditemukan';
                form.action = '/delete/' + id; // Pastikan URL sesuai dengan rute
            });

            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                document.getElementById('hapusForm').submit();
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/update.js') }}"></script>
</body>

</html>