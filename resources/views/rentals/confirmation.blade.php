@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow-lg rounded-lg p-8">

        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-green-100">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mt-4">
                Booking Confirmed!
            </h1>

            <p class="text-gray-500 mt-2">
                Your rental request has been successfully submitted.
            </p>
        </div>

        <div class="border-t pt-6 space-y-4 text-sm">

            <div class="flex justify-between">
                <span class="text-gray-500">Vehicle</span>
                <span class="font-medium">{{ $rental->vehicle->vehicle_name }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Customer</span>
                <span class="font-medium">{{ $rental->user->name }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Start Date</span>
                <span class="font-medium">{{ $rental->start_date }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">End Date</span>
                <span class="font-medium">{{ $rental->end_date }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Total Days</span>
                <span class="font-medium">{{ $rental->total_days }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Total Amount</span>
                <span class="font-semibold text-green-600">
                    Rs. {{ number_format($rental->total_amount) }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Status</span>
                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                    Pending Approval
                </span>
            </div>

        </div>

        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('rentals.index') }}"
               class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                My Bookings
            </a>

            <a href="{{ route('vehicles.index') }}"
               class="px-6 py-2 border rounded text-gray-700 hover:bg-gray-100">
                Rent Another Vehicle
            </a>

            <a href="{{ route('payment.create', $rental) }}"
   class="bg-blue-600 text-white px-4 py-2 rounded">
    Proceed to Payment
</a>

        </div>

    </div>

</div>
@endsection
