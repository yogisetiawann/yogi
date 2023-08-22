<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .total-row {
            background-color: #ffff00;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Data Laporan</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Akun</th>
                <th>Jenis Sampah</th>
                <th>Total Berat (kg)</th>
            </tr>
        </thead>
        $totalBerat += $item['total_berat'];
        <tbody>
            <?php
            
            $no = 1;
            $totalPenjualan = 0;
            foreach ($laporan as $item) :
                $totalPenjualan += $item['total_berat'];
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item['tanggal']; ?></td>
                    <td><?= $item['username']; ?></td>
                    <td><?= $item['jenis_sampah']; ?></td>
                    <td><?= $item['total_berat']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="4" align="center"><strong>Total Keseluruhan:</strong></td>
                <td><?= $totalPenjualan; ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>