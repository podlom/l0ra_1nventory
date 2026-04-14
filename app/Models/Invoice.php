<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Invoice extends Model
{
    protected $fillable = [
        'number',
    ];

    public function ammunition(): HasMany
    {
        return $this->hasMany(Ammunition::class);
    }
}
