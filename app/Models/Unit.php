<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'full_name',
    ];

    public function ammunition(): HasMany
    {
        return $this->hasMany(Ammunition::class);
    }
}
