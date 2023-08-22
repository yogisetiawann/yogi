<!DOCTYPE html>
<html>

<head>
    <title>Form Transaksi</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        select,
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Form Transaksi Penimbangan Sampah</h1>
    <form method="post" action="<?= base_url('Transaksi/calculate') ?>">
        <label for="jenis_sampah">Jenis Sampah:</label>
        <select id="jenis_sampah" name='jenis_sampah'>
            <option value="Organic">Organic</option>
            <option value="Anorganic">Anorganic</option>
            <option value="Kertas">Kertas</option>
            <option value="Logam">Logam</option>
            <option value="Kaca">Kaca</option>
        </select><br><br>

        <label for="nama_sampah">Nama Sampah:</label>
        <input type="text" name="nama_sampah" id="nama_sampah" required><br><br>

        <label for="weight">Berat (kg):</label>
        <input type="number" name="weight" id="weight" step="0.01" required><br><br>

        <input type="submit" value="Hitung">
    </form>
    <button>
        <a href="<?= base_url('Sampah')?>"></a>
    </button>

</body>

</html>