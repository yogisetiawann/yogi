<base href="<?php echo base_url('templates-user') ?>/">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Menu User</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <header id="header" class="header d-flex align-items-center">
        <div style="text-align: center; width: 100%;">
            <h1>List Voucher</h1>
            <nav style="position: relative;">

            </nav>
        </div>
    </header><!-- End Header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Voucher</th>
                                        <th>Jenis Voucher</th>
                                        <th>Gambar</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['nama_voucher'] ?></td>
                                            <td><?= $row['jenis_voucher'] ?></td>
                                            <td width="500px">
                                                <center><img width="40%" src="<?= base_url('uploads/' . $row['file_name']) ?>"></center>
                                            </td>
                                            <td><?= $row['jumlah'] ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                </tfoot>
                            </table>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="<?= base_url('Add_Voucher') ?>" class="btn btn-success float-right">Tambah Voucher</a>
                                </div>
                            </div>

                            </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- Custom script to initialize Magnific Popup -->
    <script>
        $(document).ready(function() {
            $('.popup-image').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
                closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">&#215;</button>',
                closeBtnInside: true
            });
        });
    </script>