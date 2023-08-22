<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">DataUser</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <form action="<?= base_url('user/search') ?>" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan huruf...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                            </div>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Username</th>
                                        <th style="text-align:center">Email</th>
                                        <th style="text-align:center">Role</th>
                                        <th style="text-align:center">Status Akun</th>
                                        <th style="text-align:center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $row) : ?>
                                        <tr>
                                            <td style="text-align:center"><?= $no++ ?></td>
                                            <td style="text-align:center"><?= $row['username'] ?></td>
                                            <td style="text-align:center"><?= $row['email'] ?></td>
                                            <td style="text-align:center"><?= $row['role'] ?></td>
                                            <td style="text-align:center"><?= $row['status_akun'] ?></td>
                                            <td class="text-center">
                                                <?php if ($row['status_akun'] == 'aktif') : ?>
                                                    <button class="btn btn-danger btn-sm" onclick="nonaktifkanUser(<?= $row['id'] ?>)">Nonaktifkan</button>
                                                <?php else : ?>
                                                    <button class="btn btn-success btn-sm" onclick="aktifkanUser(<?= $row['id'] ?>)">Aktifkan</button>
                                                <?php endif; ?>
                                                <a href="<?= base_url('UserController/edit/' . $row['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    // Fungsi untuk menampilkan SweetAlert saat tombol "Nonaktifkan" ditekan
    function nonaktifkanUser(id) {
        Swal.fire({
            title: 'Nonaktifkan Akun?',
            text: "Anda yakin ingin nonaktifkan akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Nonaktifkan',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `<?= base_url('UserController/nonaktifkan/') ?>${id}`;
            }
        });
    }

    // Fungsi untuk menampilkan SweetAlert saat tombol "Aktifkan" ditekan
    function aktifkanUser(id) {
        Swal.fire({
            title: 'Aktifkan Akun?',
            text: "Anda yakin ingin mengaktifkan akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aktifkan',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `<?= base_url('UserController/aktifkan/') ?>${id}`;
            }
        });
    }
</script>

<script>
    // Fungsi untuk menampilkan SweetAlert saat tombol "Nonaktifkan" ditekan
    function nonaktifkanUser(id) {
        Swal.fire({
            title: 'Nonaktifkan Akun?',
            text: "Anda yakin ingin nonaktifkan akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Nonaktifkan',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan AJAX untuk menonaktifkan akun
                $.ajax({
                    url: `<?= base_url('UserController/nonaktifkan/') ?>${id}`,
                    type: 'GET',
                    success: function(response) {
                        // Tampilkan SweetAlert setelah berhasil menonaktifkan akun
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Data berhasil dinonaktifkan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Refresh halaman setelah menampilkan SweetAlert
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan error jika terjadi kesalahan
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    }

    // Fungsi untuk menampilkan SweetAlert saat tombol "Aktifkan" ditekan
    function aktifkanUser(id) {
        Swal.fire({
            title: 'Aktifkan Akun?',
            text: "Anda yakin ingin mengaktifkan akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aktifkan',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan AJAX untuk mengaktifkan akun
                $.ajax({
                    url: `<?= base_url('UserController/aktifkan/') ?>${id}`,
                    type: 'GET',
                    success: function(response) {
                        // Tampilkan SweetAlert setelah berhasil mengaktifkan akun
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Data berhasil diaktifkan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Refresh halaman setelah menampilkan SweetAlert
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan error jika terjadi kesalahan
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    }
</script>