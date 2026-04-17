<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DroneEquipment extends Model
{
    protected $table = 'drones_equipment';

    protected $fillable = [
        'drone_id',
        'name',
        'quantity',
        'price',
        'unit_id',
        'description',
    ];

    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
