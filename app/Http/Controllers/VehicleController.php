<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    // Show all vehicles
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    // Show create form
    public function create()
    {
        return view('vehicles.create');
    }

    // Store in DB
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'plate_number' => 'required|unique:vehicles',
            'rent_price_per_day' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $imagepath = null;
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('vehicles', 'public');
        }
        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')
                         ->with('success', 'Vehicle added successfully!');
    }

    // Show edit form
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    // Update DB
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'rent_price_per_day' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
   if ($request->hasFile('image')) {
        // delete old image
        if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

        $vehicle->image = $request->file('image')->store('vehicles', 'public');
    }

    $vehicle->update($request->except('image'));
    $vehicle->update($request->all());

    return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
}

        

    // Delete
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
                         ->with('success', 'Vehicle deleted successfully!');
    }

    public function available()
    {
        $vehicles = Vehicle::where('status', 'available')
        ->latest()
        ->paginate(10);
        return view('rentals.available', compact('vehicles'));  
    }
}
