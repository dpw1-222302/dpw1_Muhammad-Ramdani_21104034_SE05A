<?php
// mengimpor atau memasukkan file connection.php yang berisi kode untuk menghubungkan ke database atau kelas-kelas yang diperlukan.
require_once '../connection.php';
session_start();

// REGISTER
// Pertama, data yang diterima dari formulir (username, email, password) diambil dan di-escape menggunakan fungsi mysqli_real_escape_string() untuk mencegah serangan SQL Injection
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Jika ada field yang kosong, pesan kesalahan disimpan
    if (empty($username) || empty($email) || empty($password)) {
        // dalam sesi ($_SESSION['alert']) dan pengguna diarahkan kembali ke halaman register (header("Location: ../register.php")).
        $_SESSION['alert'] = "fill all fields";
        header("Location: ../register.php");
    } else {
        // Jika semua field terisi, dilakukan pemeriksaan apakah email yang dimasukkan sudah ada dalam database (SELECT * FROM tblaccount WHERE Email = '$email')
        $check = mysqli_query($conn, "SELECT * FROM tblaccount WHERE Email = '$email'");

        // Jika email sudah ada
        if (mysqli_num_rows($check) > 0) {
            $_SESSION['alert'] = "email already exist";
            header("Location: ../register.php");
        } else {
            // Jika email belum ada, data pengguna baru disimpan ke dalam database (INSERT INTO tblaccount (Username, Email, Pass) VALUES ('$username', '$email', '$password'))
            $insert = mysqli_query($conn, "INSERT INTO tblaccount (Username, Email, Pass) VALUES ('$username', '$email', '$password')");

            if ($insert) {
                $_SESSION['alert'] = "account successfully created";
                header("Location: ../register.php");
            }
        }
    }
}

// LOGIN
if (isset($_POST['login'])) {
    // Pertama, data yang diterima dari formulir (email, password) diambil dan di-escape menggunakan fungsi mysqli_real_escape_string()
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Kemudian, dilakukan pemeriksaan apakah semua field telah diisi. Jika ada field yang kosong,
    if (empty($email) || empty($password)) {
        $_SESSION['alert'] = "fill all fields"; // pesan kesalahan disimpan dalam sesi ($_SESSION['alert'])
        header("Location: ../login.php");
    } else { // Jika semua field terisi, dilakukan pemeriksaan apakah email yang dimasukkan ada dalam database (SELECT * FROM tblaccount WHERE Email = '$email').
        $check = mysqli_query($conn, "SELECT * FROM tblaccount WHERE Email = '$email'");

        if (mysqli_num_rows($check) == 0) {
            $_SESSION['alert'] = "no email exist"; // Jika email tidak ada,
            $_SESSION['email'] = $_POST['email']; // pesan kesalahan disimpan dalam sesi ($_SESSION['alert'])
            $_SESSION['userEmail'] = '';
            header("Location: ../login.php"); // dan di kembalikan ke halaman login.
        } else {
            // Jika email ada
            $row = mysqli_fetch_array($check);

            // dilakukan pemeriksaan apakah password yang dimasukkan yang dimasukkan dengan password yang ada dalam database.
            if ($password == $row['Pass']) { // Jika password cocok,
                if (isset($_POST['rem']) == 'checked') {
                    setcookie('email', $row['Email'], time() + (86400 * 30), '/');
                    setcookie('password', $row['Pass'], time() + (86400 * 30), '/');
                } else {
                    setcookie('email', '');
                    setcookie('password', '');
                }
                // sesi loggedin diatur sebagai true,
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $email;
                header("Location: ../index.php"); // pengguna diarahkan ke halaman index.php
            } else {
                $_SESSION['alert'] = "wrong password"; // Jika password tidak cocok,
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['userEmail'] = '';
                // pesan kesalahan disimpan dalam sesi dan pengguna diarahkan kembali ke halaman login.
                header("Location: ../login.php");
            }
        }
    }
}
