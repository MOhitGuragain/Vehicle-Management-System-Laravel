@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-10 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-4">
        Rent {{ $vehicle->vehicle_name }}
    </h2>

    <p class="mb-4 text-gray-600">
        Price per day: <strong>Rs. {{ $vehicle->rent_price_per_day }}</strong>
    </p>

    <form method="POST" action="{{ route('rentals.store') }}">
        @csrf

        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

        <div class="mb-4">
            <label class="block mb-1">Start Date</label>
            <input type="date" name="start_date" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">End Date</label>
            <input type="date" name="end_date" class="w-full border p-2 rounded" required>
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Confirm Booking
        </button>
    </form>
</div>
@endsection
