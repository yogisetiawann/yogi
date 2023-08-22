<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTransaksi</li>
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
                            <div class="card-body">
                                <div id="message" class="alert alert-success" style="display: none;">
                                    Data Anda sudah terhapus.
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Akun</th> <!-- Kolom baru -->
                                            <th>Berat (kg)</th>
                                            <th>Total Harga</th>
                                            <th>Nama Sampah</th>
                                            <th>Poin</th>
                                            <th>Status Verifikasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (isset($data) && is_array($data)) {
                                            foreach ($data as $row) {
                                                $verifikasi = isset($row['status_verifikasi']) ? $row['status_verifikasi'] : '';
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?>.</td>
                                                    <td><?= $row['tanggal'] ?></td>
                                                    <td><?= $row['username']; ?></td> <!-- Kolom baru -->
                                                    <td><?= $row['berat'] ?></td>
                                                    <td><?= $row['total_harga'] ?></td>
                                                    <td><?= $row['nama_sampah'] ?></td>
                                                    <td><?= $row['poin'] ?></td>
                                                    <td><?= $verifikasi ?></td>
                                                    <td class="text-center">
                                                        <?php if ($verifikasi === 'pending') { ?>
                                                            <a href="<?= base_url('Transaksi/terimaTransaksi/' . $row['id']) ?>" class="btn btn-success btn-sm" onclick="return terimaTransaksi(<?= $row['id'] ?>)">Terima</a>
                                                            <a href="<?= base_url('Transaksi/tolakTransaksi/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return tolakTransaksi(<?= $row['id'] ?>)">Tolak</a>
                                                        <?php } elseif ($verifikasi === 'tolak') { ?>
                                                            <!-- <a href="<?= base_url('Transaksi/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</a> -->
                                                        <?php } else { ?>
                                                            -
                                                        <?php } ?>
                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        $(document).ready(function() {
            // Aktifkan dropdown menu pada profil
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        function terimaTransaksi(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menerima transaksi ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Terima',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Transaksi/terimaTransaksi/') ?>' + id;
                }
            });

            return false; // Tambahkan return false di sini
        }

        function tolakTransaksi(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menolak transaksi ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Tolak',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Transaksi/tolakTransaksi/') ?>' + id;
                }
            });

            return false; // Tambahkan return false di sini
        }
    </script>

    <?php if (session()->getFlashdata('success')) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
            });
        </script>
    <?php } ?>
</body>

</html>