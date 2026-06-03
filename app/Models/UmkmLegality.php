<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmLegality extends Model
{
    protected $guarded = ['id'];

    public function umkmOwner()
    {
        return $this->belongsTo(UmkmOwner::class);
    }
}
