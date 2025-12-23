<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIDEKRA - Sistem Informasi UMKM' }}</title>
    <meta name="description" content="{{ $description ?? 'Platform digital untuk mendukung pengembangan Usaha Kecil Menengah (UMKM) dan kerajinan daerah.' }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">

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

        .btn-outline-custom {
            color: #fff;
            border: 2px solid #fff;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: #fff;
            color: var(--primary-red);
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
        }

        .hero-section {
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

        .product-card, .news-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover, .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .product-img, .news-img {
            height: 200px;
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
    </style>

    @stack('styles')
</head>
<body>
    @include('components.navbar', ['active' => $active ?? ''])

    @yield('content')

    @include('components.footer')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>