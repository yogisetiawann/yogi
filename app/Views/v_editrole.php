<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</head>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">EditData</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Role</h3>
                        </div>
                        <div class="card-body">
                            <?php if (session()->has('error')) : ?>
                                <div class="alert alert-danger"><?= session('error') ?></div>
                            <?php endif; ?>

                            <form action="<?= base_url('UserController/proseseditrole/' . $user['id']) ?>" method="post">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <?php foreach ($roleOptions as $value => $label) : ?>
                                            <option value="<?= $value ?>" <?= $user['role'] === $value ? 'selected' : '' ?>><?= $label ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Ubah Role?',
                text: "Anda yakin ingin mengubah role pengguna ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ubah',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX untuk mengubah role pengguna
                    $.ajax({
                        url: form.action,
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            // Tampilkan SweetAlert setelah berhasil mengubah role
                            Swal.fire({
                                title: 'Sukses',
                                text: 'Role pengguna berhasil diubah',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Redirect ke halaman data user setelah menampilkan SweetAlert
                                window.location.href = '<?= base_url("Usercontroller") ?>';
                            });
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan pesan error jika terjadi kesalahan
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    });
</script>