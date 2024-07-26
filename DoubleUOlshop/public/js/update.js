
// Fungsi untuk mengonversi integer menjadi format mata uang Rupiah
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + ribuan;
}

// Menggunakan jQuery untuk mengonversi setiap elemen dengan class 'harga' ke format Rupiah saat dokumen telah dimuat
$(document).ready(function () {
    $('.harga').each(function () {
        var harga = parseInt($(this).text());
        $(this).text(formatRupiah(harga));
    });
});


// Fungsi tambah gambar
function previewImages() {
    var previewContainer = document.getElementById('imagePreviewContainer');
    var addMoreImagesButton = document.getElementById('addMoreImagesButton');
    previewContainer.innerHTML = '';
    var files = document.getElementById('gambar').files;

    if (files.length > 10) {
        alert('Anda hanya dapat memilih hingga 5 gambar.');
        document.getElementById('gambar').value = ''; // Clear the input
        return;
    }

    // Menampilkan tombol "Tambah Gambar" jika ada minimal satu gambar
    if (files.length > 0) {
        addMoreImagesButton.style.display = 'inline-block';
    } else {
        addMoreImagesButton.style.display = 'none';
    }

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-thumbnail';
            img.style.margin = '5px';
            img.style.maxWidth = '100px';
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    }
}

function addMoreImages() {
    document.getElementById('gambar').click();
}




// Tombol Konfirmasi Ingin menambahkan produk di modal


