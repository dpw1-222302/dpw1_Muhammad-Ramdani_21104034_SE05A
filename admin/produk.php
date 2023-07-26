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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h2>Produk</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Email Pengguna</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect.php';
                            // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                            $query = "SELECT * FROM produk LEFT JOIN user ON produk.user_id = user.user_id";
                            $datas = $conn->query($query);
                            foreach ($datas as $data) :
                            ?>
                                <tr>
                                    <td>
                                        <?= $data['email'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama'] ?>
                                    </td>
                                    <td>
                                        Rp <?= number_format($data['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?= number_format($data['stok'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal<?= $data['produk_id'] ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusDataModal<?= $data['produk_id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal ubah data -->
                                <div class="modal fade" id="editDataModal<?= $data['produk_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" ariahidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel">Tambah Data Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="produk/ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="produk_id" value="<?= $data['produk_id'] ?>">
                                                    <div class=" form-group">
                                                        <label for="nama">Nama</label>
                                                        <input required type="text" class="formcontrol" id="nama" name="nama" value="<?= $data['nama'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input required type="number" class="formcontrol" id="harga" name="harga" value="<?= $data['harga'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number">Stok</label>
                                                        <input required type="number" class="formcontrol" id="number" name="stok" value="<?= $data['stok'] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Data -->
                                <div class="modal fade" id="hapusDataModal<?= $data['produk_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel<?= $data['produk_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusDataModalLabel<?= $data['produk_id'] ?>">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data pengguna ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="produk/hapus.php?id=<?= $data['produk_id'] ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">
                        Tambah Data Produk
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="produk/tambah.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input required type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input required type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="number">Stok</label>
                            <input required type="number" class="form-control" id="number" name="stok">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" datadismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://github.com/muhammadramdani323"></script>
</body>

</html>