<?php 
include 'koneksi.php'; 

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data lama dari database untuk ditampilkan di form
$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");
$data = mysqli_fetch_array($ambil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Produk: <?= $data['nama_produk'] ?></h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="<?= $data['harga_produk'] ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="<?= $data['stok_produk'] ?>" required>
                        </div>
                        
                        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
                        <a href="stok.php" class="btn btn-secondary">Batal</a>
                    </form>

                    <?php
                    // 3. Proses Update Data
                    if(isset($_POST['update'])){
                        $nama_baru  = $_POST['nama'];
                        $harga_baru = $_POST['harga'];
                        $stok_baru  = $_POST['stok'];

                        // Query Update
                        $query_update = "UPDATE produk SET 
                                         nama_produk = '$nama_baru', 
                                         harga_produk = '$harga_baru', 
                                         stok_produk = '$stok_baru' 
                                         WHERE id_produk = '$id'";
                        
                        if(mysqli_query($conn, $query_update)){
                            echo "<script>alert('Data berhasil diupdate!'); window.location='stok.php';</script>";
                        } else {
                            echo "Gagal: " . mysqli_error($conn);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>