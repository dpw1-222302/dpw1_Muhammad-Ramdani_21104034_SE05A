<?php
session_start();
if (isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 3)) {
    header("Location: admin/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Contoh Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <h1>Logo</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" arialabel="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php

                if (isset($_SESSION['email'])) {
                    echo "<li class='nav-item'>";
                    echo "<p class='nav-link'>Selamat datang, " . $_SESSION['email'] . "</p>";
                    echo "</li>";

                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    echo "</li>";
                } else {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='login.php'>Login</a>";
                    echo "</li>";

                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='register.php'>Register</a>";
                    echo "</li>";
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Product</a>
                </li>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='history.php'>History</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- Card Produk -->
    <div class="container mt-5">
        <div class="row">
            <?php
            include 'connect.php';
            $query = "SELECT * FROM produk LEFT JOIN user ON produk.user_id = user.user_id";
            $datas = $conn->query($query);
            foreach ($datas as $data) :
            ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://picsum.photos/150/150" class="card-imgtop" alt="Gambar Produk 1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama'] ?></h5>
                            <p class="card-text">Rp <?= number_format($data['harga'], 0, ',', '.') ?></p>
                            <p class="card-text">Stok: <?= number_format($data['stok'], 0, ',', '.') ?></p>
                            <form method="POST" action="beli.php">
                                <input required type="text" class="form-control" name="produk_id" value="<?= $data['produk_id'] ?>" hidden>
                                <input required type="text" class="form-control" name="stok" value="<?= $data['stok'] ?>" hidden>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                ?>
                                <input type="hidden" name="tanggal" value="<?= date('Y-m-d H:i:s'); ?>">
                                <div class="form-group">
                                    <label for="quantity1">Quantity</label>
                                    <input required type="number" class="form-control" name="quantity" id="quantity1" min="1" value="1">
                                </div>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    echo "<button type='submit' class='btn btn-primary'>Beli</button>";
                                } else {
                                    echo "<a class='btn btn-primary' href='login.php'>Beli</a>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>\
    <script src="https://github.com/muhammadramdani323"></script>
</body>

</html>