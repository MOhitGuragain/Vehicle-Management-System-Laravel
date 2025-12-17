<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'brand',
        'model',
        'plate_number',
        'fuel_type',
        'seat_capacity',
        'rent_price_per_day',
        'status',
        'image'
    ];

    // Relations
    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function maintenanceRecords()
    {
        return $this->hasMany(Maintenance::class);
    }
}
