<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Kasir Kopi</title>
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="index.php" class="nav-brand text-white text-decoration-none p-2">🍵Kopisop</a>
            <div class="navbar-nav ms-auto gap-2">
                <a href="index.php" class="nav-link active">Kasir</a>
                <a href="riwayat.php" class="nav-link">Riwayat Transaksi</a>
                <a href="stok.php" class="nav-link">Stok Barang</a>
                <a href="tambah_stok.php" class="nav-link">Tambah Stok</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Input pesanan</h5>
                    </div>

                    <div class="card-body">
                        <form action="proses_transaksi.php" method="POST">

                            <div class="mb-3">
                                <label for="" class="label-form mb-2">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan" Required>
                            </div>

                            <div class="mb-4">
                                <label for="" class="label-form mb-2">Nomor Telp (Optional)</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="085****">
                            </div>

                            <hr>

                            <div class="mb-3">

                                <label for="" class="label-form mb-2">Pilih Menu</label>
                                <select name="id_produk" class="form-select" id="">
                                <option value="">---Pilih Menu---</option>
                                <?php
                                
                                    $sql = mysqli_query($koneksi, "SELECT*FROM produk WHERE stok_produk > 0");
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $harga = number_format($data['harga_produk'],0, ',', '.');
                                        echo "<option value='$data[id_produk]'> $data[nama_produk] - Rp $harga (Sisa: $data[stok_produk]) </option>";
                                    }

                                ?>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="" class="label-form mb-2">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">Bayar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>