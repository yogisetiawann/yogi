<!DOCTYPE html>
<html>

<head>
    <title>Hasil Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 30px;
        }

        .container {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 50px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            background-color: #fff;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 5px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Transaksi</h1>
        <?= $pesan ?>

        <a class="btn" href="<?= base_url('TabelTransaksi')?>">Kembali</a>
    </div>
</body>

</html>