<!DOCTYPE html>
<html>

<head>
    <title>Konversi Transaksi ke Poin</title>
</head>

<body>
    <h1>Konversi Transaksi ke Poin</h1>

    <table>
        <thead>
            <tr>
                <th>Transaksi ID</th>
                <th>Jumlah Poin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($poin as $row) : ?>
                <tr>
                    <td><?= $row['transaksi_id']; ?></td>
                    <td><?= $row['jumlah_poin']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
