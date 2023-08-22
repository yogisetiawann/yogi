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

<!-- v_tabelsampah -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- ... kode sebelumnya ... -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <form action="<?= base_url('Sampah/search') ?>" method="GET">
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

                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Nama Sampah</th>
                                        <th style="text-align:center">Jenis Sampah</th>
                                        <th style="text-align:center">Harga</th>
                                        <th style="text-align:center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data) && is_array($data)) {
                                        $no = 1;
                                        foreach ($data as $row) {
                                    ?>
                                            <tr>
                                                <td style="text-align:center"><?= $no++ ?>.</td>
                                                <td style="text-align:center"><?= $row['nama_sampah'] ?></td>
                                                <td style="text-align:center"><?= $row['jenis_sampah'] ?></td>
                                                <td style="text-align:center"><?= $row['harga_sampah'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('Sampah/edit/' . $row['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm btn-hapus" data-id="<?= $row['id'] ?>">Hapus</button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="<?= base_url('AddSampah') ?>" class="btn btn-success float-right">Tambah Sampah</a>
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
        $('.btn-hapus').click(function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Sampah/hapus/') ?>' + id;
                }
            });
        });
    });
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

<?php if (session()->getFlashdata('success')) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
        });
    </script>
<?php } ?>