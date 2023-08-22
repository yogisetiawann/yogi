<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <style>
        /* Styles for action buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-buttons a {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Voucher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataProduk</li>
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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Voucher</th>
                                            <th style="text-align: center;">Gambar</th>
                                            <th style="text-align: center;">Harga Voucher</th>
                                            <th style="text-align: center;">Stok Voucher</th>
                                            <th style="text-align: center;">Keterangan</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i++; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_produk']; ?></td>
                                                <td style="text-align: center;"><img src="<?= base_url($row['path_gambar']); ?>" alt="<?= $row['nama_produk']; ?>" width="100"></td>
                                                <td style="text-align: center;"><?= $row['harga'] . ' Poin';   ?></td>
                                                <td style="text-align: center;"><?= $row['stok']; ?></td>
                                                <td style="text-align: center;"><?= $row['keterangan']; ?></td>
                                                <td style="text-align: center;" class="action-buttons">
                                                    <?php if ($row['status_produk'] == 'aktif') : ?>
                                                        <a href="<?= base_url('Produk/deactivate/' . $row['id']); ?>" class="btn btn-danger btn-sm btn-activate">Nonaktifkan</a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('Produk/activate/' . $row['id']); ?>" class="btn btn-success btn-sm btn-activate">Aktifkan</a>
                                                    <?php endif; ?>

                                                    <a href="<?= base_url('Produk/edit/' . $row['id']); ?>" class="btn btn-success btn-sm btn-edit">Edit</a>

                                                    <!-- <a href="<?= base_url('Produk/delete/' . $row['id']); ?>" class="btn btn-danger btn-sm btn-delete">Delete</a> -->

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <a href="<?= base_url('AddProduk') ?>" class="btn btn-success float-right btn-add">Tambah Voucher</a>
                                    </div>
                                </div>
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

        $(document).ready(function() {
            // SweetAlert untuk tombol Delete
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

        });
    </script>
</body>

</html>