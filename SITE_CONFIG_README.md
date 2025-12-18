# Site Configuration System

Sistem konfigurasi site untuk mengelola data yang ditampilkan pada halaman landing page publik.

## Struktur Database

Tabel `site_configs` dengan kolom:
- `key`: Kunci unik konfigurasi
- `value`: Nilai konfigurasi
- `type`: Tipe data (text, textarea, email, url, file, image, boolean, number, json, array)
- `group`: Grup konfigurasi (general, branding, hero, contact, social, footer, seo, features, stats)
- `label`: Label untuk display
- `description`: Deskripsi konfigurasi
- `is_public`: Apakah bisa diakses publik
- `sort_order`: Urutan tampilan

## Data Konfigurasi Default

### General
- `site_name`: Nama situs
- `site_title`: Judul lengkap situs
- `site_description`: Deskripsi situs
- `site_tagline`: Tagline situs

### Branding
- `logo`: Logo utama
- `logo_white`: Logo putih
- `favicon`: Favicon

### Hero Section
- `hero_title`: Judul hero
- `hero_subtitle`: Subjudul hero
- `hero_description`: Deskripsi hero
- `hero_background_image`: Gambar latar hero
- `hero_button_text`: Teks tombol hero
- `hero_button_url`: URL tombol hero

### Contact
- `contact_email`: Email kontak
- `contact_phone`: Nomor telepon
- `contact_address`: Alamat
- `contact_hours`: Jam operasional

### Social Media
- `social_facebook`: Link Facebook
- `social_instagram`: Link Instagram
- `social_twitter`: Link Twitter/X
- `social_linkedin`: Link LinkedIn
- `social_youtube`: Link YouTube

### Footer
- `footer_copyright`: Teks copyright
- `footer_description`: Deskripsi footer

### SEO
- `seo_meta_title`: Meta title
- `seo_meta_description`: Meta description
- `seo_keywords`: Kata kunci SEO

### Features & Stats
- `features_title`: Judul fitur
- `features`: Data fitur (JSON)
- `stats_title`: Judul statistik
- `stats`: Data statistik (JSON)

## Penggunaan Model

```php
use App\Models\SiteConfig;

// Mendapatkan nilai konfigurasi
$siteName = SiteConfig::get('site_name');
$contactEmail = SiteConfig::get('contact_email', 'default@email.com');

// Mengatur nilai konfigurasi
SiteConfig::set('site_name', 'New Site Name');

// Mendapatkan semua konfigurasi dalam grup
$socialLinks = SiteConfig::getGroup('social');

// Mendapatkan semua konfigurasi publik
$allPublicConfigs = SiteConfig::getAllPublic();

// Membersihkan cache
SiteConfig::clearCache();
```

## Admin Panel

Konfigurasi dapat dikelola melalui admin panel Filament di menu "Site Config" dalam grup "Settings".

Fitur admin panel:
- Form dinamis berdasarkan tipe data
- Filter berdasarkan grup dan tipe
- Upload file untuk tipe file/image
- Editor JSON untuk data kompleks
- Badge untuk tipe dan grup
- Tooltip untuk nilai panjang</content>
<parameter name="filePath">/Users/saifulnajib/Documents/SIDEKRA/websidekra/SITE_CONFIG_README.md