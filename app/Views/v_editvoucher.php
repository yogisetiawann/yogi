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
                        <li class="breadcrumb-item active">General Form</li>
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
                        <form action=" <?php echo base_url('Voucher/prosesedit'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_voucher" value="<?= $data['id_voucher'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Sampah</label>
                                    <input type="txt" value="<?= $data['nama_voucher'] ?>" name='nama_voucher' class="form-control" placeholder="Masukan Nama Sampah" required>

                                </div>
                                <label for="exampleInput" value="<?= $data['jenis_voucher'] ?>" name='Jenis_Voucher'>Jenis Sampah</label>
                                <br>
                                <select name='jenis_voucher'>
                                    <br>
                                    <option value="Makanan" name='Organic'>Makanan</option>
                                    <option value="Minuman" name='Minuman'>Minuman</option>
                                    <option value="Sembako" name='Sembako'>Sembako</option>
                                    <option value="Diskon" name='Diskon'>Diskon</option>
                                </select>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gambar Voucher</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" value="<?= $data['file_name'] ?>" class="custom-file-input" id="exampleInputFile" name="file_name" required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jumlah</label>
                                            <input type="txt" class="form-control" id="exampleInputPassword1" value="<?= $data['jumlah'] ?>" name="jumlah" placeholder="Jumlah">
                                        </div>
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
            </form>
        </div>
</div>
</div>
</div>
</section>
</div>