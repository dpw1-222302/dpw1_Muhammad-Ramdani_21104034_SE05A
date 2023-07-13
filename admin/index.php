<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.c
ss">
</head>

<body>
    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/pertemuan10/admin">Riwayat
                                Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pertemuan10/admin/user.php">Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pertemuan10/admin/produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pertemuan10/admin">Role</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Riwayat Pembelian</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pemilik</th>
                                <th>Pembeli</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pemilik 1</td>
                                <td>Pembeli 1</td>
                                <td>Produk 1</td>
                                <td>$100</td>
                                <td>2</td>
                                <td>2023-07-01</td>
                                <td>$200</td>
                            </tr>
                            <tr>
                                <td>Pemilik 2</td>
                                <td>Pembeli 2</td>
                                <td>Produk 2</td>
                                <td>$150</td>
                                <td>1</td>
                                <td>2023-06-29</td>
                                <td>$150</td>
                            </tr>
                            <tr>
                                <td>Pemilik 3</td>
                                <td>Pembeli 3</td>
                                <td>Produk 3</td>
                                <td>$80</td>
                                <td>3</td>
                                <td>2023-06-25</td>
                                <td>$240</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.mi
n.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>