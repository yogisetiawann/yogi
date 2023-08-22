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
</head>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Penambahan Data Voucher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Form Penambahan Data Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Produk/insertDataProduk'); ?>" enctype="multipart/form-data" method="post">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_produk" placeholder="Nama Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Gambar Produk</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_produk" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputHarga">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputHarga" name="harga" placeholder="Harga" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputHarga">Stok Voucher</label>
                                    <input type="text" class="form-control" id="exampleInputHarga" name="stok" placeholder="Masukan stok voucher yang tersedia!" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputKeterangan">Keterangan</label>
                                    <textarea class="form-control" id="exampleInputKeterangan" name="keterangan" placeholder="Keterangan" required></textarea>
                                </div>
                                <!-- Input hidden untuk status_produk -->
                                <input type="hidden" name="status_produk" value="aktif">
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>