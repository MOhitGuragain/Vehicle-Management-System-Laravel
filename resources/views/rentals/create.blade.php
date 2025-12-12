@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">

    <h2 class="text-2xl font-bold mb-4">Rent {{ $vehicle->vehicle_name }}</h2>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

        <div class="mb-4">
            <label class="block mb-1 font-medium">Start Date</label>
            <input type="date" name="start_date" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">End Date</label>
            <input type="date" name="end_date" class="w-full p-2 border rounded" required>
        </div>

        <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Confirm Booking
        </button>

    </form>
</div>
@endsection
