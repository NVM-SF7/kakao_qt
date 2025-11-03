<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Kakao - Sistem Informasi Perkebunan</title>

    <link rel="icon" type="image/png" sizes="16x16" href='{{ asset('/images/favicon.png') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-hero {
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 3rem;
            color: #28a745;
            margin-bottom: 1.5rem;
            display: inline-block;
            padding: 20px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            width: 100px;
            height: 100px;
            line-height: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: #2c3e50;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .stats-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            color: #6c757d;
            font-weight: 500;
        }

        .cta-section {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .navbar-brand {
            color: #28a745 !important;
        }

        .navbar-custom .nav-link {
            color: #2c3e50 !important;
            font-weight: 500;
        }

        .dashboard-preview {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="ti-bar-chart-alt"></i> QR Kakao
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link btn btn-success text-white px-3 ml-2"
                                href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="nav-link btn btn-success text-white px-3 ml-2" href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Sistem Informasi Perkebunan Terpadu</h1>
                        <p class="hero-subtitle">Kelola data perkebunan, petani, dan hasil panen dengan mudah dan
                            efisien menggunakan teknologi modern.</p>
                        <div class="mt-4">
                            <a href="#features" class="btn btn-light btn-hero mr-3">
                                <i class="ti-eye mr-2"></i>Lihat Fitur
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="{{ asset('images/public/landing_page.png') }}" alt="Dashboard Preview"
                            class="dashboard-preview img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5" style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title">Fitur Unggulan</h2>
            <p class="section-subtitle">Dapatkan kemudahan dalam mengelola seluruh aspek perkebunan Anda dengan
                fitur-fitur canggih yang kami sediakan.</p>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-dashboard"></i>
                        </div>
                        <h4>Dashboard Analitik</h4>
                        <p>Monitor seluruh aktivitas perkebunan dalam satu dashboard yang informatif dan mudah dipahami.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-user"></i>
                        </div>
                        <h4>Manajemen Petani</h4>
                        <p>Kelola data petani, informasi kontak, dan riwayat aktivitas dengan sistem yang terintegrasi.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-camera"></i>
                        </div>
                        <h4>QR Code</h4>
                        <p>Mendukung penampilan dan pengisian informasi kakao menggunakan QR code</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-bar-chart"></i>
                        </div>
                        <h4>Laporan Taksasi</h4>
                        <p>Dapatkan laporan detail tentang estimasi hasil panen dan analisis produktivitas kebun.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-truck"></i>
                        </div>
                        <h4>Tracking Tanaman</h4>
                        <p>Pantau pertumbuhan dan kondisi tanaman dari pembibitan hingga masa panen.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="ti-stats-up"></i>
                        </div>
                        <h4>Analisis Data</h4>
                        <p>Analisis mendalam dengan grafik dan statistik untuk pengambilan keputusan yang tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    {{-- <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Petani Terdaftar</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Hektar Lahan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Blok Jalur</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">99%</div>
                        <div class="stat-label">Akurasi Data</div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- About Section -->
<section id="about" style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title text-left">Mengapa Dibuat QR Cocoa?</h2>
                <p class="mb-4">
                    QR Cocoa merupakan solusi digital yang dikembangkan khusus untuk mendukung pengolahan data dalam program <strong>CSR Kakao COMDEV</strong>. Aplikasi ini menjadi bagian integral dari inisiatif <strong>Kawasan Integrasi Kakao</strong>, dengan tujuan meningkatkan efisiensi, transparansi, dan keberlanjutan dalam manajemen perkebunan kakao di tingkat tapak.
                </p>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-check-box text-success mr-3" style="font-size: 1.5rem;"></i>
                            <span>Digitalisasi Data Taksasi</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-check-box text-success mr-3" style="font-size: 1.5rem;"></i>
                            <span>Integrasi Informasi Tanaman</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-check-box text-success mr-3" style="font-size: 1.5rem;"></i>
                            <span>Mendukung Program CSR & COMDEV</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-check-box text-success mr-3" style="font-size: 1.5rem;"></i>
                            <span>Akses Data via QR Code</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="ti-barcode"></i> QR Cocoa</h5>
                    <p>Dikembangkan oleh Kawasan Integrasi Kakao sebagai solusi digitalisasi pertanian masa kini.</p>
                </div>
                <div class="col-md-6">
                    <h6>Kontak</h6>
                    <p><i class="ti-email mr-2"></i> info@qrcocoa.id<br>
                        <i class="ti-mobile mr-2"></i> +62 812-3456-7890<br>
                        <i class="ti-location-pin mr-2"></i> Tanjung Selor, Kalimantan Utara
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2025 QR Cocoa. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 4 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Smooth scrolling for navigation links
        $(document).ready(function() {
            $("a[href^='#']").on('click', function(e) {
                e.preventDefault();
                var target = this.hash;
                var $target = $(target);

                if ($target.length) {
                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top - 70
                    }, 900, 'swing');
                }
            });

            // Navbar background on scroll
            $(window).scroll(function() {
                if ($(window).scrollTop() > 50) {
                    $('.navbar-custom').addClass('scrolled');
                } else {
                    $('.navbar-custom').removeClass('scrolled');
                }
            });
        });

        // Counter animation
        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start) + (obj.innerHTML.includes('%') ? '%' : obj
                    .innerHTML.includes('+') ? '+' : '');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Trigger counter animation when stats section is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach((counter) => {
                        const target = counter.innerHTML;
                        const numTarget = parseInt(target.replace(/\D/g, ''));
                        animateValue(counter, 0, numTarget, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(document.querySelector('.stats-section'));
    </script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sweetalert/sweetalert.min.js') }}""></script>
</body>

</html>
