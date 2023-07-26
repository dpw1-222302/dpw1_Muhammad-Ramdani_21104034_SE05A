<?php
session_start();
include '../../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil data user_id dari user yang sedang login
    $userId = $_SESSION['user_id'];
    // mengambil data dari inputan user
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    // memasukan data menggunakan query sql
    $query = "INSERT INTO produk (user_id, nama, harga, stok) VALUES ('$userId', '$nama', '$harga', '$stok')";
    // jika berhasil maka dialihkan ke halamaan produk
    if ($conn->query($query)) {
        header("Location: ../produk.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
