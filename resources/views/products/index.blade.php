@extends('layouts.app', ['active' => 'products', 'title' => 'Produk UMKM - SIDEKRA'])

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 100px; z-index: 100;">
                        <div class="card-header bg-white border-bottom-0 py-3">
                            <h5 class="mb-0 fw-bold text-dark">Filter Produk</h5>
                        </div>
                        <div class="card-body">
                            <!-- Search -->
                            <form action="{{ route('products.index') }}" method="GET" class="mb-4">
                                @if(request('umkm'))
                                    <input type="hidden" name="umkm" value="{{ request('umkm') }}">
                                @endif
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari produk..."
                                        value="{{ request('search') }}">
                                    <button class="btn btn-primary-custom" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>

                            <!-- UMKM List -->
                            <h6 class="fw-bold text-muted text-uppercase small mb-3">UMKM / Pengrajin</h6>
                            <div class="list-group list-group-flush">
                                <a href="{{ route('products.index') }}"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !request('umkm') ? 'bg-dark text-white fw-bold' : '' }}"
                                    style="{{ !request('umkm') ? 'border-color: transparent;' : '' }}">
                                    <span>Semua UMKM</span>
                                </a>
                                @foreach($umkms as $umkm)
                                    <a href="{{ route('products.index', ['umkm' => $umkm->id]) }}"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('umkm') == $umkm->id ? 'bg-dark text-white fw-bold' : '' }}"
                                        style="{{ request('umkm') == $umkm->id ? 'border-color: transparent;' : '' }}">
                                        <span>{{ $umkm->business_name }}</span>
                                        <span
                                            class="badge {{ request('umkm') == $umkm->id ? 'bg-white text-dark' : 'bg-secondary' }} rounded-pill">{{ $umkm->products_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h4 fw-bold mb-0">
                            @if(request('umkm'))
                                Produk dari {{ $umkms->firstWhere('id', request('umkm'))->business_name ?? 'UMKM' }}
                            @elseif(request('search'))
                                Hasil pencarian "{{ request('search') }}"
                            @else
                                Semua Produk
                            @endif
                        </h2>
                        <span class="text-muted">{{ $products->total() }} Produk ditemukan</span>
                    </div>

                    @if($products->count() > 0)
                        <div class="row g-4">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card product-card h-100 border-0 shadow-sm hover-lift">
                                        <div class="position-relative overflow-hidden">
                                            <img src="{{ Str::startsWith($product->file, 'http') ? $product->file : asset('storage/' . $product->file) }}"
                                                class="card-img-top product-img" alt="{{ $product->name }}"
                                                style="height: 250px; object-fit: cover;">
                                            @if($product->umkmCategory)
                                                <span class="position-absolute top-0 start-0 m-3 badge bg-primary-red shadow-sm">
                                                    {{ $product->umkmCategory->name }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-dark mb-1">
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="text-decoration-none text-dark stretched-link">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                            <p class="text-muted small mb-2">
                                                <i class="fas fa-store me-1"></i>
                                                {{ $product->umkmOwner->business_name ?? 'UMKM Lokal' }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <span class="h5 fw-bold text-primary-red mb-0">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white border-top-0 pb-3 pt-0">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-sm btn-outline-custom w-100">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-box-open fa-4x text-muted opacity-50"></i>
                            </div>
                            <h4>Tidak ada produk ditemukan</h4>
                            <p class="text-muted">Coba kata kunci lain atau pilih kategori UMKM yang berbeda.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary-custom mt-3">Lihat Semua Produk</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }

            .bg-primary-red {
                background-color: var(--primary-red);
            }

            .text-primary-red {
                color: var(--primary-red);
            }

            .pagination {
                justify-content: center;
            }

            .page-item.active .page-link {
                background-color: var(--primary-red);
                border-color: var(--primary-red);
            }

            .page-link {
                color: var(--primary-red);
            }
        </style>
    @endpush
@endsection