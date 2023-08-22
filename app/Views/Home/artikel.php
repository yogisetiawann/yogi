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
                    <h1 class="text-white animated zoomIn mb-3">Artikel</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="<?= base_url('/berita') ?>">Berita</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
        <!-- Navbar & Hero End -->

        <!-- CONTENT MU DISINI  -->
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs">
                <div class="page-header d-flex align-items-center" style="background-image: url('');">
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 text-center">
                                <h2>Blog</h2>
                                <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <div class="container">
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ol>
                    </div>
                </nav>
            </div><!-- End Breadcrumbs -->

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4 posts-list">

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Politics</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Sports</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Allisa Mayer</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jun 5, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Entertainment</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Mark Dower</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jun 22, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Sports</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Non rem rerum nam cum quo minus olor distincti</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-4.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Lisa Neymar</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jun 30, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-5.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Politics</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Accusamus quaerat aliquam qui debitis facilis consequatur</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-5.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Denis Peterson</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 30, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="assets/img/blog/blog-6.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">Entertainment</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author-6.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author-list">Mika Lendon</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Feb 14, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>
            </section><!-- End Blog Section -->

        </main><!-- End #main -->
        <!-- CONTENT MU DIATAS -->

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
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>