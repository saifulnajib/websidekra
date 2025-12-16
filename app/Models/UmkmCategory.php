<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UmkmCategory extends Model
{
    use HasFactory;

    protected $table = 'umkm_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the owners for the category.
     */
    public function owners()
    {
        return $this->hasMany(UmkmOwner::class, 'category_id');
    }

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'umkm_category_id');
    }

    protected static function booted(): void
    {
        static::creating(function (UmkmCategory $model) {
            if (empty($model->slug) && filled($model->name)) {
                $model->slug = static::generateUniqueSlug($model->name);
            }
        });

        static::updating(function (UmkmCategory $model) {
            if (empty($model->slug) && filled($model->name)) {
                $model->slug = static::generateUniqueSlug($model->name, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
