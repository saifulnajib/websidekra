<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'news_id',
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function galleryItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class)->orderBy('order');
    }
}