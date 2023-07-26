<?php
session_start();
include '../connect.php';
// mendapatkan data role untuk user yang sedang login
$query = "SELECT * FROM user JOIN role ON user.role_id = role.role_id";
$datas = $conn->query($query);
$data = $datas->fetch_assoc();
// jika nama role bukan admin atau bukan penjual maka di alihkan ke ../index.php
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] == 2) {
    header("Location: ../index.php");
    exit;
}
if ($_SESSION['role_id'] == 3) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Riwayat Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Produk</a>
                        </li>
                        <?php
                        if ($_SESSION['role_id'] == 1) {
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='user.php'>Pengguna</a>";
                            echo "</li>";

                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='role.php'>Role</a>";
                            echo "</li>";
                        } else {
                            echo "";
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo "<li class='nav-item'>";
                            echo "<span class='nav-link'>Selamat datang, " . $_SESSION['email'] . "</span>";
                            echo "</li>";

                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='../logout.php'>Logout</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </nav>
            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Role</h2>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect.php';
                            // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                            $query = "SELECT * FROM role";
                            $datas = $conn->query($query);
                            foreach ($datas as $data) :
                            ?>
                                <tr>
                                    <td>
                                        <?= $data['role_id'] ?>
                                    </td>
                                    <td>
                                        <?= $data['name'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://github.com/muhammadramdani323"></script>
</body>

</html>