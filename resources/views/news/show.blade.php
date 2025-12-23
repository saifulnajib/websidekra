@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                @if($news->featured_image_path)
                <img src="{{ asset('storage/' . $news->featured_image_path) }}" alt="{{ $news->title }}" class="img-fluid rounded mb-4">
                @else
                <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="{{ $news->title }}" class="img-fluid rounded mb-4">
                @endif

                <div class="mb-3">
                    <span class="badge bg-primary-red me-2">{{ $news->published_at ? $news->published_at->format('d M Y') : 'Draft' }}</span>
                    <span class="text-muted">
                        <i class="fas fa-eye me-1"></i>{{ $news->views }} views
                    </span>
                </div>

                <h1 class="mb-3">{{ $news->title }}</h1>

                @if($news->excerpt)
                <p class="lead text-muted mb-4">{{ strip_tags($news->excerpt) }}</p>
                @endif

                <div class="news-content">
                    {!! $news->content !!}
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="share-buttons">
                        <span class="me-2">Bagikan:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-outline-primary btn-sm me-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $news->title }}" target="_blank" class="btn btn-outline-info btn-sm me-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}" target="_blank" class="btn btn-outline-success btn-sm">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <a href="{{ route('news.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Kembali ke Berita
                    </a>
                </div>
            </article>
        </div>

        <div class="col-lg-4">
            <div class="widget-card p-4 mb-4">
                <h5 class="mb-3">Berita Terkait</h5>
                @forelse($relatedNews as $related)
                <div class="d-flex mb-3">
                    @if($related->featured_image_path)
                    <img src="{{ asset('storage/' . $related->featured_image_path) }}" alt="{{ $related->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    @else
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=60&q=80" alt="{{ $related->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    @endif
                    <div>
                        <h6 class="mb-1">
                            <a href="{{ route('news.show', $related->slug) }}" class="text-decoration-none">
                                {{ Str::limit($related->title, 40) }}
                            </a>
                        </h6>
                        <small class="text-muted">{{ $related->published_at ? $related->published_at->format('d M Y') : 'Draft' }}</small>
                    </div>
                </div>
                @empty
                <p class="text-muted mb-0">Tidak ada berita terkait.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.news-content {
    line-height: 1.8;
}

.news-content h2, .news-content h3, .news-content h4 {
    color: var(--primary-red);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.news-content p {
    margin-bottom: 1.5rem;
}

.news-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
}

.news-content blockquote {
    border-left: 4px solid var(--primary-red);
    padding-left: 1rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: #666;
}

.share-buttons .btn {
    min-width: 35px;
}
</style>
@endpush