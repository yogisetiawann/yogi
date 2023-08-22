<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .content-wrapper {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Data Laporan</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Laporan</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Tabel untuk menampilkan data laporan -->
                                <!-- Tabel untuk menampilkan data laporan -->
                                <table id="example1" class="table table-bordered table-striped">
                                    <form action="<?= base_url('Transaksi/laporan') ?>" method="post" id="bulanForm">
                                        <div class="form-group">
                                            <label for="bulan">Pilih Bulan:</label>
                                            <select name="bulan" id="bulan" class="form-control">
                                                <option value="">Klik ini untuk memilih bulan!</option>
                                                <option value="01" selected>Januari</option>
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
                                            <th style="text-align: center;">Tanggal Transaksi</th>
                                            <th style="text-align: center;">Nama Akun</th>
                                            <th style="text-align: center;">Jenis Sampah</th>
                                            <th style="text-align: center;">Total Berat (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $totalBerat = 0;

                                        foreach ($laporan as $item) {
                                            if (isset($item['total_berat'])) {
                                                $totalBerat += $item['total_berat'];
                                            }
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no++ ?></td>
                                                <td style="text-align: center;"><?= isset($item['tanggal']) ? $item['tanggal'] : ''; ?></td>
                                                <td style="text-align: center;"><?= isset($item['username']) ? $item['username'] : ''; ?></td>
                                                <td style="text-align: center;"><?= isset($item['nama_sampah']) ? $item['nama_sampah'] : ''; ?></td>
                                                <td style="text-align: center;"><?= isset($item['total_berat']) ? $item['total_berat'] : ''; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td style="background-color: #ffff00;" colspan="4" align="center"><strong>Total Keseluruhan:</strong></td>
                                            <td style="background-color: #ffff00; font-weight: bold;"><?= $totalBerat; ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Tambahkan kode untuk menampilkan chart donat di sini -->
                            <canvas id="chartDonut"></canvas>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('Transaksi/printExcel/' . $bulan) ?>" class="btn btn-success">Cetak Excel</a>

                            <!-- Link untuk mencetak laporan dalam format PDF -->
                            <a href="<?= base_url('Transaksi/printPDF/' . $bulan) ?>" class="btn btn-danger">Cetak PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load library JavaScript untuk chart (misalnya Chart.js) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mengambil data transaksi dari PHP
        var laporanData = <?= json_encode($laporan); ?>;
        var dataSampah = <?= json_encode($dataSampah); ?>;
        var data = {};

        // Mengelompokkan data berdasarkan jenis sampah
        for (var i = 0; i < laporanData.length; i++) {
            var namaSampah = laporanData[i]['nama_sampah'];
            var jenisSampah = getJenisSampahByNamaSampah(namaSampah);
            var totalBerat = parseFloat(laporanData[i]['total_berat']);

            if (!data[jenisSampah]) {
                data[jenisSampah] = 0;
            }

            data[jenisSampah] += totalBerat;
        }

        // Fungsi untuk mendapatkan jenis sampah berdasarkan nama sampah
        function getJenisSampahByNamaSampah(namaSampah) {
            var jenisSampah = '';

            for (var i = 0; i < dataSampah.length; i++) {
                if (dataSampah[i]['nama_sampah'] === namaSampah) {
                    jenisSampah = dataSampah[i]['jenis_sampah'];
                    break;
                }
            }

            return jenisSampah;
        }

        // Membuat chart donat menggunakan Chart.js
        var ctx = document.getElementById('chartDonut').getContext('2d');
        var chartDonut = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Total Berat Sampah (kg)',
                    data: Object.values(data),
                    backgroundColor: ['#00a000', '#ffa500', '#e5002c'], // Warna untuk setiap bagian chart
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Laporan Penjualan Berdasarkan Berat Sampah'
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.labels[tooltipItem.index] || '';
                            var value = data.datasets[0].data[tooltipItem.index] || '';

                            if (value) {
                                value = value.toLocaleString('id-ID') + ' kg';
                            }

                            return label + ': ' + value;
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>