<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penimbangan Sampah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        form {
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        select.form-control option:checked {
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="button-container">

    </div>
    <form method="post" action="<?= base_url('Transaksi/calculate') ?>">
        <div class="form-group">
            <label for="jenis_sampah">Jenis Sampah:</label>
            <select id="jenis_sampah" name="jenis_sampah" class="form-control">

                <?= $options ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_sampah">Nama Sampah:</label>
            <select id="nama_sampah" name="nama_sampah" class="form-control">
                <?= $namasampah ?>
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="item">Item:</label>
            <input type="text" name="item" id="item" class="form-control" required>
        </div> -->

        <div class="form-group">
            <label for="weight">Berat (kg):</label>
            <input type="number" name="weight" id="weight" step="0.01" class="form-control" required>
        </div>

        <input type="submit" value="Hitung" class="btn btn-primary btn-block">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Tidak ada di list sampah!',
                text: '<?= session()->getFlashdata('error') ?>',
            });
        <?php endif; ?>
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Menggunakan event change pada dropdown jenis_sampah
            $('#jenis_sampah').on('change', function() {
                var jenisSampah = $(this).val(); // Mendapatkan nilai jenis_sampah yang dipilih

                // Membuat request Ajax
                $.ajax({
                    url: '<?= base_url('TabelTransaksi/filterNamaSampah/') ?>' + jenisSampah,
                    // Menggunakan site_url() untuk URL lengkap
                    type: 'GET',
                    // data: {
                    //     jenis_sampah: jenisSampah
                    // }, // Mengirim data jenis_sampah ke server
                    dataType: 'html',
                    success: function(response) {
                        // alert(response);
                        $('#nama_sampah').html(response); // Mengganti opsi dropdown nama_sampah dengan data yang diterima dari server
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>