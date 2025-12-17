@extends('layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Edit Vehicle</h2>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-4">

        @csrf
        @method('PUT')

        <input type="text" 
               name="vehicle_name" 
               value="{{ $vehicle->vehicle_name }}"
               class="w-full border p-2 rounded" 
               required>

        <input type="text" 
               name="vehicle_type" 
               value="{{ $vehicle->vehicle_type }}"
               class="w-full border p-2 rounded" 
               required>

        <input type="text" 
               name="plate_number" 
               value="{{ $vehicle->plate_number }}"
               class="w-full border p-2 rounded" 
               required>

        <input type="number" 
               step="0.01" 
               name="rent_price_per_day" 
               value="{{ $vehicle->rent_price_per_day }}"
               class="w-full border p-2 rounded" 
               required>

        <!-- VEHICLE IMAGE -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Vehicle Image</label>

            <!-- Show old image if exists -->
            @if($vehicle->image)
                <img src="{{ asset('storage/' . $vehicle->image) }}" 
                     class="w-32 h-32 object-cover rounded mb-3 shadow">
            @endif

            <input type="file" 
                   name="image" 
                   class="border rounded p-2 w-full">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Update
        </button>

    </form>
</div>
@endsection
