<?php

namespace App\Http\Controllers;
use App\Models\Maintenance;
use App\Models\MaintenanceRecord;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = MaintenanceRecord::with('vehicle')->latest()->paginate(10);
        return view('maintenance.index', compact('maintenances'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('maintenance.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'maintenance_date' => 'required|date',
        ]);

        MaintenanceRecord::create($request->all());

        // Mark vehicle unavailable
        Vehicle::where('id', $request->vehicle_id)
            ->update(['status' => 'maintenance']);

        return redirect()->route('maintenance.index')
            ->with('success', 'Maintenance record added');
    }

    public function complete(MaintenanceRecord $maintenance)
    {
        $maintenance->update(['status' => 'completed']);

        $maintenance->vehicle->update(['status' => 'available']);

        return back()->with('success', 'Maintenance completed');
    }
}

