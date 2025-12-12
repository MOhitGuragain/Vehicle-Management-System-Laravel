<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    protected $fillable = [
        'vehicle_id', 'description', 'cost', 'maintenance_date'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

