<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Bulan <?= $bulan ?></title>
    <style>
        /* Define your custom styles for the PDF here */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total-berat {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Laporan Penjualan Bulan <?= $bulan ?></h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Nama Akun</th>
                <th>Jenis Sampah</th>
                <th>Total Berat (kg)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $item) : ?>
                <tr>
                    <td><?= $item['tanggal'] ?></td>
                    <td><?= $item['username'] ?></td>
                    <td><?= $item['nama_sampah'] ?></td>
                    <td><?= $item['total_berat'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="background-color: #ffff00;" colspan="3" align="center"><strong>Total Keseluruhan:</strong></td>
                <td style="background-color: #ffff00; font-weight: bold;"><?= $totalBerat; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="total-berat">
        <strong>Total Berat:</strong> <?= $totalBerat ?> kg

    </div>
</body>

</html>