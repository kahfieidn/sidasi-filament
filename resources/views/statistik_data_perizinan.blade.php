<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidasi - DPMPTSP Kepriprov</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <link rel="stylesheet" href="assets/css/vendor/icofont.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="assets/css/plugins/selectric.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

</head>


<body>

    <!-- Modal -->
    <div class="modal offcanvas-modal fade" id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- offcanvas-menu start -->
                <nav id="offcanvas-menu" class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="/">Homepage</a>
                            <!-- add your sub menu here -->
                        </li>
                        <li>
                            <a href="/data" target="_blank">Statistik Data Perizinan</a>
                        </li>
                        <li>
                            <a href="{{route('statistik_data_investasi')}}">Statistik Data Investasi</a>
                        </li>
                        <li>
                            <a href="/app">Login Sebagai Pengelola</a>
                        </li>
                    </ul>

                    <div class="offcanvas-social">
                        <ul>
                            <li>
                                <a href="#"><i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-skype"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- offcanvas-menu end -->
            </div>
        </div>
    </div>

    <header class="header">
        <div class="header-top bg-primary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-lg-4 d-none d-lg-block">
                        <ul class="header-social-links d-flex flex-wrap align-items-center">
                            <li class="social-link-item"><a href="#" class="social-link"><i class="icofont-facebook"></i></a></li>
                            <li class="social-link-item"><a href="#" class="social-link"><i class="icofont-twitter"></i></a></li>
                            <li class="social-link-item"><a href="#" class="social-link"><i class="icofont-skype"></i></a></li>
                            <li class="social-link-item"><a href="#" class="social-link"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-none d-md-block">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <ul class="select-box d-flex flex-wrap align-items-center justify-content-center justify-content-md-end">
                            <li class="select-item"><a href="https://wa.me/6281221212011">Support: +62812-2121-2011</a></li>
                            <li class="select-item">
                                <select class="form-select w-auto">
                                    <option selected>Indonesia</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="active-sticky" class="header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="/" class="brand-logo">
                            <img style="width: 150px;" src="assets/logo-sidasi.png" alt="brand logo" />
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-warning btn-hover-warning d-none d-sm-inline-block d-lg-none" href="/app">Login Sebagai Pengelola <i class="icofont-arrow-right"></i>
                        </a>

                        <button type="button" class="btn btn-warning offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                        <nav class="d-none d-lg-block">
                            <ul class="main-menu text-end">
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="/">Homepage</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="/data" target="_blank">Statistik Data Perizinan</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="{{route('statistik_data_investasi')}}">
                                        Statistik Data Investasi
                                    </a>
                                </li>
                                <li class="main-menu-item">
                                    <a target="_blank" class="main-menu-link" href="https://b4zx1h69mdc.typeform.com/to/qBYYwJmz">Umpan Balik</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="btn btn-warning btn-hover-warning btn-lg" href="/app">Login Sebagai Pengelola <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- bread crumb section start -->

    <section class="bread-crumb-section">
        <img class="shape shape1" src="assets/images/bread/1.png" alt="images_not_found">
        <img class="shape shape2" src="assets/images/bread/2.png" alt="images_not_found">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title text-center">Statistik Data Perizinan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Statistik Data Perizinan</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- bread crumb section end -->


    <!-- service details start -->
    <section class="service-details-section">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-12 mb-7">
                    <div class="service-details">
                        <div class="service-details-list">

                            <div class=" mx-auto mb-7">
                                <div class="page-not-found-content">
                                    <h3 class="title">
                                        Under maintanance!
                                    </h3>
                                    <p>Laman ini sedang diperbarui untuk pengembangan fitur.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- service details end -->

    <footer class="footer-section position-relative">
        <img class="footer-bg-shape" src="assets/images/footer/shape.png" alt="images_notFound" />
        <img class="path-shape" src="assets/images/footer/path-shape.png" alt="images_notFound" />

        <svg class="path-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 126.82 303.68">
            <defs>
                <radialGradient id="radial-gradient" cx="78.77" cy="6322.87" r="43.8" gradientTransform="translate(0 -3383.39) scale(1 0.58)" gradientUnits="userSpaceOnUse">
                    <stop offset="0.16" stop-color="#2647c8" />
                    <stop offset="0.17" stop-color="#294ac9" />
                    <stop offset="0.29" stop-color="#6179d7" />
                    <stop offset="0.42" stop-color="#92a2e3" />
                    <stop offset="0.54" stop-color="#b9c4ed" />
                    <stop offset="0.66" stop-color="#d8def5" />
                    <stop offset="0.78" stop-color="#edf0fb" />
                    <stop offset="0.9" stop-color="#fbfbfe" />
                    <stop offset="1" stop-color="#fff" />
                </radialGradient>
                <linearGradient id="linear-gradient" x1="45.02" y1="258.73" x2="112.52" y2="258.73" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#fff" />
                    <stop offset="0.27" stop-color="#f4f7fd" />
                    <stop offset="0.74" stop-color="#d8e0f8" />
                    <stop offset="1" stop-color="#c5d2f4" />
                </linearGradient>
                <linearGradient id="linear-gradient-2" x1="43.77" y1="240.52" x2="113.76" y2="240.52" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#c5d2f4" />
                    <stop offset="0.26" stop-color="#d8e0f8" />
                    <stop offset="0.73" stop-color="#f4f7fd" />
                    <stop offset="1" stop-color="#fff" />
                </linearGradient>
            </defs>
            <g class="cls-1">
                <path class="cls-2" d="M111.1,297c17.86-10.25,17.86-27,0-37.28s-47-10.25-64.74,0-17.75,27,0,37.28S93.25,307.24,111.1,297Z" transform="translate(0 -1)" />
                <path class="cls-3" d="M102.64,283.06c13.18-7.57,13.18-42.77,0-50.33s-34.69-7.57-47.79,0-13.11,42.76,0,50.33c6.47,3.74,15,7.3,23.57,7.35C87.18,290.45,96,286.89,102.64,283.06Z" transform="translate(0 -1)" />
                <path class="cls-4" d="M113.76,240.86c0-.23,0-.45,0-.68v-5.26h-1.35c-1.59-3.18-4.54-6.18-8.88-8.67-13.67-7.85-36-7.85-49.58,0-4.32,2.49-7.25,5.49-8.83,8.67H43.89v3.9a12.1,12.1,0,0,0,0,3.4v.09h0c.7,4.56,4,9,10.05,12.48,13.6,7.85,35.91,7.85,49.58,0,6-3.47,9.41-7.92,10.11-12.48h.12Z" transform="translate(0 -1)" />
                <path class="cls-5" d="M103.53,249.77c13.68-7.85,13.68-20.69,0-28.54s-36-7.85-49.58,0-13.6,20.69,0,28.54S89.86,257.63,103.53,249.77Z" transform="translate(0 -1)" />
                <path class="cls-6" d="M101.52,248.61c12.56-7.21,12.56-19,0-26.22s-33.06-7.21-45.55,0-12.49,19,0,26.22S89,255.83,101.52,248.61Z" transform="translate(0 -1)" />
                <path class="cls-7" d="M97.39,249.6c10.28-5.91,10.28-15.57,0-21.47s-27.06-5.9-37.28,0-10.23,15.56,0,21.47S87.11,255.5,97.39,249.6Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M80.79,242.55c.16-14.78.32-17.18.48-32,.07-7,.28-11.46-.21-18.41a95.41,95.41,0,0,0-3.73-19.67c-3.91-13.64-7.15-27.08-8.31-41.27a266.63,266.63,0,0,1,.2-41.63C70.4,73.74,72.55,58,74.74,42.19c.22-1.56-2.16-2.23-2.38-.66-3.85,27.69-7.7,55.65-6.22,83.68a180.79,180.79,0,0,0,6.69,40.73c1.91,6.63,4,13.22,5.09,20.05,1.07,7,1,11.67.94,18.75-.17,16.73-.36,21.08-.54,37.81a1.24,1.24,0,0,0,2.47,0Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M68.94,135.59c-5.26-5.31-10.58-10.8-14.13-17.44a28.67,28.67,0,0,1-3.46-11c-.39-4.37.39-8.74.88-13.07A37.33,37.33,0,0,0,47.76,71.3c-4.17-7.87-9.13-15.38-13.95-22.86-.86-1.33-3-.1-2.14,1.25,4.9,7.59,10,15.23,14.16,23.25A35.23,35.23,0,0,1,50,85.53c.43,4.37-.33,8.74-.84,13.07-.89,7.68,0,14.67,3.84,21.47,3.65,6.52,8.93,12,14.15,17.27,1.12,1.14,2.87-.61,1.75-1.75Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M72.51,153.29C74,142.2,86.55,136.48,93.38,129a52.06,52.06,0,0,0,13.21-31.12c.11-1.59-2.36-1.58-2.48,0a49.23,49.23,0,0,1-15.79,32.68c-7.2,6.58-16.9,12.23-18.28,22.78-.21,1.58,2.27,1.56,2.47,0Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M40.5,34.88c-1.13-7-7.14-12.12-12.74-16.53C19.15,11.57,10.33,4.67,0,1A77.52,77.52,0,0,1,8.61,22.43c1.24,5.25,2.11,11,5.84,14.88,5.2,5.42,15,6.31,17.55,13.39l5.43,7.74C36.41,50.53,41.76,42.76,40.5,34.88Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M85.33,14.47c-4,9.36-17.15,12.58-20.31,22.27-3.26,10,6.11,20.72,3.46,30.91L71,68.94c7.28-6.46,11.55-15.8,13.43-25.35S86,24.19,85.33,14.47Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M126.82,52.12C118.59,57.29,112.24,64.9,106,72.38c-1.71,2.05-3.46,4.18-4.19,6.75a19.37,19.37,0,0,0-.38,6.27l1.11,23.2.69,3c3.68-5.89,13.56-6.08,16.07-12.56.91-2.33.56-4.93.33-7.42A75.29,75.29,0,0,1,126.82,52.12Z" transform="translate(0 -1)" />
            </g>

        </svg>

        <!-- <img class="shape" src="assets/images/footer/1.png" alt="images_notFound" /> -->
        <div class="footer-top position-relative">
            <div class="container">

                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                        <div class="footer-card">
                            <div class="footer-row">
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <a class="footer-logo" href="/">
                                            <img style="width: 200px;" src="assets/logo-sidasi.png" alt="logo_not_found" />
                                        </a>

                                        <ul class="adress">
                                            <li>
                                                <span class="icon"><i class="icofont-ui-call"></i></span>
                                                <a href="https://wa.me/6281221212011">(+62) 812-2121-2011</a>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="icofont-send-mail"></i></span>
                                                <a href="mailto:it@kepri.pro">it@kepri.pro</a>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="icofont-google-map"></i></span>
                                                Jl. Sultan Mansyur Syah Pulau Dompak (Gedung Wanita Raja Saleha)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <h4 class="title">Link</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a class="footer-link" href="https://dpmptsp.kepriprov.go.id/">
                                                    <i class="icofont-rounded-double-right"></i>DPMPTSP Provinsi Kepulauan Riau</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <h4 class="title">Information</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a class="footer-link" href="https://www.instagram.com/dpmptspprovinsikepri/">
                                                    <i class="icofont-rounded-double-right"></i>Instagram</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="https://www.facebook.com/people/Dpmptsp-Provinsi-Kepulauan-Riau/100091329853958/?refid=52">
                                                    <i class="icofont-rounded-double-right"></i>Facebook</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coppy right satrt -->
        <div class="copy-right-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            Copyright &copy;
                            <span id="currentYear"></span>
                            Made With
                            <i class="icofont-heart"></i>
                            By
                            <a href="/">IT DPMPTSP Kepriprov</a>
                            All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- coppy right end -->
    </footer>


    <!-- Scripts -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/ajax-contact.js"></script>
    <script src="assets/js/plugins/ajax-mailchimp.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/scroll-up.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/jquery.selectric.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>