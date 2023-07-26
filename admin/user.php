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
                    <h2>Pengguna</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Nama Lengkap</th>
                                <th>No. HP</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect.php';
                            // menggunakan query sql agar menampilkan data produk dan join kedalam tabel user agar mendapatkan siapa pemilik produk
                            $query = "SELECT * FROM user LEFT JOIN role ON user.role_id = role.role_id";
                            $datas = $conn->query($query);
                            foreach ($datas as $data) :
                            ?>
                                <tr>
                                    <td>
                                        <?= $data['name'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_lengkap'] ?>
                                    </td>
                                    <td>
                                        <?= preg_replace('/^(\d{4})(\d{4})(\d+)$/', '$1-$2-$3', $data['no_hp']) ?>
                                    </td>
                                    <td>
                                        <?= $data['email'] ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal<?= $data['user_id'] ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusDataModal<?= $data['user_id'] ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal ubah data -->
                                <div class="modal fade" id="editDataModal<?= $data['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" ariahidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataModalLabel">Tambah Data Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="user/ubah.php">
                                                <div class="modal-body">
                                                    <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select class="form-control" id="role" name="role_id">
                                                            <option value="1" <?= ($data['role_id'] == 1) ? 'selected' : '' ?>>Admin</option>
                                                            <option value="3" <?= ($data['role_id'] == 3) ? 'selected' : '' ?>>Penjual</option>
                                                            <option value="2" <?= ($data['role_id'] == 2) ? 'selected' : '' ?>>User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">No. HP</label>
                                                        <input required type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input required type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input required type="password" class="form-control" id="password" name="password" value="<?= $data['password'] ?>">
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
                                <div class="modal fade" id="hapusDataModal<?= $data['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel<?= $data['user_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusDataModalLabel<?= $data['user_id'] ?>">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data pengguna ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="user/hapus.php?id=<?= $data['user_id'] ?>" class="btn btn-danger">Hapus</a>
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
                        Tambah Data Pengguna
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="user/tambah.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role_id">
                                <option value="1">Admin</option>
                                <option value="3">Penjual</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input required type="number" class="form-control" id="no_hp" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btnprimary">Simpan</button>
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