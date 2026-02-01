<?php

include "koneksi.php";

$nama = $_POST['nama_pelanggan'];
$no_hp = $_POST['no_hp'];
$produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

$insert_pelanggan = "INSERT INTO pelanggan (nama_pelanggan, no_hp) VALUES ('$nama', '$no_hp')";
mysqli_query($koneksi, $insert_pelanggan);

$id_pelanggan_baru = mysqli_insert_id($koneksi);

$cek_produk = mysqli_query($koneksi,"SELECT*FROM produk WHERE id_produk = '$produk'");
$data_produk = mysqli_fetch_array($cek_produk);

$harga_satuan = $data_produk['harga_produk'];
$stok_tersedia = $data_produk['stok_produk'];
$total_bayar = $harga_satuan * $jumlah;

if ($stok_tersedia < $jumlah) {
    echo "<script>
    
    alert('Stok Kurang!');
    window.location='index.php';
    
    </script>";

    exit();
}

$stok_sisa = $stok_tersedia - $jumlah;
mysqli_query($koneksi, "UPDATE produk SET stok_produk = '$stok_sisa' WHERE id_produk = '$produk'");

$simpan_transaksi = "INSERT INTO transaksi(id_pelanggan, id_produk, jumlah, total_bayar) 
                    VALUES('$id_pelanggan_baru', '$produk', '$jumlah', '$total_bayar' )";

if (mysqli_query($koneksi, $simpan_transaksi)) {
    $id_transaksi = mysqli_insert_id($koneksi);
    header("location: struk.php?id=$id_transaksi");
} else {
    echo "Gagal melakukan transaksi!";
}

?>