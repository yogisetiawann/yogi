<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Sampah</title>

    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Tautan CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        /* CSS judul */
        .h1 {
            text-align: center;
            color: green;
            margin-top: 20px;
        }

        /* CSS tombol Kembali */
        .btn-kembali {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="h1">List Sampah</h1>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Sampah</th>
                        <th scope="col">Jenis Sampah</th>
                        <th scope="col">Harga Sampah/Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $row['nama_sampah'] ?></td>
                            <td><?= $row['jenis_sampah'] ?></td>
                            <td><?= $row['harga_sampah'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
    </div>

    <!-- Tautan script JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Tautan script JavaScript DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>