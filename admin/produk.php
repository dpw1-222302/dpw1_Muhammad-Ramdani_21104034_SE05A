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
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Produk</h2>
                    <button type="button" class="btn btn-primary" datatoggle="modal" data-target="#tambahDataModal">
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
                            <tr>
                                <td>john@example.com</td>
                                <td>Produk 1</td>
                                <td>$100</td>
                                <td>10</td>
                                <td>
                                    <button type="button" class="btn btn-primary btnsm" data-toggle="modal" data-target="#editDataModal">Edit</button>
                                    <button type="button" class="btn btn-danger btnsm" data-toggle="modal" data-target="#hapusDataModal">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>jane@example.com</td>
                                <td>Produk 2</td>
                                <td>$150</td>
                                <td>5</td>
                                <td>
                                    <button type="button" class="btn btn-primary btnsm" data-toggle="modal" data-target="#editDataModal">Edit</button>
                                    <button type="button" class="btn btn-danger btnsm" data-toggle="modal" data-target="#hapusDataModal">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>david@example.com</td>
                                <td>Produk 3</td>
                                <td>$80</td>
                                <td>8</td>
                                <td>
                                    <button type="button" class="btn btn-primary btnsm" data-toggle="modal" data-target="#editDataModal">Edit</button>
                                    <button type="button" class="btn btn-danger btnsm" data-toggle="modal" data-target="#hapusDataModal">Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal ubah data -->
                            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" ariahidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataModalLabel">Tambah Data Pengguna</h5>
                                            <button type="button" class="close" datadismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input required type="text" class="formcontrol" id="nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <input required type="number" class="form-control" id="harga">
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Stok</label>
                                                    <input required type="number" class="form-control" id="number">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnsecondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btnprimary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input required type="text" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input required type="number" class="form-control" id="harga">
                        </div>
                        <div class="form-group">
                            <label for="number">Stok</label>
                            <input required type="number" class="form-control" id="number">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" datadismiss="modal">Tutup</button>
                    <button type="button" class="btn btnprimary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="hapusDataModal" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusDataModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" datadismiss="modal">Batal</button>
                    <button type="button" class="btn btndanger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.mi
n.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>