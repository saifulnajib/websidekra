@props(['active' => ''])

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="https://www.tanjungpinangkota.go.id/images/lambang_235.png" alt="SIDEKRA Logo" height="40">
            <img src="https://dekranasda.kepriprov.go.id/resources/config/icon-dkn.png" alt="SIDEKRA Logo" height="40"
                class="me-0">
            <i class="fas fa-hands-helping me-2"></i>SIDEKRA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'products' ? 'active' : '' }}"
                        href="{{ route('products.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'artisans' ? 'active' : '' }}" href="#artisans">Pengrajin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'news' ? 'active' : '' }}"
                        href="{{ route('news.index') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'gallery' ? 'active' : '' }}" href="#gallery">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'contact' ? 'active' : '' }}" href="#contact">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>