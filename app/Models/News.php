<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author_id',
        'is_published',
        'published_at',
        'featured_image_path',
        'views',
        'meta_title',
        'meta_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<int,string> 
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * Get the author (user) of the news.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the galleries for the news.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Scope a query to only published news.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    /**
     * Generate unique slug on creating/updating if not provided.
     */
    protected static function booted(): void
    {
        static::creating(function (News $model) {
            if (empty($model->slug) && filled($model->title)) {
                $model->slug = static::generateUniqueSlug($model->title);
            }
        });

        static::updating(function (News $model) {
            if (empty($model->slug) && filled($model->title)) {
                $model->slug = static::generateUniqueSlug($model->title, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    /**
     * Increment the views counter.
     *
     * @return void
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }
}
