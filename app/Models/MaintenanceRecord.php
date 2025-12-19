<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    protected $table = 'maintenance_records';

    protected $fillable = [
        'vehicle_id',
        'description',
        'cost',
        'maintenance_date',
        'next_maintenance_date',
        'status',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}


