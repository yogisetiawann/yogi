<base href="<?php echo base_url('templates-user-2') ?>/">
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<head>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Star Admin2 </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/feather/feather.css">
        <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="vendors/typicons/typicons.css">
        <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Voucher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <base href="<?php echo base_url('templates-user') ?>/">
    <style>
        .green-header {
            color: white;
            background-color: green;
            padding: 10px;
            border-radius: 5px;
        }

        .poin-header {
            color: white;
            font-size: 20px;
            /* Menyesuaikan ukuran font menjadi kecil */
            position: absolute;
            /* Mengubah posisi menjadi absolut */
            top: 3px;
            /* Menyesuaikan jarak dari atas */
            right: 30px;
            /* Menyesuaikan jarak dari kanan */
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        .product {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product.out-of-stock {
            background-color: #f2f2f2;
            border-color: #ccc;
        }

        .product.out-of-stock img {
            filter: grayscale(100%);
        }

        .product .image-container {
            text-align: center;
            position: relative;
            height: 200px;
        }

        .product .image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .product .image-container img:hover {
            transform: scale(1.1);
        }

        .product .name {
            margin-top: 10px;
            font-weight: bold;
        }

        .product .price {
            margin-top: 5px;
        }

        .product .stock {
            margin-top: 5px;
            font-weight: bold;
        }

        .product .out-of-stock-message {
            margin-top: 10px;
            color: red;
        }

        .product .btn-tukar {
            margin-top: 10px;
        }

        .modal-body p {
            margin-bottom: 0;
        }

        .transaction-history-button {
            margin-left: 10px;
        }

        .btn-riwayat-voucher {
            margin-top: 10px;
            margin-left: 5px;
        }

        .btn-tukar {
            margin-top: 10px;
            margin-left: 5px;
        }

        .btn-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .btn-container .btn {
            margin-right: 10px;
        }

        /* Additional Styles */
        .header {
            background-color: green;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .header h1 {
            color: white;
        }

        .form-group input {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }


        /* Tambahkan CSS untuk tampilan dan posisi */
        .container {
            padding: 20px;
            text-align: center;
        }

        .welcome-text {
            margin-top: 20px;
            font-size: 20px;
            text-align: center;
        }

        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            flex: 1 1 auto;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <!-- Tampilkan pesan SweetAlert jika ada -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: '',
                text: '<?= session()->getFlashdata('pesan') ?>',
            });
        </script>
    <?php endif; ?>
    <div class="container">




        <!-- Tambahkan button untuk mengurutkan harga poin -->
        <div class="btn-container">
            <div class="btn-group">
                <div class="input-group">
                    <input type="search" id="searchInput" class="form-control" placeholder="Cari produk..." style="text-align: center;">
                </div>
                <button class="btn btn-primary" onclick="sortPrice('desc')">Harga Tertinggi ke Terendah</button>
                <button class="btn btn-primary" onclick="sortPrice('asc')">Harga Terendah ke Tertinggi</button>
                <a class="btn btn-success" href="<?= base_url('DetailVoucher') ?>">Riwayat Voucher</a>
            </div>
        </div>
        <!-- Menampilkan daftar produk -->
        <div class="container">
            <?php if (empty($data)) : ?>
                <div class="alert alert-warning" role="alert">
                    Voucher yang Anda cari tidak tersedia.
                </div>
            <?php else : ?>
                <div class="product-list" id="productList">
                    <?php
                    $outOfStockProducts = [];
                    $inStockProducts = [];


                    foreach ($data as $produk) {
                        if (isset($poin['poin']) && $poin['poin'] < $produk['harga'] || $produk['stok'] == 0) {
                            $outOfStockProducts[] = $produk;
                        } else {
                            $inStockProducts[] = $produk;
                        }
                    }
                    ?>
                    <?php foreach ($inStockProducts as $produk) : ?>
                        <div class="product">
                            <div class="image-container">
                                <img src="<?= base_url('uploads/' . $produk['gambar_produk']) ?>" alt="<?= $produk['nama_produk'] ?>" onclick="zoomImage(event)">
                            </div>
                            <div class="name"><?= $produk['nama_produk'] ?></div>
                            <div class="price">Harga Poin: <?= $produk['harga'] ?></div>
                            <div class="stock">Stok: <?= $produk['stok'] ?></div>
                            <?php if ($produk['status_produk'] == 'aktif') : ?>
                                <button class="btn btn-primary btn-tukar" onclick="openConfirmationModal(<?= $produk['id'] ?>)" data-keterangan="<?= $produk['keterangan'] ?>">Tukar Poin</button>
                            <?php else : ?>
                                <p class="out-of-stock-message">Tidak dapat ditukar</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <?php foreach ($outOfStockProducts as $produk) : ?>
                        <div class="product out-of-stock">
                            <div class="image-container">
                                <img src="<?= base_url('uploads/' . $produk['gambar_produk']) ?>" alt="<?= $produk['nama_produk'] ?>" onclick="zoomImage(event)">
                            </div>
                            <div class="name"><?= $produk['nama_produk'] ?></div>
                            <div class="price">Harga Poin: <?= $produk['harga'] ?></div>
                            <div class="stock">Stok: <?= $produk['stok'] ?></div>
                            <?php if (isset($poin['poin']) && $poin['poin'] < $produk['harga']) :  ?>

                                <p class="out-of-stock-message">Poin Anda tidak mencukupi</p>
                            <?php elseif ($produk['stok'] == 0) : ?>
                                <p class="out-of-stock-message">Stok Habis</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Tukar Poin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="name" id="productName"></div>
                        <b>
                            <p>Apakah Anda yakin ingin menukar poin untuk Voucher ini?</p>
                        </b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()">Batal</button>

                        <?php if (isset($poin['poin']) && $poin['poin'] >= $produk['harga'] && $produk['stok'] > 0) : ?>
                            <button class="btn btn-primary btn-tukar" onclick="openConfirmationModal(<?= $produk['id'] ?>)" data-keterangan="<?= $produk['keterangan'] ?>">Tukar Poin</button>
                        <?php else : ?>
                            <button class="btn btn-primary btn-tukar" onclick="tukarPoin()">Tukar Poin</button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <script>
            function closeModal() {
                $('#confirmationModal').modal('hide');
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function() {
                // Mengaktifkan pencarian saat tombol ditekan
                $('#searchButton').click(function() {
                    searchProducts();
                });

                // Mengaktifkan pencarian saat tombol "Enter" ditekan
                $('#searchInput').keydown(function(event) {
                    if (event.keyCode === 13) {
                        searchProducts();
                    }
                });

                // Fungsi pencarian produk
                function searchProducts() {
                    var keyword = $('#searchInput').val().toLowerCase();
                    $('.product').each(function() {
                        var productName = $(this).find('.name').text().toLowerCase();
                        if (productName.includes(keyword)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
            });
        </script>

        <script>
            var selectedProductId;

            function zoomImage(event) {
                event.target.style.transform = 'scale(1.1)';
            }

            function openConfirmationModal(productId) {
                selectedProductId = productId;
                var productName = document.getElementById('productName');
                var keterangan = event.target.getAttribute('data-keterangan');
                productName.textContent = keterangan;
                $('#confirmationModal').modal('show');
            }

            function tukarPoin() {
                $('#confirmationModal').modal('hide');
                window.location.href = "<?= base_url('LihatProduk/tukarPoin/') ?>" + selectedProductId;
            }

            function sortPrice(sortOrder) {
                var productList = document.getElementById('productList');
                var products = productList.getElementsByClassName('product');
                var sortedProducts = Array.from(products);

                sortedProducts.sort(function(a, b) {
                    var aPrice = Number(a.querySelector('.price').textContent.split(' ')[2]);
                    var bPrice = Number(b.querySelector('.price').textContent.split(' ')[2]);

                    if (sortOrder === 'asc') {
                        return aPrice - bPrice;
                    } else {
                        return bPrice - aPrice;
                    }
                });

                productList.innerHTML = '';

                for (var i = 0; i < sortedProducts.length; i++) {
                    productList.appendChild(sortedProducts[i]);
                }
            }
        </script>
    </div>


</body>

</html>