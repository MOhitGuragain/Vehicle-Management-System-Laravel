<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'plate_number' => 'required|unique:vehicles',
            'rent_price_per_day' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'plate_number' => 'required|unique:vehicles,plate_number,' . $vehicle->id,
            'rent_price_per_day' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
                Storage::disk('public')->delete($vehicle->image);
            }
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        $vehicle->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }

    // Available vehicles for rentals
    public function available()
    {
        $vehicles = Vehicle::where('status', 'available')->latest()->paginate(10);
        return view('rentals.available', compact('vehicles'));
    }
}
