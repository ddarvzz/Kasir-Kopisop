-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS coffe_shop;
USE coffe_shop;

-- 2. Tabel: produk
-- Sesuai gambar: nama_produk varchar(100)
CREATE TABLE produk (
    id_produk INT(11) NOT NULL AUTO_INCREMENT,
    nama_produk VARCHAR(100) NULL,
    harga_produk INT(11) NULL,
    stok_produk INT(11) NULL,
    PRIMARY KEY (id_produk)
);

-- 3. Tabel: pelanggan
-- Sesuai gambar: nama_pelanggan varchar(100), no_hp varchar(20)
CREATE TABLE pelanggan (
    id_pelanggan INT(11) NOT NULL AUTO_INCREMENT,
    nama_pelanggan VARCHAR(100) NULL,
    no_hp VARCHAR(20) NULL,
    waktu_daftar DATETIME NULL,
    PRIMARY KEY (id_pelanggan)
);

-- 4. Tabel: transaksi
-- Menghubungkan id_produk (garis biru) dan id_pelanggan (garis hijau)
CREATE TABLE transaksi (
    id_transaksi INT(11) NOT NULL AUTO_INCREMENT,
    id_pelanggan INT(11) NULL,
    id_produk INT(11) NULL,
    jumlah INT(11) NULL,
    total_bayar INT(11) NULL,
    tanggal DATETIME NULL,
    PRIMARY KEY (id_transaksi),
    
    -- Relasi (Foreign Keys) sesuai garis penghubung
    CONSTRAINT fk_transaksi_pelanggan 
        FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
        ON DELETE SET NULL ON UPDATE CASCADE,
        
    CONSTRAINT fk_transaksi_produk 
        FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
        ON DELETE SET NULL ON UPDATE CASCADE
);