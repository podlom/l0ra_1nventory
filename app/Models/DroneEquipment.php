<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DroneEquipment extends Model
{
    protected $table = 'drones_equipment';

    protected $fillable = [
        'drone_id',
        'name',
        'quantity',
        'price',
    ];

    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }
}
