<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="<?= base_url('landing/') ?>assets/vendors/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('landing/') ?>assets/vendors/slick-carousel/slick.css">
    <link rel="stylesheet" href="<?= base_url('landing/') ?>assets/vendors/slick-carousel/slick-theme.css">
    <link rel="stylesheet" href="<?= base_url('landing/') ?>assets/css/style.css">
    <script src="<?= base_url('landing/') ?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url('landing/') ?>assets/js/loader.js"></script>
</head>

<body>
    <div class="oleez-loader"></div>
    <header class="oleez-header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="nav nav-actions d-lg-none ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="searchModal">
                        <img src="<?= base_url('landing/') ?>assets/images/search.svg" alt="search">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
                aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>

    <main>
        <section>
            <div class="container wow fadeIn">
                <div id="oleezLandingCarousel" class="oleez-landing-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="<?= base_url('landing/') ?>assets/images/logo1.svg" alt="First slide" class="w-100">
                            <div class="carousel-caption ng-light">
                                <h2 data-animation="animated fadeInLeft"><span>Selamat</span></h2>
                                <h2 data-animation="animated fadeInRight"><span>Datang</span></h2> -->
                                <a href="<?= base_url('auth') ?>" class="carousel-item-link" data-animation="animated fadeInLeft">MASUK</a>
                                <a href="<?= base_url('auth/register') ?>" class="carousel-item-link" data-animation="animated fadeInRight">DAFTAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="oleez-landing-section oleez-landing-section-about">
            <div class="container">
                <div class="oleez-landing-section-content">
                    <div class="row landing-about-content wow fadeInUp">
                        <div class="col-md-6">
                            <h2>Aplikasi Pelaporan Pengaduan Masyarakat</h2>
                        </div>
                        <div class="col-md-6">
                            <p>Mendengarkan dan menyelesaikan pengaduan anda dengan cepat serta memberikan kenyamanan dan kemudahan untuk anda dalam menyampaikan pengaduan anda</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 landing-about-feature wow fadeInUp">
                            <img src="<?= base_url('landing/') ?>assets/images/icon_1.svg" alt="document" class="about-feature-icon">
                            <h5 class="about-feature-title">Lebih Cepat Dan Mudah</h5>
                            <p class="about-feature-description">Aplikasi kami memberikan kemudahan untuk anda dalam menyampaikan pengaduan berbagai hal melalui online</p> 
                        </div>
                        <div class="col-md-4 landing-about-feature wow fadeInUp">
                            <img src="<?= base_url('landing/') ?>assets/images/icon_2.svg" alt="document" class="about-feature-icon">
                            <h5 class="about-feature-title">Memberi Kenyamanan</h5>
                            <p class="about-feature-description">Kami memberi kenyamanan untuk anda dalam menyampaikan pengaduan dari rumah saja</p>
                        </div>
                        <div class="col-md-4 landing-about-feature wow fadeInUp">
                            <img src="<?= base_url('landing/') ?>assets/images/icon_3.svg" alt="document" class="about-feature-icon">
                            <h5 class="about-feature-title">Penyelesaian Segera</h5>
                            <p class="about-feature-description">Kami akan mengoptimalkan agar pengaduan anda dapat terselesaikan dengan cepat</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="oleez-footer wow fadeInUp bg-light">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-6">
                        <p class="footer-intro-text text-dark">Sampaikan pengaduan anda kepada kami, karena suara anda adalah perubahan</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">TELEPON</h6>
                                <a href="https://wa.link/2gxxch" rel="dofollow" target="_blank" title="hubungi kami"><p class="widget-content text-dark">+62 83133909901</p>
                                </a> 
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">EMAIL</h6>
                                <p class="widget-content text-dark">pengaduanmasyarakatku@gmail.com</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">TWITTER</h6>
                                <a href="https://www.twitter.com/pengaduanku" rel="dofollow" target="_blank" title="ikuti twitter"><p class="widget-content text-dark">pengaduanmasyarakatku</p>
                                </a>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">INSTAGRAM</h6>
                                <a href="https://www.instagram.com/pengaduanmasyarakatku" rel="dofollow" target="_blank" title="ikuti instgram "><p class="widget-content text-dark">pengaduanmasyarakatku</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-text">
                <p class="mb-md-0 text-dark">Copyright &copy; 2023 Nia Nur Afisah</p>
            </div>
        </div>
    </section>
    </main>

    <!-- Modals -->
    <!-- Full screen search box -->
    <script src="<?= base_url('landing/') ?>assets/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url('landing/') ?>assets/vendors/wowjs/wow.min.js"></script>
    <script src="<?= base_url('landing/') ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('landing/') ?>assets/vendors/slick-carousel/slick.min.js"></script>
    <script src="<?= base_url('landing/') ?>assets/js/main.js"></script>
    <script src="<?= base_url('landing/') ?>assets/js/landing.js"></script>
    <script>
        new WOW({mobile: false}).init();
    </script>
</body>


</html>