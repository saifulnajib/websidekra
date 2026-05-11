@extends('layouts.app', ['title' => 'Profil Pengrajin - ' . $artisan->name])

@section('content')
<section class="py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pengrajin</li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- Sidebar Profil -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden sticky-top" style="top: 100px;">
                    <div class="p-4 text-center bg-white">
                        @if($artisan->photo_path)
                            <img src="{{ Str::startsWith($artisan->photo_path, 'http') ? $artisan->photo_path : asset('storage/' . $artisan->photo_path) }}" 
                                 alt="{{ $artisan->name }}" 
                                 class="img-fluid rounded-circle mb-3 shadow-sm" 
                                 style="width: 180px; height: 180px; object-fit: cover; border: 5px solid #f8f9fa;">
                        @else
                            <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-sm" 
                                 style="width: 180px; height: 180px; background: linear-gradient(135deg, var(--primary-red), #ff6b6b); border: 5px solid #f8f9fa;">
                                <i class="fas fa-user fa-5x text-white"></i>
                            </div>
                        @endif
                        <h2 class="fw-bold h4 mb-1">{{ $artisan->name }}</h2>
                        <span class="badge {{ $artisan->type == 'kelompok' ? 'bg-success' : 'bg-info' }} mb-3 px-3 py-2 rounded-pill">
                            {{ ucfirst($artisan->type) }}
                        </span>
                        
                        <div class="d-flex justify-content-center gap-2 mb-4">
                            @if($artisan->phone)
                                <a href="https://wa.me/{{ $artisan->phone }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body bg-light border-top">
                        <h5 class="fw-bold mb-3 small text-uppercase text-muted">Informasi Kontak</h5>
                        <ul class="list-unstyled mb-0">
                            @if($artisan->specialty)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-paint-brush text-danger mt-1 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Keahlian</small>
                                        <strong>{{ $artisan->specialty }}</strong>
                                    </div>
                                </li>
                            @endif
                            @if($artisan->experience_years)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-history text-danger mt-1 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Pengalaman</small>
                                        <strong>{{ $artisan->experience_years }} Tahun</strong>
                                    </div>
                                </li>
                            @endif
                            @if($artisan->address)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt text-danger mt-1 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Alamat</small>
                                        <strong>{{ $artisan->address }}</strong>
                                    </div>
                                </li>
                            @endif
                            @if($artisan->umkmOwner)
                                <li class="mb-0 d-flex align-items-start">
                                    <i class="fas fa-store text-danger mt-1 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Tergabung di UMKM</small>
                                        <a href="{{ route('products.index', ['owner' => $artisan->umkmOwner->business_slug]) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $artisan->umkmOwner->business_name }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-lg-8">
                <div class="mb-5">
                    <h3 class="fw-bold mb-4 border-start border-4 border-danger ps-3">Tentang Pengrajin</h3>
                    <div class="bg-white p-4 rounded-4 shadow-sm lead" style="line-height: 1.8;">
                        {!! nl2br(e($artisan->description ?? 'Belum ada deskripsi profil untuk pengrajin ini.')) !!}
                    </div>
                </div>

                <div>
                    <h3 class="fw-bold mb-4 border-start border-4 border-danger ps-3">Karya / Produk</h3>
                    <div class="row g-4">
                        @forelse($artisan->products as $product)
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden product-card">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $product->file) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                        @if($product->umkmCategory)
                                            <span class="position-absolute top-0 start-0 m-3 badge bg-danger rounded-pill">
                                                {{ $product->umkmCategory->name }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold mb-1">{{ $product->name }}</h5>
                                        <p class="text-danger fw-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-danger w-100 rounded-pill">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Pengrajin ini belum memiliki daftar produk yang diunggah.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
</style>
@endpush
