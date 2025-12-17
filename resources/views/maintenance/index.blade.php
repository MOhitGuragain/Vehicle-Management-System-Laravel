@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title">Maintenance Records</h2>

    <a href="{{ route('maintenance.create') }}" class="btn-add">Add New Maintenance</a>

    <table class="maintenance-table">
        <thead>
            <tr>
                <th>Vehicle</th>
                <th>Service Type</th>
                <th>Service Date</th>
                <th>Next Service</th>
                <th>Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($maintenances as $m)
            <tr>
                <td>{{ $m->vehicle->vehicle_name ?? 'N/A' }}</td>
                <td>{{ $m->service_type }}</td>
                <td>{{ $m->service_date }}</td>
                <td>{{ $m->next_service_date ?? '-' }}</td>
                <td>${{ number_format($m->cost ?? 0, 2) }}</td>
                <td class="status {{ $m->status }}">{{ ucfirst($m->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No maintenance records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .title {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .btn-add {
        display: inline-block;
        margin-bottom: 15px;
        padding: 8px 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-add:hover {
        background-color: #45a049;
    }

    .maintenance-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .maintenance-table th,
    .maintenance-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .maintenance-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .maintenance-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .maintenance-table tr:hover {
        background-color: #f1f1f1;
    }

    /* Status color coding */
    .status.pending {
        color: #ff9800;
        /* Orange */
        font-weight: bold;
    }

    .status.completed {
        color: #4CAF50;
        /* Green */
        font-weight: bold;
    }

    .status.overdue {
        color: #f44336;
        /* Red */
        font-weight: bold;
    }
</style>
@endsection