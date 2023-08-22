<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi Voucher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-16 text-center">
                        <h3>Riwayat Transaksi Voucher</h3>
                    </div>
                    <div class="col-sm-6 text-right">

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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Produk</th>
                                            <th style="text-align: center;">Kode Voucher</th>
                                            <th style="text-align: center;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data as $row) : ?>

                                            <tr>
                                                <td style="text-align: center;"><?= $no++; ?></td>
                                                <td style="text-align: center;"><?= $row['nama_produk']; ?></td>
                                                <td style="text-align: center;"><?= $row['kode_voucher']; ?></td>
                                                <td style="text-align: center;">
                                                    <?php if ($row['status_voucher'] == 'belum digunakan') : ?>
                                                        Voucher <b style="color: red;">belum</b> digunakan <b>(Segera tukarkan ke bumdes)</b>
                                                    <?php endif; ?>
                                                    <?php if ($row['status_voucher'] == 'berhasil digunakan') : ?>
                                                        Voucher <b style="color: green;">sudah</b> digunakan <b>(Tidak bisa digunakan lagi)</b>
                                                    <?php endif; ?>
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
    <!-- /.content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
</body>

</html>