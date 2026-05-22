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
                <h2 class="section-title">{{$about_title ?? 'Tentang Kami'}}</h2>
                <p class="lead">{{ $about_subtitle ?? 'Mendukung UMKM Lokal Go Digital' }}</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    @if(!empty($about_image))
                        <img src="{{ Str::startsWith($about_image, 'http') ? $about_image : asset('storage/' . $about_image) }}" alt="Tentang SIDEKRA" class="img-fluid rounded-4 shadow">
                    @else
                        <div class="about-placeholder-img rounded-4 shadow d-flex align-items-center justify-content-center">
                            <div class="text-center text-white">
                                <i class="fas fa-store fa-5x mb-3 opacity-75"></i>
                                <h4 class="fw-bold">{{ $site_name ?? 'SIDEKRA' }}</h4>
                                <p class="opacity-75">Platform Digital UMKM</p>
                            </div>
                        </div>
                    @endif
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
                    <div class="row g-3 mt-4">
                        <div class="col-6">
                            <div class="stat-mini-card">
                                <div class="stat-mini-number">{{ $umkmCount ?? 0 }}</div>
                                <div class="stat-mini-label">UMKM Terdaftar</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-mini-card">
                                <div class="stat-mini-number">{{ $productCount ?? 0 }}</div>
                                <div class="stat-mini-label">Produk Tersedia</div>
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

<!-- UMKM Section -->
<section class="py-5 my-5" id="umkm">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">UMKM Unggulan</h2>
            <p class="lead">Kenali pelaku UMKM terdaftar di platform kami</p>
        </div>
        <div class="row g-4">
            @forelse($latestUmkmOwners as $owner)
            <div class="col-md-6 col-lg-3">
                <div class="artisan-card">
                    @if($owner->logo_path)
                        <img src="{{ Str::startsWith($owner->logo_path, 'http') ? $owner->logo_path : asset('storage/' . $owner->logo_path) }}"
                             alt="{{ $owner->business_name }}"
                             class="artisan-img">
                    @else
                        <div class="artisan-img-placeholder d-flex align-items-center justify-content-center">
                            <i class="fas fa-store fa-3x text-white opacity-75"></i>
                        </div>
                    @endif
                    <h4 class="artisan-name">{{ $owner->business_name }}</h4>
                    @if($owner->address)
                    <p class="artisan-location">{{ Str::limit($owner->address, 40) }}</p>
                    @endif
                    @if($owner->category)
                    <p class="text-muted small">Kategori: {{ $owner->category->name }}</p>
                    @endif
                    @if($owner->description)
                    <p class="text-muted small">{{ Str::limit($owner->description, 80) }}</p>
                    @endif
                    <a href="{{ route('products.index', ['owner' => $owner->business_slug]) }}" class="btn btn-sm btn-outline-primary">Lihat Produk</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-store fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada UMKM yang terdaftar dan aktif.</p>
            </div>
            @endforelse
        </div>
        @if($latestUmkmOwners->count() > 0)
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary-custom">Jelajahi Semua UMKM</a>
        </div>
        @endif
    </div>
</section>

