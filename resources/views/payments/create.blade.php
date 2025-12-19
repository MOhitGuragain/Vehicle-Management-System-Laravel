@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Pay for Rental</h2>

    <p class="mb-2"><strong>Vehicle:</strong> {{ $rental->vehicle->vehicle_name }}</p>
    <p class="mb-4"><strong>Amount:</strong> Rs. {{ $rental->total_amount }}</p>

    <!-- eSewa -->
    <form method="POST" action="{{ route('payment.esewa', $rental->id) }}">
        @csrf
        <button class="w-full bg-green-600 text-white py-2 rounded mb-3">
            Pay with eSewa
        </button>
    </form>

    <!-- Khalti -->
    <form method="POST" action="{{ route('payment.khalti', $rental->id) }}">
        @csrf
        <button class="w-full bg-purple-600 text-white py-2 rounded">
            Pay with Khalti
        </button>
    </form>

</div>
@endsection
