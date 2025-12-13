<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function create(Vehicle $vehicle)
    {
        if ($vehicle->status !== 'available') {
            return back()->with('error', 'This vehicle is not available.');
        }

        return view('rentals.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        // Calculate total days
        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);
        $days  = $start->diffInDays($end) + 1;

        // Calculate total amount
        $totalAmount = $days * $vehicle->rent_price_per_day;

        // Create rental record
        Rental::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $vehicle->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $days,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Update vehicle status
        $vehicle->update(['status' => 'rented']);

        return redirect('/dashboard')->with('success', 'Vehicle booked successfully!');
    }
    public function index()
    {
        $rentals = Rental::with(['user','vehicle'])->latest()->paginate(10);
        return view('rentals.index', compact('rentals'));
    }
}
