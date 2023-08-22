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
                        <li class="breadcrumb-item active">DataVoucher</li>
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
                                        <th>Aksi</th>
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
                                            <td class="text-right">
                                                <a href="<?= base_url('Voucher/edit/' . $row['id_voucher']) ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="<?= base_url('Voucher/hapus/' . $row['id_voucher']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
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