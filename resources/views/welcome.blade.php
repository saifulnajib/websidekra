<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEKRENASDA - Dewan Kerajinan Nasional Daerah</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-red: #d62828;
            --dark-red: #ba181b;
            --light-red: #f8edeb;
            --dark-gray: #212529;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-gray);
        }
        
        .bg-primary-red {
            background-color: var(--primary-red);
        }
        
        .text-primary-red {
            color: var(--primary-red);
        }
        
        .btn-primary-red {
            background-color: var(--primary-red);
            color: white;
            border: none;
        }
        
        .btn-primary-red:hover {
            background-color: var(--dark-red);
            color: white;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80');
            background-size: cover;
            background-position: center;
            min-height: 500px;
            color: white;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--primary-red);
        }
        
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        
        .news-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .news-img {
            height: 180px;
            object-fit: cover;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 200px;
        }
        
        .gallery-item img {
            transition: transform 0.3s;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(214, 40, 40, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .widget-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        footer {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            border-top: 1px solid rgba(0,0,0,0.1);
        }
        
        .footer-links a {
            color: var(--dark-gray);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--primary-red);
        }
        
        .footer-heading {
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .footer-heading:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary-red);
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: background-color 0.3s;
        }
        
        .social-icon:hover {
            background-color: var(--primary-red);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://dekranasda.kepriprov.go.id/resources/config/icon-dkn.png alt="DEKRENASDA Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="#" class="btn btn-primary-red">Login Anggota</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Dewan Kerajinan Nasional Daerah</h1>
                    <p class="lead mb-4">Mengembangkan dan mempromosikan kerajinan tangan lokal sebagai warisan budaya bangsa dan penggerak ekonomi kreatif daerah.</p>
                    <a href="#" class="btn btn-primary-red btn-lg me-2">Jelajahi Produk</a>
                    <a href="#" class="btn btn-outline-light btn-lg">Tentang Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Tentang DEKRENASDA" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Tentang DEKRENASDA</h2>
                    <p>Dewan Kerajinan Nasional Daerah (DEKRENASDA) adalah organisasi yang bertujuan untuk mengembangkan, mempromosikan, dan melestarikan kerajinan tangan lokal sebagai bagian dari warisan budaya bangsa dan penggerak ekonomi kreatif di daerah.</p>
                    <p>Kami bekerja sama dengan pengrajin lokal, pemerintah daerah, dan berbagai pemangku kepentingan untuk meningkatkan kualitas produk kerajinan, memperluas pasar, dan menciptakan lapangan kerja yang berkelanjutan.</p>
                    <a href="#" class="btn btn-primary-red">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Showcase -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title">Etalase Produk</h2>
                    <p>Produk-produk kerajinan unggulan dari pengrajin daerah binaan DEKRENASDA</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top product-img" alt="Produk 1">
                        <div class="card-body">
                            <h5 class="card-title">Tenun Ikat Flores</h5>
                            <p class="card-text text-muted">Kain tenun tradisional dari Nusa Tenggara Timur</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary-red">Rp 450.000</span>
                                <a href="#" class="btn btn-sm btn-primary-red">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top product-img" alt="Produk 2">
                        <div class="card-body">
                            <h5 class="card-title">Keramik Kasongan</h5>
                            <p class="card-text text-muted">Gerabah tradisional dari Yogyakarta</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary-red">Rp 325.000</span>
                                <a href="#" class="btn btn-sm btn-primary-red">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top product-img" alt="Produk 3">
                        <div class="card-body">
                            <h5 class="card-title">Songket Palembang</h5>
                            <p class="card-text text-muted">Kain songket bermotif emas khas Sumatera Selatan</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary-red">Rp 1.250.000</span>
                                <a href="#" class="btn btn-sm btn-primary-red">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top product-img" alt="Produk 4">
                        <div class="card-body">
                            <h5 class="card-title">Ukiran Jepara</h5>
                            <p class="card-text text-muted">Furnitur kayu ukir khas Jawa Tengah</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary-red">Rp 2.750.000</span>
                                <a href="#" class="btn btn-sm btn-primary-red">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-primary-red">Lihat Semua Produk</a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title">Berita Terkini</h2>
                    <p>Informasi terbaru seputar kegiatan dan perkembangan DEKRENASDA</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- News 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="news-card card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top news-img" alt="Berita 1">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <span class="badge bg-primary-red me-2">Event</span>
                                <small class="text-muted">15 Juni 2023</small>
                            </div>
                            <h5 class="card-title">Pameran Kerajinan Nasional 2023</h5>
                            <p class="card-text">DEKRENASDA akan mengadakan pameran kerajinan nasional di Jakarta Convention Center pada bulan Agustus mendatang.</p>
                            <a href="#" class="btn btn-sm btn-primary-red">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- News 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="news-card card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top news-img" alt="Berita 2">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <span class="badge bg-primary-red me-2">Pelatihan</span>
                                <small class="text-muted">5 Juni 2023</small>
                            </div>
                            <h5 class="card-title">Pelatihan Peningkatan Kualitas Produk Kerajinan</h5>
                            <p class="card-text">DEKRENASDA menyelenggarakan pelatihan untuk meningkatkan kualitas produk kerajinan bagi pengrajin binaan.</p>
                            <a href="#" class="btn btn-sm btn-primary-red">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- News 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="news-card card h-100">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top news-img" alt="Berita 3">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <span class="badge bg-primary-red me-2">Prestasi</span>
                                <small class="text-muted">22 Mei 2023</small>
                            </div>
                            <h5 class="card-title">Produk Kerajinan Daerah Raih Penghargaan Internasional</h5>
                            <p class="card-text">Produk kerajinan binaan DEKRENASDA meraih penghargaan di ajang International Craft Exhibition di Paris.</p>
                            <a href="#" class="btn btn-sm btn-primary-red">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-primary-red">Lihat Semua Berita</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title">Galeri Foto & Video</h2>
                    <p>Dokumentasi kegiatan dan produk kerajinan DEKRENASDA</p>
                </div>
            </div>
            <div class="row g-3">
                <!-- Photo 1 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 1">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 2">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 3">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 4 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 4">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 5 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 5">
                        <div class="gallery-overlay">
                            <i class="fas fa-play text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 6 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 6">
                        <div class="gallery-overlay">
                            <i class="fas fa-play text-white fs-4"></i>
                        </div>
                    </div>
                </div>
                <!-- Photo 7 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Galeri 7">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>