<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
