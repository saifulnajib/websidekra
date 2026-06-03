<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UmkmOwner extends Model
{
    use HasFactory;

    protected $table = 'umkm_owners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'owner_name',
        'phone_number',
        'email',
        'address',
        'business_name',
        'business_slug',
        'category_id',
        'status',
        'established_year',
        'description',
        'logo_path',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'established_year' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * Get the category that owns the UMKM.
     */
    public function category()
    {
        return $this->belongsTo(UmkmCategory::class, 'category_id');
    }

    /**
     * Get the products for the UMKM owner.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'umkm_owner_id');
    }

    /**
     * Get the legalities for the UMKM owner.
     */
    public function legalities()
    {
        return $this->hasMany(UmkmLegality::class, 'umkm_owner_id');
    }

    /**
     * Get the artisans for the UMKM owner.
     */
    public function artisans()
    {
        return $this->hasMany(Artisan::class, 'umkm_owner_id');
    }

    protected static function booted(): void
    {
        static::creating(function (UmkmOwner $model) {
            if (empty($model->business_slug) && filled($model->business_name)) {
                $model->business_slug = static::generateUniqueSlug($model->business_name);
            }
        });

        static::updating(function (UmkmOwner $model) {
            if (empty($model->business_slug) && filled($model->business_name)) {
                $model->business_slug = static::generateUniqueSlug($model->business_name, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (static::where('business_slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
