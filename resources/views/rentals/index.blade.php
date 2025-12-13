@extends('layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Rental Bookings</h1>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Vehicle</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Start Date</th>
                    <th class="px-6 py-3">End Date</th>
                    <th class="px-6 py-3">Days</th>
                    <th class="px-6 py-3">Total Amount</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($rentals as $rental)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4 font-medium">
                            {{ $rental->vehicle->vehicle_name ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $rental->user->name ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4">{{ $rental->start_date }}</td>
                        <td class="px-6 py-4">{{ $rental->end_date }}</td>

                        <td class="px-6 py-4">{{ $rental->total_days }}</td>

                        <td class="px-6 py-4 font-semibold">
                            Rs. {{ number_format($rental->total_amount) }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($rental->status === 'pending')
                                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif ($rental->status === 'approved')
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                    Approved
                                </span>
                            @elseif ($rental->status === 'cancelled')
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-800">
                                    Cancelled
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <a href="#"
                               class="text-blue-600 hover:underline">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-6 text-center text-gray-500">
                            No rental bookings found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

    <div class="mt-4">
        {{ $rentals->links() }}
    </div>
    <a href="{{ route('rentals.available') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Available Vehicles
        </a>

</div>
@endsection
