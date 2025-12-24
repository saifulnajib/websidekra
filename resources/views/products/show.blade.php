@extends('layouts.app', ['active' => 'products', 'title' => $product->name . ' - SIDEKRA'])

@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-decoration-none text-muted">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}"
                            class="text-decoration-none text-muted">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="row g-5">
                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="{{ Str::startsWith($product->file, 'http') ? $product->file : asset('storage/' . $product->file) }}"
                            class="img-fluid w-100 object-fit-cover" alt="{{ $product->name }}" style="max-height: 500px;">
                        @if($product->umkmCategory)
                            <span
                                class="position-absolute top-0 end-0 m-4 badge bg-primary-red fs-6 shadow-sm py-2 px-3 rounded-pill">
                                {{ $product->umkmCategory->name }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <h5 class="text-muted text-uppercase fw-bold small mb-2">
                            <i class="fas fa-store me-1"></i> {{ $product->umkmOwner->business_name ?? 'UMKM Partner' }}
                        </h5>
                        <h1 class="display-5 fw-bold text-dark mb-3">{{ $product->name }}</h1>

                        <div class="mb-4">
                            <span class="display-6 fw-bold text-primary-red">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>

                        <p class="lead text-muted mb-4">{{ $product->description }}</p>

                        <hr class="my-4">

                        <!-- UMKM Info -->
                        <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3">
                            <div class="rounded-circle bg-white p-3 shadow-sm me-3 text-primary-red">
                                <i class="fas fa-store fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">{{ $product->umkmOwner->business_name }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ $product->umkmOwner->address ?? 'Alamat tidak tersedia' }}</p>
                                @if($product->umkmOwner->phone_number)
                                    <small class="text-muted"><i class="fas fa-phone me-1"></i>
                                        {{ $product->umkmOwner->phone_number }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex">
                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $product->umkmOwner->phone_number ?? '')) }}?text=Halo%20{{ urlencode($product->umkmOwner->business_name) }},%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}"
                                target="_blank" class="btn btn-success btn-lg rounded-pill px-5">
                                <i class="fab fa-whatsapp me-2"></i> Beli Sekarang
                            </a>
                            <a href="{{ route('products.index', ['umkm' => $product->umkm_owner_id]) }}"
                                class="btn btn-outline-custom btn-lg rounded-pill px-4">
                                Lihat Produk Lainnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold">Produk Terkait</h3>
                    <a href="{{ route('products.index') }}" class="text-decoration-none text-primary-red fw-bold">Lihat Semua <i
                            class="fas fa-arrow-right ms-1"></i></a>
                </div>

                <div class="row g-4">
                    @foreach($relatedProducts as $related)
                        <div class="col-md-6 col-lg-3">
                            <div class="card product-card h-100 border-0 shadow-sm hover-lift">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ Str::startsWith($related->file, 'http') ? $related->file : asset('storage/' . $related->file) }}"
                                        class="card-img-top product-img" alt="{{ $related->name }}"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title fw-bold text-dark mb-1">
                                        <a href="{{ route('products.show', $related->id) }}"
                                            class="text-decoration-none text-dark stretched-link">
                                            {{ $related->name }}
                                        </a>
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        {{ $related->umkmOwner->business_name ?? 'UMKM' }}
                                    </p>
                                    <span class="fw-bold text-primary-red">Rp
                                        {{ number_format($related->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @push('styles')
        <style>
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }

            .text-primary-red {
                color: var(--primary-red);
            }

            .bg-primary-red {
                background-color: var(--primary-red);
            }
        </style>
    @endpush
@endsection