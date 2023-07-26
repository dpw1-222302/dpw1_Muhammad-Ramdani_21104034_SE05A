<?php
session_start();
include '../../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil data dari inputan user
    $role_id = $_POST['role_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // memasukan data menggunakan query sql
    $query = "INSERT INTO user (role_id, nama_lengkap, no_hp, email, password) VALUES ('$role_id', '$nama_lengkap', '$no_hp', '$email', '$password')";
    // jika berhasil maka dialihkan ke halamaan produk
    if ($conn->query($query)) {
        header("Location: ../user.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
