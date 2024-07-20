
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

