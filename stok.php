<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Stok Barang</title>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="index.php" class="nav-brand text-white text-decoration-none p-2">🍵Kopisop</a>
            <div class="navbar-nav ms-auto gap-2">
                <a href="index.php" class="nav-link">Kasir</a>
                <a href="riwayat.php" class="nav-link">Riwayat Transaksi</a>
                <a href="stok.php" class="nav-link active">Stok Barang</a>
                <a href="tambah_stok.php" class="nav-link">Tambah Stok</a>

            </div>
        </div>
    </nav>

    <div class="container">
    <div class="card shadow-sm">

        <div class="card-header bg-warning text-dark d-flex justify-content-between align-item-center">
            <h5 class="mb-0">Stok Barang</h5>
            <a href="tambah_stok.php" class="btn btn-sm btn-dark">Tambah barang</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">

                <thead class= table-dark>

                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Sisa Stok</th>
                    <th>Status</th>
                    <th>Action</th>

                </thead>

                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT*FROM produk");
                    while ($row = mysqli_fetch_array($query)) {
                        $status = ($row['stok_produk'] > 5)  ? '<span class="badge bg-success">Aman</span>' : '<span class="badge bg-danger">Hampir Habis</span>';

                        ?>
                        <tr>

                            <td><?= $row['nama_produk']?></td>
                            <td><?= number_format($row['harga_produk'],0,',','.') ?></td>
                            <td><?= number_format($row['stok_produk'],0,',','.') ?></td>
                            <td><?= $status?></td>
                            <td>
                                <a href="edit_barang.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="hapus_barang.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus barang ini?');">Hapus</a></td>
                            
                        </tr>
                        
                    <?php } ?>
                
                </tbody>
            </table>
        </div>

    </div>
    </div>

</body>
</html>