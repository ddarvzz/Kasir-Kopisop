<?php

include "koneksi.php";
$id = $_GET['id'];

$query = "SELECT * FROM transaksi
        JOIN pelanggan on transaksi.id_pelanggan = pelanggan.id_pelanggan
        join produk on transaksi.id_produk = produk.id_produk
        where transaksi.id_transaksi = '$id' ";

$result = mysqli_query($koneksi, $query);
$struk = mysqli_fetch_array($result); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Struk #<?= $id ?> </title>
    <style> 
    
        body {font-family: 'Courier New', Courier, Monospace;}

        .container {width: 300px;
                    margin: 20px auto;
                    border: 1px dashed #333;
                    padding: 20px; }
        
        .text-center {text-align:center;}
        .text-right {text-align: right;}
        .hr{border-top: 1px dashed #333}
        @media print{
            .no-print{display: none !important;}
        }

    </style>
    
</head>
<body onload="window.print()">
    
    <div class="text-center">
        <h3>Kopisop</h3>
        <p>Jalan Kopi Nikmat N0.1</p>
    </div>
    <hr>
    <p>
        No. Nota :<?= $struk['id_transaksi'] ?> <br>
        Tanggal  : <?= date('d/m/Y H:i', strtotime($struk['tanggal'])) ?> <br>
        Pembeli  : <?= $struk['nama_pelanggan']?> 
    </p>
    <hr>
    <table width="100%">
        <tr>
            <td><?= $struk['nama_produk']?></td>
            <td class="text-right">x<?=$struk['jumlah'] ?></td>
        </tr>

        <tr>
            <td>Harga</td>
            <td class="text-right"><?=number_format($struk['harga_produk'],0,',','.')  ?></td>
        </tr>

        <tr>
            <td>Total</td>
            <td class="text-right"><?=number_format($struk['total_bayar'],0,',','.') ?></td>
        </tr>
    </table>
    <hr>
    <div class="text-center">
        <p>TERIMAKASIH!</p>
        <a href="index.php" style="text-decoration: none; font-size: 16px;" class="no-print"> [Kembali ke Kasir] </a>
    </div>
    
</body>
</html>
