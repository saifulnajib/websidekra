@extends('layouts.app', ['active' => 'home', 'title' => $site_title ?? 'SIDEKRA - Sistem Informasi UMKM'])

@section('content')
<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">{{ $hero_title ?? 'Selamat Datang di SIDEKRA' }}</h1>
                <p class="hero-subtitle">{{ $hero_subtitle ?? 'SIDEKRA menghubungkan pengrajin lokal dengan pasar global, mendorong pertumbuhan ekonomi kreatif berbasis kearifan lokal.' }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#products" class="btn btn-primary-custom">{{ $hero_button_text ?? 'Jelajahi Produk' }}</a>
                    <a href="#register" class="btn btn-outline-custom">Daftar Sebagai Pengrajin</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{ $hero_background_image ?? 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80' }}" alt="Kerajinan Tangan" class="img-fluid rounded-4 floating">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
    <section class="py-5 my-5" id="about">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{$about_title}}</h2>
                <p class="lead">{{ $about_subtitle }}</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Tentang SIDEKRA" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h3>Misi Kami</h3>
                    <p class="mb-4">{{ $site_description ?? 'SIDEKRA adalah platform digital yang didedikasikan untuk mendukung pengembangan Usaha Mikro Kecil Menengah (UMKM) dan kerajinan daerah di Indonesia.' }}</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Mendorong ekonomi kreatif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Melestarikan budaya lokal</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Meningkatkan kualitas produk</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Memperluas pasar</span>
                            </div>
                        </div>
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
            @forelse($latestProducts as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm hover-lift">
                    <img src="{{ Str::startsWith($product->file, 'http') ? $product->file : asset('storage/' . $product->file) }}" 
                         class="card-img-top product-img" 
                         alt="{{ $product->name }}"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        @if($product->umkmCategory)
                        <span class="product-category">{{ $product->umkmCategory->name }}</span>
                        @endif
                        <h5 class="product-title mt-2">
                             <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark stretched-link">
                                {{ $product->name }}
                             </a>
                        </h5>
                        <p class="card-text text-muted small text-truncate">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="btn btn-sm btn-outline-secondary">Detail</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk yang ditampilkan.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary-custom">Lihat Semua Produk</a>
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
                    @foreach($latestNews as $news_item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card news-card" style="border-radius: 25px 0 25px 0;">
                            <img src="{{ asset('storage/' . $news_item->featured_image_path)  ?? 'https://via.placeholder.com/400x200' }}" class="card-img-top news-img" style="border-radius: 25px 0 25px 0;" alt="{{ $news_item['title'] ?? 'Berita' }}">
                            <div class="card-body">
                                <span class="news-date">{{ $news_item['date'] ?? 'Tanggal' }}</span>
                                <h5 class="news-title">{{ $news_item['title'] ?? 'Judul Berita' }}</h5>
                                <p class="card-text">{{ $news_item['excerpt'] ?? 'Cuplikan berita...' }}</p>
                                <a href="{{ route('news.show', $news_item['slug']) }}" class="btn btn-sm btn-outline-danger">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('news.index') }}" class="btn btn-primary-custom">Lihat Semua Berita</a>
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
    </section>


    <!-- Contact Section -->
    <section class="py-5 bg-light" id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="lead">Kami siap membantu Anda</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="contact-info">
                        <div class="mb-4">
                            <i class="fas fa-map-marker-alt fa-2x text-primary-red mb-3"></i>
                            <h5>Alamat</h5>
                            <p>{{ $contact_address ?? 'Jl. Raya UMKM No. 123, Jakarta Pusat, Indonesia' }}</p>
                        </div>
                        <div class="mb-4">
                            <i class="fas fa-phone fa-2x text-primary-red mb-3"></i>
                            <h5>Telepon</h5>
                            <p>{{ $contact_phone ?? '+62 812-3456-7890' }}</p>
                        </div>
                        <div class="mb-4">
                            <i class="fas fa-envelope fa-2x text-primary-red mb-3"></i>
                            <h5>Email</h5>
                            <p>{{ $contact_email ?? 'info@sidekra.com' }}</p>
                        </div>
                        <div>
                            <i class="fas fa-clock fa-2x text-primary-red mb-3"></i>
                            <h5>Jam Kerja</h5>
                            <p>{{ $contact_hours ?? 'Senin - Jumat: 08:00 - 17:00 WIB' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Subjek" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Pesan Anda" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-red">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    margin-bottom: 1.5rem;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
}

.btn-primary-custom {
    background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
    border: none;
    color: white;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(214, 40, 40, 0.3);
    color: white;
}

.floating {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-10px);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

.product-category {
    background: var(--primary-red);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-title {
    color: var(--dark-gray);
    font-weight: 600;
    margin: 0.5rem 0;
}

.product-price {
    color: var(--primary-red);
    font-weight: 700;
    font-size: 1.1rem;
}

.news-date {
    color: var(--primary-red);
    font-size: 0.9rem;
    font-weight: 600;
}

.news-title {
    color: var(--dark-gray);
    font-weight: 600;
    margin: 0.5rem 0;
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-caption {
    transform: translateY(0);
}

.gallery-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: var(--primary-red);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

.contact-info {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.contact-form {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.contact-form .form-control {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 16px;
}

.contact-form .form-control:focus {
    border-color: var(--primary-red);
    box-shadow: 0 0 0 0.2rem rgba(214, 40, 40, 0.25);
}
</style>
@endpush