<!-- Pengrajin Section -->
<section class="py-5" id="pengrajin">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Pengrajin Terbaik</h2>
            <p class="lead">Profil perorangan maupun kelompok ahli pembuat karya kriya</p>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($artisans as $artisan)
            <div class="col-md-6 col-lg-3">
                <div class="artisan-card text-center p-4 h-100" style="background: white; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    @if($artisan->photo_path)
                        <img src="{{ Str::startsWith($artisan->photo_path, 'http') ? $artisan->photo_path : asset('storage/' . $artisan->photo_path) }}"
                             alt="{{ $artisan->name }}"
                             style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin: 0 auto 15px auto; border: 4px solid var(--primary-red); box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    @else
                        <div style="width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, var(--primary-red), #ff6b6b); margin: 0 auto 15px auto; display: flex; align-items: center; justify-content: center; border: 4px solid #fff; box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                    @endif
                    <h5 class="fw-bold text-dark mb-1">{{ $artisan->name }}</h5>
                    <span class="badge {{ $artisan->type == 'kelompok' ? 'bg-success' : 'bg-info' }} mb-2">{{ ucfirst($artisan->type) }}</span>
                    @if($artisan->specialty)
                    <p class="text-muted small mb-2"><i class="fas fa-paint-brush me-1 text-danger"></i> {{ $artisan->specialty }}</p>
                    @endif
                    @if($artisan->experience_years)
                    <p class="text-muted small mb-2"><i class="fas fa-history me-1 text-danger"></i> {{ $artisan->experience_years }} Thn Pengalaman</p>
                    @endif
                    @if($artisan->umkmOwner)
                    <p class="text-muted small mb-3"><i class="fas fa-store me-1 text-danger"></i> <strong>{{ $artisan->umkmOwner->business_name }}</strong></p>
                    @endif
                    
                    <a href="{{ route('artisans.show', $artisan->id) }}" class="btn btn-sm btn-outline-danger rounded-pill px-4">Lihat Detail</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data pengrajin yang ditampilkan.</p>
            </div>
            @endforelse
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
                                <span class="news-date">{{ $news_item['published_at']->translatedFormat('d F Y') ?? 'Tanggal' }}</span>
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
                @foreach($galleryItems as $val)
                    <div class="col-md-6 col-lg-4">
                        <div class="gallery-item">
                            <img src="{{asset('storage/' . $val['galleryItems'][0]['path'])}}" class="gallery-img" alt="{{$val['galleryItems'][0]['caption']}}">
                            <div class="gallery-caption">
                                <h5>{{$val['title']}}</h5>
                                <p>{{$val['description']}}</p>
                                <small class="text-secondary">oleh {{$val['created_at']}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- <div class="col-md-6 col-lg-4">
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
                </div> -->
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary-custom">Lihat Galeri Lengkap</a>
            </div>
        </div>
    </section>


    <!-- Kritik & Saran Section -->
    <section class="py-5 bg-light" id="feedback">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="display:inline-block;">Kritik & Saran</h2>
                <p class="lead">Bantu kami menjadi lebih baik dengan masukan Anda</p>
            </div>

            @if(session('feedback_success'))
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2 fa-lg"></i>
                        <div>{{ session('feedback_success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="contact-info h-100">
                        <div class="mb-4">
                            <div class="feedback-icon-circle mb-3">
                                <i class="fas fa-comments fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Suara Anda Penting</h5>
                            <p class="text-muted">Setiap kritik dan saran yang Anda berikan membantu kami meningkatkan kualitas layanan SIDEKRA.</p>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="feedback-mini-icon me-3">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Saran</h6>
                                    <p class="text-muted small mb-0">Ide dan masukan untuk pengembangan platform</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <div class="feedback-mini-icon me-3">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Kritik</h6>
                                    <p class="text-muted small mb-0">Keluhan atau hal yang perlu diperbaiki</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="feedback-mini-icon me-3">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Umum</h6>
                                    <p class="text-muted small mb-0">Pesan atau pertanyaan umum lainnya</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <h6 class="fw-bold mb-3"><i class="fas fa-headset text-primary-red me-2"></i>Kontak Langsung</h6>
                            <p class="small mb-1"><i class="fas fa-map-marker-alt text-muted me-2"></i>{{ $contact_address ?? 'Jl. Raya UMKM No. 123' }}</p>
                            <p class="small mb-1"><i class="fas fa-phone text-muted me-2"></i>{{ $contact_phone ?? '+62 812-3456-7890' }}</p>
                            <p class="small mb-0"><i class="fas fa-envelope text-muted me-2"></i>{{ $contact_email ?? 'info@sidekra.com' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form" action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <h5 class="fw-bold mb-4"><i class="fas fa-paper-plane text-primary-red me-2"></i>Kirim Kritik & Saran</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="feedback-name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" id="feedback-name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="feedback-email" class="form-label fw-semibold">Email</label>
                                <input type="email" id="feedback-email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="feedback-subject" class="form-label fw-semibold">Subjek <span class="text-danger">*</span></label>
                                <input type="text" id="feedback-subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Topik pesan Anda" value="{{ old('subject') }}" required>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="feedback-type" class="form-label fw-semibold">Tipe <span class="text-danger">*</span></label>
                                <select id="feedback-type" name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="umum" {{ old('type') == 'umum' ? 'selected' : '' }}>Umum</option>
                                    <option value="kritik" {{ old('type') == 'kritik' ? 'selected' : '' }}>Kritik</option>
                                    <option value="saran" {{ old('type') == 'saran' ? 'selected' : '' }}>Saran</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="feedback-message" class="form-label fw-semibold">Pesan <span class="text-danger">*</span></label>
                                <textarea id="feedback-message" name="message" class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="Tulis kritik, saran, atau pesan Anda di sini..." required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-shield-alt text-primary-red me-1"></i>Keamanan <span class="text-danger">*</span>
                                </label>
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                @error('g-recaptcha-response')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-red w-100 py-2">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
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

/* About Section Placeholder */
.about-placeholder-img {
    height: 350px;
    background: linear-gradient(135deg, var(--primary-red, #d62828), var(--dark-red, #a01010));
    border-radius: 1rem;
}

/* Artisan/UMKM Card - Placeholder when no logo */
.artisan-img-placeholder {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-red, #d62828), var(--dark-red, #a01010));
    margin: 0 auto 1rem;
}

/* Stats mini cards in About section */
.stat-mini-card {
    background: linear-gradient(135deg, var(--primary-red, #d62828), var(--dark-red, #a01010));
    color: white;
    border-radius: 12px;
    padding: 1rem 1.25rem;
    text-align: center;
    box-shadow: 0 4px 15px rgba(214, 40, 40, 0.25);
}

.stat-mini-number {
    font-size: 1.75rem;
    font-weight: 800;
    line-height: 1.1;
}

.stat-mini-label {
    font-size: 0.8rem;
    opacity: 0.9;
    margin-top: 0.25rem;
}

/* Feedback Section */
.feedback-icon-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 5px 15px rgba(214, 40, 40, 0.3);
}

.feedback-mini-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 10px;
    background: var(--light-red, #f8edeb);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-red);
    font-size: 1rem;
}

.contact-form .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 16px;
}

.contact-form .form-select:focus {
    border-color: var(--primary-red);
    box-shadow: 0 0 0 0.2rem rgba(214, 40, 40, 0.25);
}

.contact-form .form-label {
    font-size: 0.9rem;
    color: #495057;
}
</style>
@endpush

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush