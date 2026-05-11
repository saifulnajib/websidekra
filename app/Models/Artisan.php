<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $fillable = [
        'name',
        'type',
        'specialty',
        'description',
        'photo_path',
        'experience_years',
        'address',
        'phone',
        'umkm_owner_id',
        'status',
    ];

    public function umkmOwner()
    {
        return $this->belongsTo(UmkmOwner::class, 'umkm_owner_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'artisan_id');
    }
}
