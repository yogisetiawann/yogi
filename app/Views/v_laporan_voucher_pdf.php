<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Voucher</h2>
    <table id="example1" class="table table-bordered table-striped">
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
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>