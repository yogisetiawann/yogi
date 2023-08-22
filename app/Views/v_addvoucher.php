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
                        <li class="breadcrumb-item active">Form Penambahan Data Voucher</li>
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
                        <form action=" <?php echo base_url('Voucher/inserWTODataVoucher'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Voucher</label>
                                    <input type="txt" class="form-control" id="exampleInputEmail1" name="nama_voucher" placeholder="Nama Voucher">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Jenis Voucher</label>
                                    <br>
                                    <select name='jenis_voucher'>
                                        
                                        <option value="Makanan" name='Organic'>Makanan</option>
                                        <option value="Minuman" name='Minuman'>Minuman</option>
                                        <option value="Sembako" name='Sembako'>Sembako</option>
                                        <option value="Diskon" name='Diskon'>Diskon</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Gambar Voucher</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah</label>
                                        <input type="txt" class="form-control" id="exampleInputPassword1" name="jumlah" placeholder="Jumlah">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

