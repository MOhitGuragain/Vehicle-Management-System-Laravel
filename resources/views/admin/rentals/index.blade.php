@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Manage Rental Bookings</h1>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3">Vehicle</th>
                    <th class="px-6 py-3">User</th>
                    <th class="px-6 py-3">Dates</th>
                    <th class="px-6 py-3">Amount</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="px-6 py-4">{{ $rental->vehicle->vehicle_name }}</td>
                        <td class="px-6 py-4">{{ $rental->user->name }}</td>
                        <td class="px-6 py-4">
                            {{ $rental->start_date }} → {{ $rental->end_date }}
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            Rs. {{ number_format($rental->total_amount) }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full
                                {{ $rental->status === 'approved' ? 'bg-green-100 text-green-800' :
                                   ($rental->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                                   'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($rental->status) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 space-x-2">
                            @if ($rental->status === 'pending')
                                <form method="POST" action="{{ route('rentals.approve', $rental) }}" class="inline">
                                    @csrf
                                    <button class="bg-green-600 text-white px-3 py-1 rounded">
                                        Approve
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('rentals.reject', $rental) }}" class="inline">
                                    @csrf
                                    <button class="bg-red-600 text-white px-3 py-1 rounded">
                                        Reject
                                    </button>
                                </form>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $rentals->links() }}
    </div>
</div>
@endsection
