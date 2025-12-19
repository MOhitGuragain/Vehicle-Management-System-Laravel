@extends('layouts.app')

@section('content')
<div class="p-6">
<h2 class="text-xl font-bold mb-4">Vehicle Maintenance</h2>

<table class="w-full bg-white shadow rounded">
<thead class="bg-gray-100">
<tr>
<th class="p-3">Vehicle</th>
<th class="p-3">Description</th>
<th class="p-3">Cost</th>
<th class="p-3">Date</th>
<th class="p-3">Status</th>
<th class="p-3">Action</th>
</tr>
</thead>

<tbody>
@foreach($maintenances as $m)
<tr class="border-t">
<td class="p-3">{{ $m->vehicle->vehicle_name }}</td>
<td class="p-3">{{ $m->description }}</td>
<td class="p-3">Rs. {{ $m->cost }}</td>
<td class="p-3">{{ $m->maintenance_date }}</td>
<td class="p-3">{{ ucfirst($m->status) }}</td>
<td class="p-3">
@if($m->status == 'pending')
<form method="POST" action="{{ route('maintenance.complete', $m->id) }}">
@csrf
<button class="bg-green-600 text-white px-3 py-1 rounded">Complete</button>
</form>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<a href="{{ route('maintenance.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Maintenance
        </a>
@endsection
