<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Show all maintenance records
    public function index(Request $request)
    {
        $query = Maintenance::with('vehicle');

        if ($request->filled('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }

        $maintenances = $query->latest()->get();
        $vehicles = Vehicle::all();

        return view('maintenance.index', compact('maintenances', 'vehicles'));
    }

    // Show form to create maintenance
    public function create(Request $request)
    {
        $vehicles = Vehicle::all();
        $vehicleId = $request->vehicle_id ?? null;

        return view('maintenance.create', compact('vehicles', 'vehicleId'));
    }

    // Store maintenance record
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_type' => 'required|string',
            'service_date' => 'required|date',
            'next_service_date' => 'nullable|date|after_or_equal:service_date',
            'cost' => 'nullable|numeric',
            'status' => 'required|in:pending,completed,overdue',
            'notes' => 'nullable|string',
        ]);

        Maintenance::create($request->only([
            'vehicle_id',
            'service_type',
            'service_date',
            'next_service_date',
            'cost',
            'status',
            'notes'
        ]));

        return redirect()->route('maintenance.index')
            ->with('success', 'Maintenance record added successfully!');
    }
}
