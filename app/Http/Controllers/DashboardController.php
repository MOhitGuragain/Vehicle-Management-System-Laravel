<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Using Auth facade so Intelephense understands the type

        // Redirect if not logged in
        if (!$user) {
            return redirect('/login');
        }

        if ($user->isAdmin()) {
            // --- Admin dashboard ---

            $totalUsers = User::count();

            $totalVehicles = Vehicle::count();
            $availableVehicles = Vehicle::where('status', 'available')->count();
            $rentedVehicles = Vehicle::where('status', 'rented')->count();

            $totalRentals = Rental::count();
            $pendingRentals = Rental::where('status', 'pending')->count();
            $approvedRentals = Rental::where('status', 'approved')->count();

            $totalRevenue = Rental::where('status', 'approved')->sum('total_amount');

            // Recent 5 rentals for admin dashboard
            $recentRentals = Rental::latest()->take(5)->get();

            return view('admin.dashboard', compact(
                'totalUsers',
                'totalVehicles',
                'availableVehicles',
                'rentedVehicles',
                'totalRentals',
                'pendingRentals',
                'approvedRentals',
                'totalRevenue',
                'recentRentals' // <-- Added to fix Blade error
            ));
        } else {
            // --- User dashboard ---
            $activeRentals = $user->rentals()->where('status', 'active')->count();

            $upcomingBookings = $user->rentals()->where('start_date', '>', now())->count();

            $totalRentals = $user->rentals()->count();

            $loyaltyPoints = $user->loyalty_points ?? 0;

            // Last 5 rentals for recent activity
            $recentRentals = $user->rentals()
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            return view('dashboard', compact(
                'user',
                'activeRentals',
                'upcomingBookings',
                'totalRentals',
                'loyaltyPoints',
                'recentRentals'
            ));
        }
    }
}
