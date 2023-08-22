<base href="<?php echo base_url('templates') ?>/">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bank Sampah</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>/templates/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/templates/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>/templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>/templates/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?= base_url('/') ?>" class="navbar-brand p-0">
                    <h1 class="m-0">Bank Sampah</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url('/') ?>" class="nav-item nav-link active">Beranda</a>
                        <a href="<?= base_url('/peta') ?>" class="nav-item nav-link">Peta Desa Situsari</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita & Artikel</a>
                            <div class="dropdown-menu m-0">
                                <a href="<?= base_url('fitur') ?>" class="dropdown-item">Fitur</a>
                                <a href="<?= base_url('/berita') ?>" class="dropdown-item">Berita</a>
                                <a href="<?= base_url('/artikel') ?>" class="dropdown-item">Artikel</a>
                            </div>
                        </div>
                        <a href="<?= base_url('/about') ?>" class="nav-item nav-link">Tentang Kami</a>
                    </div>
                    <a href="<?= base_url('/login') ?>" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">Login</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Desa Situsari menyediakan Website Bank Sampah</h1>
                            <p class="text-white pb-3 animated zoomIn">Jangan biarkan sampah menumpuk, daftarkan diri Anda sekarang di Bank Sampah.
                                Bergabunglah dengan komunitas peduli lingkungan dan dapatkan manfaat finansial!</p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid animated zoomIn" src="<?= base_url() ?>/templates/img/banksampah.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="<?= base_url() ?>/templates/img/ecory.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">About Us</div>
                        <h2 class="mb-4">Lindungi Lingkungan dengan Bank Sampah</h2>
                        <p class="mb-4">Bank Sampah kami yang berfokus pada pengelolaan sampah dan memberikan manfaat finansial bagi masyarakat. Kami didirikan dengan tujuan untuk mengatasi masalah sampah dan menjaga kebersihan lingkungan sekitar kita.

                            Kami menyadari bahwa masalah sampah adalah masalah yang kompleks dan membutuhkan solusi yang tepat dan efektif. Oleh karena itu, kami berkomitmen untuk terus mengembangkan inovasi dan layanan yang memudahkan masyarakat untuk memilah dan mendaur ulang sampah.</p>

                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="<?= base_url('/about') ?>">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <section id="sistem" class="sistem">
            <div class="container-xxl py-6">
                <div class="container">
                    <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Sistem Kami</div>
                        <h2 class="mb-5">Kami menyediakan Bank Sampah</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-solid fa-trash fa-2x"></i>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h5 class="mb-3">Sampah</h5>
                                    <span>Bisa memilih sampah yang tersedia pada sistem untuk ditukarkan!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-chart-pie fa-2x"></i>
                                    </div>

                                </div>
                                <div class="p-5">
                                    <h5 class="mb-3">Transaksi</h5>
                                    <span>Tukar Sampahmu menjadi Poin untuk membeli produk Bumdes!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="service-item rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-chart-line fa-2x"></i>
                                    </div>

                                </div>
                                <div class="p-5">
                                    <h5 class="mb-3">Voucher</h5>
                                    <span>Alat penukaran untuk menukarkan voucher menjadi barang atau produk kami!</span>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Service End -->
        </section>


        <!-- Client Start -->
        <div class="container-xxl bg-primary my-6 py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel client-carousel">
                    <a href="#"><img class="img-fluid lg" src="<?= base_url() ?>/templates/img/ecory.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="<?= base_url() ?>/templates/img/Lambang_Kabupaten_Subang-removebg-preview.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="<?= base_url() ?>/templates/img/Politeknik_Negeri_Subang (1).jpg" alt=""></a>

                </div>
            </div>
        </div>
        <!-- Client End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Alamat Kami</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Desa Situsari, Kec. Dawuan, Kabupaten Subang, Jawa Barat 41271</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+62 3434532443</p>
                        <p><i class="fa fa-envelope me-3"></i>Hello.@ecorycorp.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Quick Link</h5>
                        <a class="btn btn-link" href="<?= base_url('/fitur') ?>">Berita</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="<?= base_url('/about') ?>">Tentang Kami</a>
                        <a class="btn btn-link" href="<?= base_url('/peta') ?>">Peta</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Desa Situsari</h5>
                        <p>Situsari adalah desa di kecamatan Dawuan, Subang, Jawa Barat, Indonesia.</p>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a>SI BARCHER</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a>Ecory Corporation</a>
                            <br>Distributed By: <a class="border-bottom" href="https://polsub.ac.id/" target="_blank">Politeknik Negeri Subang</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/templates/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/templates/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/templates/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/templates/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>/templates/js/main.js"></script>
</body>

</html>