@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-6">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Vehicle Management</h1>
            <p class="text-gray-600 mt-2">Manage your rental vehicles efficiently</p>
        </div>
        
        <div class="mt-4 md:mt-0 flex space-x-3">
            <div class="relative">
                <input type="text" placeholder="Search vehicles..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none w-full md:w-64">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            
            <a href="{{ route('vehicles.create') }}" 
               class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2.5 rounded-lg font-medium hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add Vehicle
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg flex items-center animate-pulse">
            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
            <div>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Vehicles</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $vehicles->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-car text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Available</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ $vehicles->where('status', 'available')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Rented</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        {{ $vehicles->where('status', 'rented')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-key text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Maintenance</p>
                    <p class="text-2xl font-bold text-yellow-600 mt-1">
                        {{ $vehicles->where('status', 'maintenance')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-wrench text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicles Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Vehicle List</h3>
                <p class="text-sm text-gray-500 mt-1">All vehicles in your fleet</p>
            </div>
            
            <div class="mt-4 sm:mt-0 flex space-x-2">
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Export
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Vehicle</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Type</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Plate Number</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Price/Day</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Status</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <span class="text-sm font-semibold text-gray-700">Actions</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach($vehicles as $vehicle)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <!-- Vehicle Image & Name -->
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-gray-100">
                                    @if($vehicle->image)
                                        <img src="{{ asset('storage/' . $vehicle->image) }}" 
                                             alt="{{ $vehicle->vehicle_name }}"
                                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-r from-blue-100 to-purple-100 flex items-center justify-center">
                                            <i class="fas fa-car text-gray-400 text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ $vehicle->vehicle_name }}</div>
                                    <div class="text-sm text-gray-500 mt-1">
                                        <i class="fas fa-gas-pump mr-1"></i>
                                        {{ $vehicle->fuel_type ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Vehicle Type -->
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ $vehicle->vehicle_type }}
                            </span>
                        </td>

                        <!-- Plate Number -->
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center mr-3">
                                    <i class="fas fa-id-card text-gray-500"></i>
                                </div>
                                <span class="font-mono font-medium text-gray-800">{{ $vehicle->plate_number }}</span>
                            </div>
                        </td>

                        <!-- Price Per Day -->
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded flex items-center justify-center mr-3">
                                    <i class="fas fa-dollar-sign text-green-600"></i>
                                </div>
                                <div>
                                    <span class="font-bold text-gray-900">${{ $vehicle->rent_price_per_day }}</span>
                                    <div class="text-xs text-gray-500">per day</div>
                                </div>
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-6">
                            @php
                                $statusConfig = [
                                    'available' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fa-check-circle'],
                                    'rented' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'fa-key'],
                                    'maintenance' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fa-wrench'],
                                    'unavailable' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'fa-times-circle']
                                ];
                                $config = $statusConfig[$vehicle->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => 'fa-question-circle'];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                <i class="fas {{ $config['icon'] }} mr-1 text-xs"></i>
                                {{ ucfirst($vehicle->status) }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('vehicles.edit', $vehicle->id) }}" 
                                   class="w-10 h-10 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg flex items-center justify-center transition hover:-translate-y-0.5"
                                   title="Edit Vehicle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-10 h-10 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg flex items-center justify-center transition hover:-translate-y-0.5"
                                            title="Delete Vehicle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                
                                <!-- Rent Button (Only if available) -->
                                @if ($vehicle->status === 'available')
                                    <a href="{{ route('rentals.create', $vehicle->id) }}"
                                       class="w-10 h-10 bg-green-100 hover:bg-green-200 text-green-600 rounded-lg flex items-center justify-center transition hover:-translate-y-0.5"
                                       title="Rent Vehicle">
                                        <i class="fas fa-calendar-check"></i>
                                    </a>
                                @endif
                                
                                <!-- View Details Button -->
                                <a href="#"
                                   class="w-10 h-10 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition hover:-translate-y-0.5"
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table Footer with Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <!-- Pagination Info -->
            <div class="text-sm text-gray-700 mb-4 sm:mb-0">
                Showing <span class="font-medium">{{ $vehicles->firstItem() ?? 0 }}</span> to 
                <span class="font-medium">{{ $vehicles->lastItem() ?? 0 }}</span> of 
                <span class="font-medium">{{ $vehicles->total() }}</span> vehicles
            </div>
            
            <!-- Pagination Links -->
            @if($vehicles->hasPages())
            <div class="flex items-center space-x-2">
                <!-- Previous Button -->
                @if($vehicles->onFirstPage())
                <span class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
                @else
                <a href="{{ $vehicles->previousPageUrl() }}" 
                   class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-chevron-left"></i>
                </a>
                @endif
                
                <!-- Page Numbers -->
                @foreach ($vehicles->getUrlRange(max(1, $vehicles->currentPage() - 2), min($vehicles->lastPage(), $vehicles->currentPage() + 2)) as $page => $url)
                    @if($page == $vehicles->currentPage())
                    <span class="w-10 h-10 flex items-center justify-center bg-blue-600 text-white rounded-lg font-medium">
                        {{ $page }}
                    </span>
                    @else
                    <a href="{{ $url }}" 
                       class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        {{ $page }}
                    </a>
                    @endif
                @endforeach
                
                <!-- Next Button -->
                @if($vehicles->hasMorePages())
                <a href="{{ $vehicles->nextPageUrl() }}" 
                   class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-chevron-right"></i>
                </a>
                @else
                <span class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
                @endif
            </div>
            @endif
        </div>
    </div>

    <!-- Empty State -->
    @if($vehicles->count() == 0)
    <div class="mt-8 bg-white rounded-2xl p-12 text-center shadow-sm border border-gray-100">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-car text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No vehicles found</h3>
        <p class="text-gray-500 mb-6">Get started by adding your first vehicle to the fleet.</p>
        <a href="{{ route('vehicles.create') }}" 
           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Add First Vehicle
        </a>
    </div>
    @endif
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this vehicle? This action cannot be undone.');
}

// Add some interactivity
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.05)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });
});
</script>

<style>
/* Custom scrollbar */
.overflow-x-auto::-webkit-scrollbar {
    height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Smooth transitions */
tr {
    transition: all 0.2s ease-in-out;
}

/* Card hover effects */
.hover\:-translate-y-0\.5:hover {
    transform: translateY(-2px);
}

/* Animation for success message */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection