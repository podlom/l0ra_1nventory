<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    protected $fillable = [
        'model',
        'inventory_number',
        'description',
    ];

    public function equipment()
    {
        return $this->hasMany(DroneEquipment::class);
    }
}
