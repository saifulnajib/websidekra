@props(['copyright' => '© 2025 SIDEKRA. All rights reserved.'])

<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://www.tanjungpinangkota.go.id/images/lambang_235.png" alt="SIDEKRA Logo" height="40" class="me-2">
                    <img src="https://dekranasda.kepriprov.go.id/resources/config/icon-dkn.png" alt="SIDEKRA Logo" height="40" class="me-2">
                    <span class="h5 mb-0">SIDEKRA</span>
                </div>
                <p class="mb-3">Platform digital untuk mendukung pengembangan Usaha Kecil Menengah (UMKM) dan kerajinan daerah.</p>
                <div class="d-flex">
                    <a href="#" class="social-icon me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon me-2"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h6 class="footer-heading">Platform</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="{{ route('news.index') }}">Berita</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h6 class="footer-heading">Dukungan</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    <li><a href="#">Bantuan</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-4 mb-4">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="mb-2">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Jl. Raya UMKM No. 123, Jakarta Pusat
                </div>
                <div class="mb-2">
                    <i class="fas fa-phone me-2"></i>
                    +62 812-3456-7890
                </div>
                <div class="mb-2">
                    <i class="fas fa-envelope me-2"></i>
                    info@sidekra.com
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">{{ $copyright }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <small class="text-muted">Dikelola oleh DEKRENASDA Provinsi Kepulauan Riau</small>
            </div>
        </div>
    </div>
</footer>

<style>
.social-icon {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items-center;
    justify-content: center;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    margin-right: 10px;
    transition: background-color 0.3s;
    color: white;
    text-decoration: none;
}

.social-icon:hover {
    background-color: var(--primary-red);
    color: white;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.7);
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
</style>