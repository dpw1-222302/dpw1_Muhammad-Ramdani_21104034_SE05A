<?php
session_start();
include '../../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil data dari inputan user
    $produk_id = $_POST['produk_id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    // mengubah data menggunakan query sql
    $query = "UPDATE produk SET nama = '$nama', harga = '$harga', stok = '$stok' WHERE produk_id = '$produk_id'";
    // jika berhasil maka dialihkan ke halamaan produk
    if ($conn->query($query)) {
        header("Location: ../produk.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
