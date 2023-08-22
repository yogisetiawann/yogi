<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS untuk kalender */
        #calendar {
            background-color: #00FF00;
            /* Warna hijau */
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                        <p id="current-date"></p>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $totalSampah ?></h3>
                                <p>Jumlah Sampah</p>
                            </div>
                            <div class="icon">
                                <i class="ion-trash-b"></i>
                            </div>
                            <a href="<?= base_url('/Sampah') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><sup style="font-size: 20px">Rp</sup><?= number_format($totalPenjualan['total_harga'], 0, ',', '.') ?></h3>

                                <p>Total Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url('Transaksi/laporan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ... -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $totalUser ?></h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= base_url('UserController') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ... -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= $totalTransaksi ?></h3>
                                <p>Jumlah Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?= base_url('Transaksi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- Calendar -->
                <div id="calendar"></div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <script>
        // Mengambil tanggal saat ini
        var currentDate = new Date();
        var options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDate = currentDate.toLocaleDateString('en-US', options);

        // Menampilkan tanggal di elemen dengan id "current-date"
        var currentDateElement = document.getElementById('current-date');
        currentDateElement.textContent = formattedDate;

        // Menampilkan kalender dengan tanggal saat ini
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    // Tambahkan event-event Anda di sini
                ]
            });

            calendar.render();
        });
    </script>
</body>

</html>