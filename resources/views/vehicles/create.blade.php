@extends('layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Add Vehicle</h2>

    <form action="{{ route('vehicles.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="vehicle_name" placeholder="Vehicle Name"
               class="w-full border p-2 rounded" required>

        <input type="text" name="vehicle_type" placeholder="Vehicle Type"
               class="w-full border p-2 rounded" required>

        <input type="text" name="plate_number" placeholder="Plate Number"
               class="w-full border p-2 rounded" required>

        <input type="number" step="0.01" name="rent_price_per_day" placeholder="Price per Day"
               class="w-full border p-2 rounded" required>
               <div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">Vehicle Image</label>
    <input type="file" name="image"
           class="border rounded p-2 w-full">
</div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        

    </form>
</div>
@endsection
