<?php
session_start();
include '../../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // mengambil data dari inputan user
    $user_id = $_POST['user_id'];
    $role_id = $_POST['role_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // mengubah data menggunakan query sql
    $query = "UPDATE user SET role_id = '$role_id', nama_lengkap = '$nama_lengkap', no_hp = '$no_hp', email = '$email', password = '$password' WHERE user_id = '$user_id'";
    // jika berhasil maka dialihkan ke halamaan produk
    if ($conn->query($query)) {
        header("Location: ../user.php");
        exit;
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
