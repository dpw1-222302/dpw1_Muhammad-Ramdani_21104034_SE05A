<?php
session_start();
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $produk_id = $_POST['produk_id'];
    $quantity = $_POST['quantity'];
    $tanggal = $_POST['tanggal'];
    $stokawal = $_POST['stok'];
    $hasil = $stokawal - $quantity;
    $stok = $hasil;
    // Memasukkan data menggunakan multi_query
    $queryTransaksi = "INSERT INTO transaksi (user_id, produk_id, quantity, tanggal) VALUES ('$userId', '$produk_id', '$quantity', '$tanggal')";
    $queryUpdateProduk = "UPDATE produk SET stok = '$stok' WHERE produk_id = '$produk_id'";

    // Menggabungkan query ke dalam satu string
    $multiQuery = $queryTransaksi . ";" . $queryUpdateProduk;

    // Menjalankan multi_query
    if ($conn->multi_query($multiQuery)) {
        do {
            // Ambil hasil dari setiap query yang dieksekusi
            if ($result = $conn->store_result()) {
                $result->free(); // Bebaskan hasil
            }
        } while ($conn->more_results() && $conn->next_result());

        header("Location: index.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
