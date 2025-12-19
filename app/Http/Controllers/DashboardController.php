<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $activeRentals = Rental::where('user_id', $user->id)
            ->where('status', 'active')
            ->count();

        $upcomingBookings = Booking::where('user_id', $user->id)
            ->where('start_date', '>=', now())
            ->count();

        $totalRentals = Rental::where('user_id', $user->id)->count();

        $loyaltyPoints = $user->loyalty_points ?? 0;

        return view('dashboard', compact(
            'user',
            'activeRentals',
            'upcomingBookings',
            'totalRentals',
            'loyaltyPoints'
        ));
    }
}
