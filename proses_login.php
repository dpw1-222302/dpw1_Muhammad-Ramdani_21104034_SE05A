<?php
// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); // Memulai session
    // Lakukan operasi pengecekan login di database
    require_once('connect.php');
    // Query untuk memeriksa kecocokan email dan password di tabel pengguna
    // Buat query untuk mengecek apakah terdapat user dengan email X dan password Y, jika ya maka login berhasil
    $query = "SELECT * FROM user WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // Login berhasil, simpan data pengguna ke dalam session
        $user = $result->fetch_assoc();
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        // Cek role_id pengguna
        if ($user['role_id'] == 1 || $user['role_id'] == 3) {
            // Jika role_id = 1 atau 2, redirect ke halaman admin/index.php
            header("Location: admin/index.php");
            exit();
        } else if ($user['role_id'] == 2) {
            // Jika role_id = 2, redirect ke halaman index.php
            header("Location: index.php");
            exit();
        }
    } else {
        echo "Login gagal. Silakan cek kembali email dan password Anda.";
    }
    // Tutup koneksi database
    $conn->close();
}
?>
