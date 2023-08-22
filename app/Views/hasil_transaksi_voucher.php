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

        .voucher {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 50px auto;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .voucher-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .voucher-header h1 {
            color: #228B22;
            font-size: 24px;
        }

        .voucher-code {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .voucher-code .harga-poin {
            color: black;
        }

        .voucher-code .poin-sebelumnya {
            color: red;
            text-decoration: line-through;
        }

        .voucher-code .user-poin {
            color: green;
        }

        .voucher-message {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .voucher-button {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
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
    <div class="voucher">
        <div class="voucher-header">
            <h1><b>Hasil Transaksi</b></h1>
        </div>

        <!-- Bagian tampilan pesan -->
        <?php if ($pesan) : ?>
            <div class="voucher-message" style="color: green;"><?= $pesan ?></div>
        <?php endif; ?>


        <?php if ($poinSebelumnya) : ?>
            <div class="voucher-code">
                Harga Poin: <span class="harga-poin"><?= $hargaProduk ?></span>
                <br>
                Poin sebelumnya: <del class="poin-sebelumnya"><?= $poinSebelumnya ?></del>
                <br>
                Poin Anda sekarang: <span class="user-poin"><?= $userPoin ?></span>
            </div>
        <?php endif; ?>

        <?php if ($kode_voucher) : ?>
            <div class="voucher-code">Kode Voucher: <span style="color: green;"><?= $kode_voucher ?></span></div>
        <?php endif; ?>

        <div class="voucher-button">
            <a href="<?= base_url('LihatProduk') ?>" class="btn">Kembali</a>
        </div>
    </div>
</body>

</html>