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
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Produk_bumdes') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Produk_bumdes/updateDataProduk'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Voucher</label>
                                    <input type="text" value="<?= $data['nama_produk'] ?>" name="nama_produk" class="form-control" placeholder="Masukan Nama Voucher" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gambar</label>
                                    <br>
                                    <input type="file" name="gambar_produk">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jumlah</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $data['harga'] ?>" name="harga" placeholder="Jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputHarga">Stok Voucher</label>
                                    <input type="text" class="form-control" id="exampleInputHarga" name="stok" placeholder="Berapa stok vouchernya?" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keterangan</label>
                                    <textarea class="form-control" name="keterangan"><?= $data['keterangan']; ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</body>

</html>