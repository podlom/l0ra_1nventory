<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ammunition extends Model
{
    protected $table = 'ammunition';

    protected $fillable = [
        'invoice_id',
        'row_number',
        'equipment_name',
        'unit_id',
        'authorized_amount',
        'ledger_amount',
        'in_stock',
        'lack_amount',
        'description',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
