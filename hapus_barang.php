<?php
include 'koneksi.php';

$id = $_GET['id'];

// Cek apakah barang ini sudah pernah terjual di transaksi?
// (Opsional: Sebaiknya dicek biar data transaksi tidak rusak)
$cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_produk = '$id'");
if(mysqli_num_rows($cek) > 0){
    // Jika sudah pernah terjual, jangan dihapus sembarangan
    echo "<script>
            alert('Barang ini tidak bisa dihapus karena ada di Riwayat Transaksi! Silakan Edit stoknya jadi 0 atau Nonaktifkan saja.');
            window.location='stok.php';
          </script>";
} else {
    // Jika belum pernah terjual, aman dihapus
    mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id'");
    echo "<script>alert('Barang berhasil dihapus!'); window.location='stok.php';</script>";
}
?>