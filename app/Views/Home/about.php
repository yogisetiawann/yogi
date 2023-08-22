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
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <a href="<?= base_url('/')?>" class="navbar-brand p-0">
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

            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-3">Tentang Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/ecory.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Tentang Kami</div>
                        <h2 class="mb-4">Lindungi Lingkungan dengan Bank Sampah</h2>
                        <p class="mb-4">Bank Sampah kami yang berfokus pada pengelolaan sampah dan memberikan manfaat finansial bagi masyarakat. Kami didirikan dengan tujuan untuk mengatasi masalah sampah dan menjaga kebersihan lingkungan sekitar kita.

                            Kami menyadari bahwa masalah sampah adalah masalah yang kompleks dan membutuhkan solusi yang tepat dan efektif. Oleh karena itu, kami berkomitmen untuk terus mengembangkan inovasi dan layanan yang memudahkan masyarakat untuk memilah dan mendaur ulang sampah.</p>

                        <!-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>