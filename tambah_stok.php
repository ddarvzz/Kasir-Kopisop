<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah Stok</title>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a href="index.php" class="nav-brand text-white text-decoration-none p-2">🍵Kopisop</a>
                <div class="navbar-nav ms-auto gap-2">
                    <a href="index.php" class="nav-link">Kasir</a>
                    <a href="riwayat.php" class="nav-link">Riwayat Transaksi</a>
                    <a href="stok.php" class="nav-link">Stok Barang</a>
                    <a href="tambah_stok.php" class="nav-link active">Tambah Stok</a>
                </div>
            </div>
        </nav>

         <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-white text-center">
                        <h5 class="mb-0">Tambah Stok</h5>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="" class="label-form mb-2">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" Required>
                            </div>

                            <div class="mb-4">
                                <label for="" class="label-form mb-2">Harga Produk</label>
                                <input type="number" name="harga_produk" class="form-control" placeholder="Rp" required>
                            </div>

                            <div class="mb-4">
                                <label for="" class="label-form mb-2">Jumlah Stok</label>
                                <input type="number" name="stok_produk" class="form-control" placeholder="eg. 100" required>
                            </div>

                            <div class="d-grid gap-3">
                                <button type="submit" name="simpan" class="btn btn-success btn-lg">Tambah Stok</button>
                                <a href="stok.php" class="text-center text-decoration-none text-dark">Kembali</a>
                            </div>

                        </form>
                        <?php
                        
                            if (isset($_POST['simpan'])) {

                                $nama = $_POST['nama_produk'];
                                $harga = $_POST['harga_produk'];
                                $stok = $_POST['stok_produk'];

                                $query = "INSERT INTO produk(nama_produk, harga_produk, stok_produk)
                                          Values ('$nama', '$harga', '$stok')";

                                if (mysqli_query($koneksi, $query)) {
                                    echo "<script>alert('Barang berhasil di Tambahkan');
                                            window.location ='stok.php'</script>";
                                } else {
                                    echo "<script>alert('Barang Gagal di Tambahkan | '. mysqli_error($koneksi);
                                            window.location ='stok.php'</script>";
                                    };


                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>