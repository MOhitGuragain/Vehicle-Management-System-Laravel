@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title">Add Maintenance Record</h2>

    @if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('maintenance.store') }}" method="POST" class="maintenance-form">
        @csrf

        <label for="vehicle_id">Vehicle:</label>
        <select name="vehicle_id" id="vehicle_id" required>
            <option value="">-- Select Vehicle --</option>
            @foreach($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}" {{ (old('vehicle_id', $vehicleId ?? '') == $vehicle->id) ? 'selected' : '' }}>
                {{ $vehicle->vehicle_name }} ({{ $vehicle->plate_number }})
            </option>
            @endforeach
        </select>

        <label for="service_type">Service Type:</label>
        <input type="text" name="service_type" id="service_type" value="{{ old('service_type') }}" required>

        <label for="service_date">Service Date:</label>
        <input type="date" name="service_date" id="service_date" value="{{ old('service_date') }}" required>

        <label for="next_service_date">Next Service Date:</label>
        <input type="date" name="next_service_date" id="next_service_date" value="{{ old('next_service_date') }}">

        <label for="cost">Cost:</label>
        <input type="number" step="0.01" name="cost" id="cost" value="{{ old('cost') }}">

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" {{ old('status')=='pending'?'selected':'' }}>Pending</option>
            <option value="completed" {{ old('status')=='completed'?'selected':'' }}>Completed</option>
            <option value="overdue" {{ old('status')=='overdue'?'selected':'' }}>Overdue</option>
        </select>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes">{{ old('notes') }}</textarea>

        <button type="submit" class="btn-submit">Add Maintenance</button>
    </form>
</div>

<style>
    .title {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .alert-error {
        background-color: #f8d7da;
        border: 1px solid #f5c2c7;
        padding: 10px 15px;
        color: #842029;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .maintenance-form {
        display: flex;
        flex-direction: column;
        max-width: 500px;
    }

    .maintenance-form label {
        margin-top: 10px;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .maintenance-form input,
    .maintenance-form select,
    .maintenance-form textarea {
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        box-sizing: border-box;
    }

    .maintenance-form textarea {
        resize: vertical;
        min-height: 80px;
    }

    .maintenance-form input:focus,
    .maintenance-form select:focus,
    .maintenance-form textarea:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .btn-submit {
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }
</style>
@endsection