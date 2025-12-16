<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'file',
        'umkm_owner_id',
        'umkm_category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function umkmOwner(): BelongsTo
    {
        return $this->belongsTo(UmkmOwner::class);
    }

    public function umkmCategory(): BelongsTo
    {
        return $this->belongsTo(UmkmCategory::class);
    }
}
