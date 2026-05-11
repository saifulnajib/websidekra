@extends('layouts.app', ['title' => 'Buku Panduan SIDEKRA'])

@section('content')
<div class="container py-5 my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h1 class="h3 fw-bold">Buku Panduan Penggunaan Aplikasi</h1>
        <button onclick="window.print()" class="btn btn-primary-custom">
            <i class="fas fa-file-pdf me-2"></i>Ekspor ke PDF
        </button>
    </div>

    <!-- Halaman Panduan Mulai -->
    <div class="guide-book bg-white p-5 shadow-sm rounded-4">
        
        <div class="text-center mb-5 border-bottom pb-4">
            <h2 class="fw-bold text-uppercase" style="color: var(--primary-red);">Buku Panduan SIDEKRA</h2>
            <p class="text-muted lead">Sistem Informasi UMKM Daerah</p>
        </div>

        <!-- Section 1: Halaman Utama (Landing Page) -->
        <div class="guide-section mb-5 page-break-after">
            <h3 class="mb-3 text-dark border-start border-4 border-danger ps-3">1. Halaman Utama (Landing Page)</h3>
            <p>Halaman utama ini adalah gerbang depan platform SIDEKRA yang dapat diakses oleh masyarakat umum. Pada halaman ini, pengunjung dapat menemukan berbagai informasi, antara lain:</p>
            <ul>
                <li><strong>Informasi UMKM:</strong> Misi platform, jumlah UMKM terdaftar, dan jumlah produk tersedia.</li>
                <li><strong>Produk Unggulan:</strong> Katalog produk-produk dari berbagai UMKM.</li>
                <li><strong>UMKM Terdaftar:</strong> Profil-profil UMKM yang bergabung dalam platform.</li>
                <li><strong>Berita & Galeri:</strong> Informasi terkini dan galeri inspiratif.</li>
            </ul>
            
            <div class="text-center my-4">
                <img src="{{ asset('images/guide/landing-page.png') }}" class="img-fluid border rounded shadow-sm" alt="Tangkapan Layar Landing Page" style="max-height: 500px; object-fit: contain;">
                <p class="text-muted mt-2 small">Gambar 1. Tampilan Halaman Utama (Landing Page)</p>
            </div>
        </div>

        <!-- Section 2: Halaman Admin -->
        <div class="guide-section mb-5">
            <h3 class="mb-3 text-dark border-start border-4 border-danger ps-3">2. Halaman Administrator (Admin Panel)</h3>
            <p>Halaman admin digunakan untuk mengelola keseluruhan konten dari website SIDEKRA, mulai dari persetujuan UMKM, input produk, pembuatan berita, pengaturan galeri, hingga konfigurasi situs.</p>
            
            <p>Untuk mengakses halaman administrator, Anda dapat mengunjungi URL <code>/admin</code> dan login menggunakan akun yang telah diberikan oleh pengelola sistem.</p>

            <p>Setelah berhasil masuk, administrator akan diarahkan ke halaman Dashboard yang memberikan ringkasan statistik dan menu navigasi untuk mengelola sistem.</p>

            <div class="text-center my-4">
                <img src="{{ asset('images/guide/admin-dashboard.png') }}" class="img-fluid border rounded shadow-sm" alt="Tangkapan Layar Admin Dashboard" style="max-height: 500px; object-fit: contain;">
                <p class="text-muted mt-2 small">Gambar 2. Tampilan Halaman Dashboard Administrator</p>
            </div>
            
            <h4 class="mt-5 mb-4 fw-bold border-bottom pb-2">Rincian Menu dan Modul Admin</h4>
            
            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-tachometer-alt me-2"></i>1. Dashboard</h5>
                <p>Dashboard adalah pusat informasi utama yang memberikan ringkasan data operasional aplikasi secara *real-time*. Di sini, Anda dapat melihat:</p>
                <ul>
                    <li>**Statistik Utama:** Total UMKM yang terdaftar, jumlah produk yang tersedia, serta jumlah berita dan item galeri.</li>
                    <li>**Monitoring Cepat:** Gambaran umum pertumbuhan ekosistem UMKM dalam satu tampilan grafis yang informatif.</li>
                </ul>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-store me-2"></i>2. Modul UMKM & Kategori</h5>
                <p>Modul ini berfungsi untuk mengelola data identitas pelaku usaha. Terdiri dari dua bagian utama:</p>
                <ul>
                    <li>**Kategori UMKM:** Mengelompokkan UMKM berdasarkan bidang usahanya (seperti: Kuliner, Kerajinan, Fashion, Pertanian) untuk mempermudah pencarian oleh pengunjung.</li>
                    <li>**Data Pemilik UMKM:** Menyimpan informasi mendalam meliputi Nama Bisnis, Nama Pemilik, Kontak (Email & Telepon), Alamat Lengkap, deskripsi usaha, hingga tahun berdiri. Admin juga dapat mengunggah logo UMKM dan mengatur koordinat lokasi (Latitude/Longitude) untuk pemetaan.</li>
                    <li>**Status Verifikasi:** Admin dapat mengubah status UMKM menjadi 'Aktif' agar tampil di halaman depan, atau 'Nonaktif' untuk menyembunyikannya sementara.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-umkm-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Data UMKM">
                        <p class="text-muted mt-2 small">Daftar UMKM yang Terdaftar</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-umkm-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form UMKM">
                        <p class="text-muted mt-2 small">Formulir Detail Profil UMKM</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-users-cog me-2"></i>3. Modul Pengrajin</h5>
                <p>Modul ini dirancang khusus untuk mendata individu atau kelompok kreator yang menciptakan produk kerajinan/kriya. Fitur utamanya meliputi:</p>
                <ul>
                    <li>**Profil Kreator:** Mencatat Nama, Jenis (Perorangan/Kelompok), Spesialisasi keahlian, Lama Pengalaman (dalam tahun), Kontak, dan Alamat.</li>
                    <li>**Keterkaitan dengan UMKM:** Pengrajin dapat ditautkan ke profil UMKM tertentu jika mereka bernaung di bawah satu bendera usaha yang sama.</li>
                    <li>**Keterkaitan dengan Produk:** Setiap produk yang didaftarkan nantinya dapat diberi informasi spesifik mengenai siapa pengrajin yang membuatnya.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-pengrajin-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Pengrajin">
                        <p class="text-muted mt-2 small">Daftar Pengrajin yang Terdaftar</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-pengrajin-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form Pengrajin">
                        <p class="text-muted mt-2 small">Formulir Detail Profil Pengrajin</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-box me-2"></i>4. Modul Produk</h5>
                <p>Modul ini digunakan untuk mengelola katalog produk yang ditawarkan oleh setiap UMKM. Setiap produk memiliki informasi berikut:</p>
                <ul>
                    <li>**Identitas Produk:** Nama produk, kategori produk, pemilik UMKM, dan Pengrajin spesifik yang memproduksi barang tersebut.</li>
                    <li>**Informasi Harga:** Harga produk dalam rupiah (Rp) yang akan ditampilkan kepada calon pembeli.</li>
                    <li>**Konten Visual:** Foto produk berkualitas tinggi untuk menarik minat pengunjung.</li>
                    <li>**Deskripsi Lengkap:** Penjelasan mengenai spesifikasi, bahan, atau keunggulan produk.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-produk-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Produk">
                        <p class="text-muted mt-2 small">Daftar Produk yang Tersedia</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-produk-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form Produk">
                        <p class="text-muted mt-2 small">Formulir Input Data Produk</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-newspaper me-2"></i>5. Modul Berita & Informasi</h5>
                <p>Pusat pengelolaan konten edukasi dan informasi terkini. Fitur utama meliputi:</p>
                <ul>
                    <li>**Editor Konten:** Menggunakan editor teks kaya (Rich Text Editor) yang memungkinkan admin menyisipkan gambar, daftar poin, dan pemformatan teks di dalam artikel.</li>
                    <li>**Optimasi SEO:** Setiap berita otomatis memiliki 'Slug' (URL unik) untuk mempermudah pencarian di Google.</li>
                    <li>**Featured Image:** Pengunggahan gambar sampul yang akan tampil secara menarik di halaman depan.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-berita-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Berita">
                        <p class="text-muted mt-2 small">Manajemen Artikel dan Berita</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-berita-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form Berita">
                        <p class="text-muted mt-2 small">Penulisan Konten Berita Baru</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-images me-2"></i>6. Modul Galeri Visual</h5>
                <p>Digunakan untuk mengunggah dokumentasi visual kegiatan UMKM maupun pameran daerah. Keunggulannya:</p>
                <ul>
                    <li>**Multi-Upload:** Admin dapat mengunggah banyak foto sekaligus dalam satu album atau kategori galeri.</li>
                    <li>**Deskripsi Album:** Memberikan konteks atau cerita di balik kumpulan foto yang diunggah.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-galeri-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Galeri">
                        <p class="text-muted mt-2 small">Manajemen Galeri Foto</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-galeri-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form Galeri">
                        <p class="text-muted mt-2 small">Pengunggahan Koleksi Foto Baru</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5 pb-3 border-bottom">
                <h5 class="fw-bold text-danger"><i class="fas fa-users me-2"></i>7. Manajemen Pengguna</h5>
                <p>Digunakan untuk mengelola siapa saja yang berhak mengakses panel admin ini. Admin dapat menambah akun pengelola baru dengan Nama, Email, dan kata sandi yang terenkripsi aman.</p>
                <div class="row mt-4">
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-users-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Pengguna">
                        <p class="text-muted mt-2 small">Daftar Pengelola Admin</p>
                    </div>
                    <div class="col-md-6 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-users-form.png') }}" class="img-fluid border rounded shadow-sm" alt="Form Pengguna">
                        <p class="text-muted mt-2 small">Pengaturan Akun Pengguna Baru</p>
                    </div>
                </div>
            </div>

            <div class="module-detail mb-5">
                <h5 class="fw-bold text-danger"><i class="fas fa-cogs me-2"></i>8. Konfigurasi Situs (Site Settings)</h5>
                <p>Modul paling krusial untuk mengontrol identitas website tanpa menyentuh kode program. Konfigurasi dibagi menjadi beberapa kategori:</p>
                <ul>
                    <li>**Identitas & Branding:** Mengubah Nama Situs, Judul Browser, Logo Utama, Logo Putih (untuk footer), dan Favicon (ikon tab).</li>
                    <li>**Informasi Hero:** Mengubah Judul Besar, Subjudul, Deskripsi, hingga Gambar Latar Belakang pada bagian atas website.</li>
                    <li>**Kontak & Media Sosial:** Mengatur Email resmi, Nomor Telepon, Alamat Kantor, Jam Kerja, serta tautan ke Facebook, Instagram, Twitter, LinkedIn, dan YouTube.</li>
                    <li>**SEO (Search Engine Optimization):** Mengelola Meta Title, Meta Description, dan Keywords agar website mudah ditemukan di mesin pencari.</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-12 text-center mb-3">
                        <img src="{{ asset('images/guide/admin-site-config-table.png') }}" class="img-fluid border rounded shadow-sm" alt="Tabel Konfigurasi" style="max-height: 400px; width: auto;">
                        <p class="text-muted mt-2 small">Daftar Pengaturan Konfigurasi Situs</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-light-info {
        background-color: #e0f7fa !important;
        color: #006064;
    }
    
    .guide-book {
        line-height: 1.8;
    }

    /* Print Styles */
    @media print {
        @page {
            size: A4;
            margin: 2cm;
        }
        
        body {
            background-color: #fff !important;
            font-size: 12pt !important;
            color: #000 !important;
            line-height: 1.5;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: #000 !important;
            page-break-after: avoid;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        
        h1 { font-size: 18pt !important; text-align: center; }
        h2 { font-size: 16pt !important; border-bottom: 2pt solid #000; padding-bottom: 5pt; }
        h3 { font-size: 14pt !important; }
        h4, h5, h6 { font-size: 12pt !important; font-weight: bold; }
        
        p, li, span, td, th, div {
            font-size: 11pt !important; /* Slightly smaller for better fit */
        }
        
        .no-print, nav, footer, .navbar, .footer, .btn {
            display: none !important;
        }
        
        .guide-book {
            box-shadow: none !important;
            padding: 0 !important;
            border: none !important;
        }
        
        .container {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        
        .guide-section, .module-detail {
            page-break-inside: avoid;
            margin-bottom: 2rem !important;
            padding-bottom: 1rem !important;
        }
        
        .page-break-after {
            page-break-after: always;
        }

        .row {
            display: block !important; /* Stack for print to avoid grid issues */
        }

        .col-md-6 {
            width: 100% !important;
            margin-bottom: 1.5rem !important;
        }

        img {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 0 auto;
            border: 1px solid #ddd !important;
            page-break-inside: avoid;
        }

        .text-danger {
            color: #000 !important;
        }

        .border-bottom {
            border-bottom: 1pt solid #eee !important;
        }

        .alert-info {
            border: 1pt solid #ccc !important;
            background-color: #f9f9f9 !important;
            color: #000 !important;
        }
    }
</style>
@endpush
