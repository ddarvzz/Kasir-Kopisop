<?php

include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Riwayat Transaksi</title>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="index.php" class="nav-brand text-white text-decoration-none p-2">🍵Kopisop</a>
            <div class="navbar-nav ms-auto gap-2">
                <a href="index.php" class="nav-link">Kasir</a>
                <a href="riwayat.php" class="nav-link active">Riwayat Transaksi</a>
                <a href="stok.php" class="nav-link">Stok Barang</a>
                <a href="tambah_stok.php" class="nav-link">Tambah Stok</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white text-center mb-0">
                <h5 class="mb-0">Riwayat Transaksi</h5>
            </div>
            <div class="card-body">

                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total Bayar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    
                    $query ="SELECT * FROM transaksi
                            join pelanggan on transaksi.id_pelanggan = pelanggan.id_pelanggan
                            join produk on transaksi.id_produk = produk.id_produk
                            order by id_transaksi asc";

                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?=$row['id_transaksi']?></td>
                        <td><?=$row['tanggal']?></td>
                        <td><?=$row['nama_pelanggan']?></td>
                        <td><?=$row['nama_produk']?></td>
                        <td><?=$row['jumlah']?></td>
                        <td><?=number_format($row['total_bayar'])?></td>
                        <td>
                            <a href="struk.php?id=<?= $row['id_transaksi']?>" class="btn btn-sm btn-outline-primary" target="_blank">Cetak Ulang</a>
                        </td>
                        
                    </tr>

                        <?php } ?>

                </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>