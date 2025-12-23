@props(['title', 'subtitle', 'description', 'buttonText' => 'Jelajahi Produk', 'buttonUrl' => '#products', 'secondaryButtonText' => 'Tentang Kami', 'secondaryButtonUrl' => '#about', 'backgroundImage' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80'])

<section class="hero-section d-flex align-items-center" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $backgroundImage }}'); background-size: cover; background-position: center; min-height: 500px; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">{{ $title }}</h1>
                <p class="lead mb-4">{{ $description }}</p>
                <a href="{{ $buttonUrl }}" class="btn btn-primary-red btn-lg me-2">{{ $buttonText }}</a>
                <a href="{{ $secondaryButtonUrl }}" class="btn btn-outline-light btn-lg">{{ $secondaryButtonText }}</a>
            </div>
        </div>
    </div>
</section>