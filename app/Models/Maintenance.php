<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'vehicle_id',
        'service_type',
        'service_date',
        'next_service_date',
        'cost',
        'status',
        'notes',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
