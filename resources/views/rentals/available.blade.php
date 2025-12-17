@extends('layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Available Vehicles
        </h1>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Vehicle Name</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Brand</th>
                    <th class="px-6 py-3">Seats</th>
                    <th class="px-6 py-3">Price / Day</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($vehicles as $vehicle)
                    <tr>
                        <td class="px-6 py-4">
                            {{ $vehicles->firstItem() + $loop->index }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $vehicle->vehicle_name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $vehicle->vehicle_type }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $vehicle->brand }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $vehicle->seat_capacity }}
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            Rs. {{ number_format($vehicle->rent_price_per_day) }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('rentals.create', $vehicle) }}"
                               class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                                Rent
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                            No vehicles available right now.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $vehicles->links() }}
    </div>

</div>
@endsection
