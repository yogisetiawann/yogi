<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="message" class="alert alert-success" style="display: none;">
                                    Data Anda sudah terhapus.
                                </div>

                                <table id="example1" class="table table-bordered table-striped">
                                    <form action="<?= base_url('Produk/laporanVoucher') ?>" method="POST" id="bulanForm">
                                        <div class="form-group">
                                            <label for="bulan">Pilih Bulan:</label>
                                            <select name="bulan" id="bulan" class="form-control">
                                                <option value="">Pilih Bulan</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Lihat Laporan</button>
                                        </div>


                                    </form>
                                    <form action="<?= base_url('Produk/cetakLaporanVoucherPDF') ?>" method="POST">
                                        <input type="hidden" name="bulan" value="<?= $bulan ?>">
                                        <button type="submit" class="btn btn-danger mr-2 mb-3">Cetak PDF</button>
                                    </form>
                                    
                                    <form action="<?= base_url('Produk/cetakLaporanVoucherExcel') ?>" method="POST">
                                        <input type="hidden" name="bulan" value="<?= $bulan ?>">
                                        <button type="submit" class="btn btn-success mb-3"> Cetak Excel</button>
                                    </form>
                                    

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var bulanForm = document.getElementById('bulanForm');
                                            var bulanSelect = document.getElementById('bulan');
                                            var selectedBulan = '<?= isset($_POST['bulan']) ? $_POST['bulan'] : '' ?>';

                                            bulanSelect.value = selectedBulan;

                                            bulanForm.addEventListener('submit', function(event) {
                                                selectedBulan = bulanSelect.value;
                                            });
                                        });
                                    </script>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Tanggal</th>
                                            <th style="text-align: center;">Nama User</th>
                                            <th style="text-align: center;">Nama Voucher</th>
                                            <th style="text-align: center;">Harga (poin)</th>
                                            <th style="text-align: center;">Stok Voucher</th>
                                            <th style="text-align: center;">Kode Voucher</th>
                                            <th style="text-align: center;">Status Voucher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($laporan as $item) : ?>
                                            <?php
                                            // Ubah format tanggal ke Y-m-d
                                            $tanggal = date('Y-m-d', strtotime($item['tanggal']));
                                            // Ambil bulan dari tanggal
                                            $bulanData = date('m', strtotime($item['tanggal']));
                                            // Bandingkan dengan bulan yang dipilih
                                            if ($bulanData == $bulan) :
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $no++ ?></td>
                                                    <td style="text-align: center;"><?= $item['tanggal']; ?></td>
                                                    <td style="text-align: center;"><?= $item['username']; ?></td>
                                                    <td style="text-align: center;"><?= $item['nama_produk']; ?></td>
                                                    <td style="text-align: center;"><?= $item['harga']; ?></td>
                                                    <td style="text-align: center;"><?= $item['stok_voucher']; ?></td>
                                                    <td style="text-align: center;"><?= $item['kode_voucher']; ?></td>
                                                    <td style="text-align: center;"><?= $item['status_voucher']; ?></td>
                                                </tr>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>