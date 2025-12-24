@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h1 class="section-title mb-3">Berita Terbaru</h1>
                <p class="lead text-muted mb-0">Informasi terkini seputar UMKM dan kerajinan daerah</p>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <form action="{{ route('news.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari berita..."
                            value="{{ request('search') }}">
                        <button class="btn btn-primary-custom" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if(request('search'))
            <div class="row mb-4">
                <div class="col-12">
                    <p class="mb-0">Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong></p>
                    <a href="{{ route('news.index') }}" class="text-decoration-none small text-danger"><i
                            class="fas fa-times me-1"></i> Reset Pencarian</a>
                </div>
            </div>
        @endif

        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="news-card h-100">
                        @if($item->featured_image_path)
                            <img src="{{ asset('storage/' . $item->featured_image_path) }}" alt="{{ $item->title }}"
                                class="news-img w-100">
                        @else
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                alt="{{ $item->title }}" class="news-img w-100">
                        @endif
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    <i
                                        class="fas fa-calendar me-1"></i>{{ $item->published_at ? $item->published_at->format('d M Y') : 'Draft' }}
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-eye me-1"></i>{{ $item->views }} views
                                </small>
                            </div>
                            <h5 class="card-title mb-2">
                                <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($item->title, 60) }}
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-3">
                                {{ Str::limit(strip_tags($item->excerpt ?? $item->content), 100) }}
                            </p>
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary-red btn-sm">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada berita</h4>
                    <p class="text-muted">Berita akan segera dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        @if($news->hasPages())
            <div class="row mt-4">
                <div class="col-12">
                    {{ $news->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .news-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .news-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
@endpush