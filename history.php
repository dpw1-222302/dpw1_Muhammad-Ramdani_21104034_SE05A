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
    <title>History</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- History Table -->
    <div class="container mt-5">
        <h2>History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produk 1</td>
                    <td>$100</td>
                    <td>2</td>
                    <td>2023-07-01</td>
                    <td>$200</td>
                </tr>
                <tr>
                    <td>Produk 2</td>
                    <td>$150</td>
                    <td>1</td>
                    <td>2023-06-29</td>
                    <td>$150</td>
                </tr>
                <tr>
                    <td>Produk 3</td>
                    <td>$80</td>
                    <td>3</td>
                    <td>2023-06-25</td>
                    <td>$240</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://github.com/muhammadramdani323"></script>
</body>

</html>