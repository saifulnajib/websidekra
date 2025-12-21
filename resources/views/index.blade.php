<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$site_title}}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.tanjungpinangkota.go.id/images/lambang_235.png" alt="SIDEKRA Logo" height="40">
                <img src="https://dekranasda.kepriprov.go.id/resources/config/icon-dkn.png" alt="SIDEKRA Logo" height="40" class="me-0">
                <i class="fas fa-hands-helping me-2"></i>SIDEKRA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#artisans">Pengrajin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
                <a href="#register" class="btn btn-outline-custom ms-lg-3">Daftar Sekarang</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">{{$hero_title}}</h1>
                    <p class="hero-subtitle">SIDEKRA menghubungkan pengrajin lokal dengan pasar global, mendorong pertumbuhan ekonomi kreatif berbasis kearifan lokal.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#products" class="btn btn-primary-custom">Jelajahi Produk</a>
                        <a href="#register" class="btn btn-outline-custom">Daftar Sebagai Pengrajin</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Kerajinan Tangan" class="img-fluid rounded-4 floating">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 my-5" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Apa yang Kami Tawarkan</h2>
                <p class="lead">SIDEKRA memberikan solusi komprehensif untuk pengembangan industri kerajinan daerah</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h3>Pasar Digital</h3>
                        <p>Platform e-commerce khusus untuk produk kerajinan daerah dengan jangkauan nasional dan internasional.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Analisis Data</h3>
                        <p>Sistem pemantauan real-time untuk pemerintah daerah dalam melacak perkembangan industri kerajinan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Pelatihan</h3>
                        <p>Program pelatihan untuk meningkatkan keterampilan pengrajin dan pengetahuan pemasaran digital.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Jaringan</h3>
                        <p>Membangun jaringan antara pengrajin, pembeli, dan pemangku kepentingan terkait.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-5 bg-light" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Produk Unggulan</h2>
                <p class="lead">Temukan berbagai kerajinan tangan berkualitas dari pengrajin lokal</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1595703013566-db085ae93c04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1588&q=80" class="card-img-top product-img" alt="Tenun Tradisional">
                        <div class="card-body">
                            <span class="product-category">Tekstil</span>
                            <h5 class="product-title">Kain Tenun Ikat Flores</h5>
                            <p class="card-text">Kain tenun tradisional dengan motif khas Flores, dibuat secara manual oleh pengrajin berpengalaman.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rp 450.000</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card">
                        <img src="https://plus.unsplash.com/premium_photo-1675719070429-bb6b722b7593?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" class="card-img-top product-img" alt="Keramik">
                        <div class="card-body">
                            <span class="product-category">Keramik</span>
                            <h5 class="product-title">Gerabah Kasongan</h5>
                            <p class="card-text">Gerabah tradisional dari Kasongan dengan desain unik dan kualitas tinggi, cocok untuk dekorasi.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rp 325.000</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1668008555730-c390ae0b0247?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=870" class="card-img-top product-img" alt="Anyaman">
                        <div class="card-body">
                            <span class="product-category">Anyaman</span>
                            <h5 class="product-title">Tas Anyaman Rotan</h5>
                            <p class="card-text">Tas anyaman rotan dengan desain modern dan kuat, hasil karya pengrajin Tasikmalaya.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rp 275.000</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card">
                        <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1075&q=80" class="card-img-top product-img" alt="Perak">
                        <div class="card-body">
                            <span class="product-category">Perhiasan</span>
                            <h5 class="product-title">Perak Kotagede</h5>
                            <p class="card-text">Perhiasan perak dengan motif tradisional Yogyakarta, dibuat oleh pengrajin Kotagede berpengalaman.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rp 650.000</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary-custom">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <!-- Artisans Section -->
    <section class="py-5 my-5" id="artisans">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Pengrajin Terbaik Kami</h2>
                <p class="lead">Bertemu dengan para pengrajin berbakat di balik produk-produk berkualitas</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="artisan-card">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Pengrajin Tenun" class="artisan-img">
                        <h4 class="artisan-name">Siti Aminah</h4>
                        <p class="artisan-location">Flores, NTT</p>
                        <p class="text-muted">Spesialis tenun ikat tradisional dengan pengalaman 15 tahun</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="artisan-card">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Pengrajin Gerabah" class="artisan-img">
                        <h4 class="artisan-name">Budi Santoso</h4>
                        <p class="artisan-location">Kasongan, Yogyakarta</p>
                        <p class="text-muted">Ahli gerabah tradisional dengan teknik turun temurun</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="artisan-card">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Pengrajin Anyaman" class="artisan-img">
                        <h4 class="artisan-name">Rina Wijaya</h4>
                        <p class="artisan-location">Tasikmalaya, Jawa Barat</p>
                        <p class="text-muted">Spesialis anyaman rotan dengan desain modern</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="artisan-card">
                        <img src="https://randomuser.me/api/portraits/men/72.jpg" alt="Pengrajin Perak" class="artisan-img">
                        <h4 class="artisan-name">Agus Suparman</h4>
                        <p class="artisan-location">Kotagede, Yogyakarta</p>
                        <p class="text-muted">Pengrajin perak dengan motif tradisional Jawa</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5 bg-light" id="news">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Berita Terkini</h2>
                <p class="lead">Update terbaru seputar dunia kerajinan dan ekonomi kreatif</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card news-card" style="border-radius: 25px 0 25px 0;">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-img" style="border-radius: 25px 0 25px 0;" alt="Pameran Kerajinan">
                        <div class="card-body">
                            <span class="news-date">15 Juni 2023</span>
                            <h5 class="news-title">Pameran Kerajinan Nasional 2023</h5>
                            <p class="card-text">SIDEKRA berpartisipasi dalam pameran kerajinan nasional yang diadakan di Jakarta Convention Center...</p>
                            <a href="#" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card news-card" style="border-radius: 25px 0 25px 0;">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" class="card-img-top news-img" style="border-radius: 25px 0 25px 0;" alt="Pelatihan Digital">
                        <div class="card-body">
                            <span class="news-date">2 Juni 2023</span>
                            <h5 class="news-title">Pelatihan Pemasaran Digital untuk Pengrajin</h5>
                            <p class="card-text">SIDEKRA menyelenggarakan pelatihan pemasaran digital gratis untuk 100 pengrajin di Jawa Tengah...</p>
                            <a href="#" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card news-card" style="border-radius: 25px 0 25px 0;">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-img" style="border-radius: 25px 0 25px 0;" alt="Ekspor Kerajinan">
                        <div class="card-body">
                            <span class="news-date">20 Mei 2023</span>
                            <h5 class="news-title">Kerajinan Indonesia Tembus Pasar Eropa</h5>
                            <p class="card-text">Produk kerajinan dari pengrajin SIDEKRA berhasil menembus pasar Eropa dengan nilai ekspor mencapai...</p>
                            <a href="#" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary-custom">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-5" id="gallery">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Galeri Kami</h2>
                <p class="lead">Lihat momen-momen inspiratif dari dunia kerajinan tangan</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="gallery-img" alt="Proses Pembuatan">
                        <div class="gallery-caption">
                            <h5>Proses Pembuatan Kerajinan</h5>
                            <p>Pengrajin sedang membuat kerajinan tangan tradisional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-video">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <span class="gallery-badge">Video</span>
                        <div class="gallery-caption">
                            <h5>Proses Tenun Tradisional</h5>
                            <p>Video tutorial membuat tenun ikat tradisional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://plus.unsplash.com/premium_photo-1758653024876-bc3f2b4b9601?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=2098" class="gallery-img" alt="Pameran Produk">
                        <div class="gallery-caption">
                            <h5>Pameran Produk Kerajinan</h5>
                            <p>Stand pameran produk kerajinan di event nasional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="gallery-img" alt="Pelatihan">
                        <div class="gallery-caption">
                            <h5>Sesi Pelatihan</h5>
                            <p>Pengrajin sedang mengikuti pelatihan keterampilan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-video">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <span class="gallery-badge">Video</span>
                        <div class="gallery-caption">
                            <h5>Wawancara Pengrajin</h5>
                            <p>Kisah inspiratif dari pengrajin sukses</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1708317033463-e1350cff1392?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=2071" class="gallery-img" alt="Produk Jadi">
                        <div class="gallery-caption">
                            <h5>Produk Jadi</h5>
                            <p>Koleksi produk kerajinan siap dipasarkan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary-custom">Lihat Galeri Lengkap</a>
            </div>
        </div>
    </section>  <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="pe-lg-4">
                        <img src="https://via.placeholder.com/150x50?text=DEKRENASDA" alt="DEKRENASDA Logo" height="40" class="mb-3">
                        <p class="mb-4">Mengembangkan dan mempromosikan kerajinan tangan lokal sebagai warisan budaya bangsa.</p>
                        <div class="d-flex">
                            <a href="#" class="text-dark me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-dark me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Menu</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#">Beranda</a></li>
                        <li class="mb-2"><a href="#">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#">Produk</a></li>
                        <li class="mb-2"><a href="#">Berita</a></li>
                        <li class="mb-2"><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="footer-heading">Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Jl. Kerajinan No. 123, Jakarta</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@dekrenasda.id</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="footer-heading">Newsletter</h5>
                    <p class="mb-3">Dapatkan update terbaru dari kami</p>
                    <form class="mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control border-end-0" placeholder="Email Anda" aria-label="Email">
                            <button class="btn btn-outline-dark border-start-0" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    <small class="text-muted">Kami tidak akan membagikan email Anda</small>
                </div>
            </div>
            <div class="mt-5 pt-4 border-top text-center">
                <p class="mb-0 small">&copy; 2023 DEKRENASDA. All rights reserved.</p>
            </div>
        </div>
    </footer>
</html>