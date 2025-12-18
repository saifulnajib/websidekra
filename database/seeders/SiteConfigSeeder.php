<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configs = [
            // General Site Information
            [
                'key' => 'site_name',
                'value' => 'SIDEKRA',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Nama Situs',
                'description' => 'Nama utama website/aplikasi',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'site_title',
                'value' => 'SIDEKRA - Sistem Informasi UMKM',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Judul Situs',
                'description' => 'Judul lengkap yang ditampilkan di browser',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'site_description',
                'value' => 'Platform digital untuk mendukung pengembangan Usaha Mikro Kecil dan Menengah (UMKM) di Indonesia dengan fitur katalog produk, berita terkini, dan galeri inspiratif.',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Deskripsi Situs',
                'description' => 'Deskripsi singkat tentang website/aplikasi',
                'is_public' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Mendorong Pertumbuhan UMKM Indonesia',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Tagline Situs',
                'description' => 'Slogan atau tagline website',
                'is_public' => true,
                'sort_order' => 4,
            ],

            // Logo and Branding
            [
                'key' => 'logo',
                'value' => '/images/logo.png',
                'type' => 'file',
                'group' => 'branding',
                'label' => 'Logo Utama',
                'description' => 'Logo utama website (format PNG/JPG)',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'logo_white',
                'value' => '/images/logo-white.png',
                'type' => 'file',
                'group' => 'branding',
                'label' => 'Logo Putih',
                'description' => 'Logo dengan background transparan untuk header gelap',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'favicon',
                'value' => '/images/favicon.ico',
                'type' => 'file',
                'group' => 'branding',
                'label' => 'Favicon',
                'description' => 'Ikon kecil yang muncul di tab browser',
                'is_public' => true,
                'sort_order' => 3,
            ],

            // Hero/Jumbotron Section
            [
                'key' => 'hero_title',
                'value' => 'Selamat Datang di SIDEKRA',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Judul Hero',
                'description' => 'Judul utama di bagian hero/jumbotron',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'hero_subtitle',
                'value' => 'Platform Digital untuk UMKM Indonesia',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Subjudul Hero',
                'description' => 'Subjudul di bagian hero/jumbotron',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'hero_description',
                'value' => 'Temukan produk UMKM terbaik, dapatkan informasi terkini seputar dunia usaha, dan jadilah bagian dari ekosistem UMKM yang berkembang.',
                'type' => 'textarea',
                'group' => 'hero',
                'label' => 'Deskripsi Hero',
                'description' => 'Deskripsi panjang di bagian hero',
                'is_public' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'hero_background_image',
                'value' => '/images/hero-bg.jpg',
                'type' => 'file',
                'group' => 'hero',
                'label' => 'Gambar Latar Hero',
                'description' => 'Gambar background untuk bagian hero',
                'is_public' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'hero_button_text',
                'value' => 'Jelajahi Produk',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'Teks Tombol Hero',
                'description' => 'Teks yang muncul di tombol utama hero',
                'is_public' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'hero_button_url',
                'value' => '/products',
                'type' => 'text',
                'group' => 'hero',
                'label' => 'URL Tombol Hero',
                'description' => 'Link tujuan tombol utama hero',
                'is_public' => true,
                'sort_order' => 6,
            ],

            // Contact Information
            [
                'key' => 'contact_email',
                'value' => 'info@sidekra.com',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Email Kontak',
                'description' => 'Email utama untuk informasi dan dukungan',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+62 812-3456-7890',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Nomor Telepon',
                'description' => 'Nomor telepon untuk kontak langsung',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'contact_address',
                'value' => 'Jl. Raya UMKM No. 123, Jakarta Pusat, Indonesia',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Alamat',
                'description' => 'Alamat lengkap kantor atau lokasi',
                'is_public' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Senin - Jumat: 08:00 - 17:00 WIB',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Jam Operasional',
                'description' => 'Jam kerja atau jam operasional',
                'is_public' => true,
                'sort_order' => 4,
            ],

            // Social Media Links
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/sidekra',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook',
                'description' => 'Link halaman Facebook',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/sidekra',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram',
                'description' => 'Link akun Instagram',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/sidekra',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter/X',
                'description' => 'Link akun Twitter/X',
                'is_public' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/sidekra',
                'type' => 'url',
                'group' => 'social',
                'label' => 'LinkedIn',
                'description' => 'Link halaman LinkedIn',
                'is_public' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/@sidekra',
                'type' => 'url',
                'group' => 'social',
                'label' => 'YouTube',
                'description' => 'Link channel YouTube',
                'is_public' => true,
                'sort_order' => 5,
            ],

            // Footer Information
            [
                'key' => 'footer_copyright',
                'value' => '© 2025 SIDEKRA. All rights reserved.',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'Copyright Footer',
                'description' => 'Teks copyright di footer',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'footer_description',
                'value' => 'SIDEKRA adalah platform digital yang didedikasikan untuk mendukung pertumbuhan UMKM di Indonesia melalui teknologi dan inovasi.',
                'type' => 'textarea',
                'group' => 'footer',
                'label' => 'Deskripsi Footer',
                'description' => 'Deskripsi singkat di footer',
                'is_public' => true,
                'sort_order' => 2,
            ],

            // SEO Settings
            [
                'key' => 'seo_meta_title',
                'value' => 'SIDEKRA - Sistem Informasi UMKM Indonesia',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Meta Title',
                'description' => 'Judul untuk SEO (meta title)',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'seo_meta_description',
                'value' => 'Platform digital untuk mendukung pengembangan Usaha Mikro Kecil dan Menengah (UMKM) di Indonesia dengan fitur katalog produk, berita terkini, dan galeri inspiratif.',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'Meta Description',
                'description' => 'Deskripsi untuk SEO (meta description)',
                'is_public' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'seo_keywords',
                'value' => 'UMKM, usaha kecil menengah, Indonesia, katalog produk, berita UMKM, galeri UMKM',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'SEO Keywords',
                'description' => 'Kata kunci untuk SEO',
                'is_public' => true,
                'sort_order' => 3,
            ],

            // Features/About Section
            [
                'key' => 'features_title',
                'value' => 'Mengapa Memilih SIDEKRA?',
                'type' => 'text',
                'group' => 'features',
                'label' => 'Judul Fitur',
                'description' => 'Judul section fitur/keunggulan',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'features',
                'value' => json_encode([
                    [
                        'title' => 'Katalog Produk Lengkap',
                        'description' => 'Temukan berbagai produk UMKM dari seluruh Indonesia dalam satu platform.',
                        'icon' => 'fas fa-store'
                    ],
                    [
                        'title' => 'Berita Terkini',
                        'description' => 'Dapatkan informasi terbaru seputar dunia UMKM dan bisnis.',
                        'icon' => 'fas fa-newspaper'
                    ],
                    [
                        'title' => 'Galeri Inspiratif',
                        'description' => 'Lihat galeri foto dan video yang menginspirasi perjalanan UMKM.',
                        'icon' => 'fas fa-images'
                    ],
                    [
                        'title' => 'Komunitas UMKM',
                        'description' => 'Bergabung dengan komunitas UMKM yang saling mendukung.',
                        'icon' => 'fas fa-users'
                    ]
                ]),
                'type' => 'json',
                'group' => 'features',
                'label' => 'Daftar Fitur',
                'description' => 'Data fitur dalam format JSON',
                'is_public' => true,
                'sort_order' => 2,
            ],

            // Statistics/Counter Section
            [
                'key' => 'stats_title',
                'value' => 'SIDEKRA dalam Angka',
                'type' => 'text',
                'group' => 'stats',
                'label' => 'Judul Statistik',
                'description' => 'Judul section statistik',
                'is_public' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'stats',
                'value' => json_encode([
                    [
                        'number' => '1000+',
                        'label' => 'UMKM Terdaftar',
                        'icon' => 'fas fa-building'
                    ],
                    [
                        'number' => '5000+',
                        'label' => 'Produk Tersedia',
                        'icon' => 'fas fa-box'
                    ],
                    [
                        'number' => '50+',
                        'label' => 'Kategori Produk',
                        'icon' => 'fas fa-tags'
                    ],
                    [
                        'number' => '10000+',
                        'label' => 'Pengunjung Bulanan',
                        'icon' => 'fas fa-users'
                    ]
                ]),
                'type' => 'json',
                'group' => 'stats',
                'label' => 'Data Statistik',
                'description' => 'Data statistik dalam format JSON',
                'is_public' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($configs as $config) {
            DB::table('site_configs')->updateOrInsert(
                ['key' => $config['key']],
                $config
            );
        }
    }
}
