@extends('layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Vehicles</h2>
        <a href="{{ route('vehicles.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Vehicle
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-3">Image</th>
                <th class="border p-3">Name</th>
                <th class="border p-3">Type</th>
                <th class="border p-3">Plate</th>
                <th class="border p-3">Price/Day</th>
                <th class="border p-3">Status</th>
                <th class="border p-3">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <!-- IMAGE -->
                <td class="border p-3">
                    @if($vehicle->image)
                        <img src="{{ asset('storage/' . $vehicle->image) }}" 
                             class="w-16 h-16 object-cover rounded shadow">
                    @else
                        <span class="text-gray-500 text-sm">No image</span>
                    @endif
                </td>

                <td class="border p-3">{{ $vehicle->vehicle_name }}</td>
                <td class="border p-3">{{ $vehicle->vehicle_type }}</td>
                <td class="border p-3">{{ $vehicle->plate_number }}</td>
                <td class="border p-3">${{ $vehicle->rent_price_per_day }}</td>

                <td class="border p-3 capitalize">{{ $vehicle->status }}</td>

                <td class="border p-3">
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" 
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}"
                          method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" 
                                onclick="return confirm('Delete this?')">
                            Delete
                        </button>
                    </form>
                        @if ($vehicle->status === 'available')
                <a href="{{ route('rentals.create', $vehicle) }}"
                               class="bg-green-400 text-white px-4 py-1 rounded hover:bg-green-700">
                                Rent
                            </a>
                        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $vehicles->links() }}
    </div>
</div>
@endsection
