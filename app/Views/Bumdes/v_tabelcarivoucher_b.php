<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Riwayat Transaksi Voucher</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?= base_url('Produk_bumdes/cariVoucher'); ?>" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari voucher..." name="search" value="<?= isset($search) ? $search : ''; ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Produk</th>
                                            <th style="text-align: center;">Kode Voucher</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no++; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_produk']; ?></td>
                                                <td style="text-align: center;"><?= $row['kode_voucher']; ?></td>
                                                <td style="text-align: center;"><?= $row['status_voucher']; ?></td>
                                                <td style="text-align: center;">
                                                    <?php if ($row['status_voucher'] == 'belum digunakan') : ?>
                                                        <a href="<?= base_url('lihatproduk/validasiVoucher/' . $row['id']); ?>" class="btn btn-success" style="text-align: center;">Validasi</a>
                                                        <!-- <a href="<?= base_url('lihatproduk/nonaktifkanVoucher/' . $row['id']); ?>" class="btn btn-success"></a> -->
                                                    <?php endif; ?>
                                                    <!-- <a href="<?= base_url('lihatproduk/hapusVoucher/' . $row['id']); ?>" class="btn btn-danger">Hapus</a> -->
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
            <!-- /.container -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        function showSuccessAlert() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Voucher berhasil divalidasi.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>

    <!-- /.content-wrapper -->
</body>

</html>