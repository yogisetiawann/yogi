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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <form action=" <?php echo base_url('Sampah/prosesedit'); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Sampah</label>
                                    <input type="txt" value="<?= $data['nama_sampah'] ?>" name='nama_sampah' class="form-control" placeholder="Masukan Nama Sampah" required>

                                </div>
                                <label for="exampleInput" value="<?= $data['jenis_sampah'] ?>" name='Jenis_Sampah'>Jenis Sampah</label>
                                <br>
                                <select name='jenis_sampah'>
                                    <option value="Organic" name='Organic'>Organic</option>
                                    <option value="Anorganic" name='Anorganic'>Anorganic</option>
                                    <option value="Bahan Berbahaya dan Beracun (B3)" name='B3'>B3</option>
                                </select>
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="txt" value="<?= $data['harga_sampah'] ?>" name='harga_sampah' class="form-control" placeholder="Masukan Nama Sampah" required>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Perbaharui</button>
        </div>

        <?php if (session()->getFlashdata('success')) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '<?= session()->getFlashdata('success') ?>',
                });
            </script>
        <?php } ?>