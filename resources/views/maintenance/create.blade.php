@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">

<h2 class="text-lg font-bold mb-4">Add Maintenance</h2>

<form method="POST" action="{{ route('maintenance.store') }}">
@csrf

<select name="vehicle_id" class="w-full border p-2 mb-3">
@foreach($vehicles as $vehicle)
<option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_name }}</option>
@endforeach
</select>

<textarea name="description" class="w-full border p-2 mb-3" placeholder="Description"></textarea>

<input type="number" name="cost" class="w-full border p-2 mb-3" placeholder="Cost">

<input type="date" name="maintenance_date" class="w-full border p-2 mb-3">

<button class="bg-blue-600 text-white w-full py-2 rounded">
Save
</button>

</form>

</div>
@endsection
