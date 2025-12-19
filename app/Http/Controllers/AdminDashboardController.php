<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Rental;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers'     => User::count(),
            'totalVehicles'  => Vehicle::count(),
            'availableVehicles'  => Vehicle::where('status', 'available')->count(),
            'rentedVehicles'     => Vehicle::where('status', 'rented')->count(),
            'totalRentals'   => Rental::count(),
            'pendingRentals' => Rental::where('status', 'pending')->count(),
            'approvedRentals'=> Rental::where('status', 'approved')->count(),
            'totalRevenue'   => Rental::where('status', 'approved')->sum('total_amount'),
        ]);
    }
}
