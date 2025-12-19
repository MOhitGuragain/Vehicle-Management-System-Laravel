@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-emerald-50 p-4 md:p-8">
    
    <!-- Page Header -->
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Available Vehicles</h1>
                <p class="text-gray-600">Browse and rent from our available fleet</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex space-x-4">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search vehicles..." 
                           class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none w-full md:w-64">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                
                <div class="relative">
                    <select class="pl-4 pr-10 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none appearance-none bg-white">
                        <option>All Types</option>
                        <option>Sedan</option>
                        <option>SUV</option>
                        <option>Hatchback</option>
                        <option>Truck</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-3.5 text-gray-400 pointer-events-none"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Available</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $vehicles->count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-car text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Average Price</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">
                            Rs. {{ number_format($vehicles->avg('rent_price_per_day') ?? 0, 0) }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Most Seats</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">
                            {{ $vehicles->max('seat_capacity') ?? 0 }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Brands</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">
                            {{ $vehicles->unique('brand')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-tag text-orange-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Vehicle List</h3>
                <p class="text-sm text-gray-500 mt-1">Showing {{ $vehicles->count() }} available vehicles</p>
            </div>
            
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center">
                    <i class="fas fa-sort mr-2"></i>
                    Sort By
                </button>
                <button class="px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition flex items-center">
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
                                <span class="text-sm font-semibold text-gray-700">ID</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Vehicle</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Specifications</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Price</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <span class="text-sm font-semibold text-gray-700">Status</span>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <span class="text-sm font-semibold text-gray-700">Action</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($vehicles as $vehicle)
                    <tr class="hover:bg-blue-50 transition duration-150 group">
                        <!-- ID -->
                        <td class="py-4 px-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                <span class="text-blue-700 font-bold">{{ $vehicles->firstItem() + $loop->index }}</span>
                            </div>
                        </td>

                        <!-- Vehicle Name & Brand -->
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-car text-white text-xl"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-lg">{{ $vehicle->vehicle_name }}</div>
                                    <div class="flex items-center text-gray-600 text-sm mt-1">
                                        <i class="fas fa-tag mr-2 text-gray-400"></i>
                                        {{ $vehicle->brand }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Specifications -->
                        <td class="py-4 px-6">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-car text-gray-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Type</p>
                                        <p class="text-sm font-medium text-gray-800">{{ $vehicle->vehicle_type }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-friends text-gray-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Seats</p>
                                        <p class="text-sm font-medium text-gray-800">{{ $vehicle->seat_capacity }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Price -->
                        <td class="py-4 px-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600 mb-1">
                                    Rs. {{ number_format($vehicle->rent_price_per_day) }}
                                </div>
                                <div class="text-xs text-gray-500">per day</div>
                                <div class="text-xs text-gray-400 mt-1">+ taxes & fees</div>
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-6">
                            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 rounded-full font-medium text-sm">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                Available
                            </div>
                        </td>

                        <!-- Action -->
                        <td class="py-4 px-6">
                            <a href="{{ route('rentals.create', $vehicle) }}"
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-medium hover:shadow-xl hover:shadow-blue-200 hover:-translate-y-1 transition-all duration-300 group-hover:scale-105">
                                <i class="fas fa-calendar-check mr-2"></i>
                                Rent Now
                            </a>
                            <p class="text-xs text-gray-500 mt-2 text-center">Instant booking</p>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 px-6 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-car text-gray-400 text-3xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">No vehicles available</h3>
                                <p class="text-gray-500 mb-6">All vehicles are currently rented or under maintenance.</p>
                                <div class="flex space-x-4">
                                    <button class="px-4 py-2 text-blue-600 hover:text-blue-800 font-medium">
                                        <i class="fas fa-sync-alt mr-2"></i>
                                        Refresh
                                    </button>
                                    <a href="#" class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">
                                        <i class="fas fa-bell mr-2"></i>
                                        Notify Me
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($vehicles->count() > 0)
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
        @endif
    </div>

    <!-- Quick Actions -->
    @if($vehicles->count() > 0)
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Quick Rent</h4>
                    <p class="text-blue-100 text-sm">Rent for 24 hours</p>
                </div>
            </div>
            <button class="w-full bg-white text-blue-600 py-3 rounded-xl font-bold hover:bg-blue-50 transition">
                Book Now
            </button>
        </div>
        
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-2xl p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Long Term</h4>
                    <p class="text-green-100 text-sm">Weekly/Monthly deals</p>
                </div>
            </div>
            <button class="w-full bg-white text-green-600 py-3 rounded-xl font-bold hover:bg-green-50 transition">
                View Deals
            </button>
        </div>
        
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-2xl p-6">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-headset text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Need Help?</h4>
                    <p class="text-purple-100 text-sm">24/7 customer support</p>
                </div>
            </div>
            <button class="w-full bg-white text-purple-600 py-3 rounded-xl font-bold hover:bg-purple-50 transition">
                Contact Support
            </button>
        </div>
    </div>
    @endif
</div>

<!-- JavaScript for Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.05)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });
    
    // Add click effect to rent buttons
    const rentButtons = document.querySelectorAll('a[href*="rentals.create"]');
    rentButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            this.classList.add('scale-95');
            setTimeout(() => {
                this.classList.remove('scale-95');
            }, 200);
        });
    });
    
    // Search functionality (basic)
    const searchInput = document.querySelector('input[placeholder="Search vehicles..."]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm) || searchTerm === '') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
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
    background: linear-gradient(to right, #3b82f6, #10b981);
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to right, #2563eb, #059669);
}

/* Animations */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Transition effects */
.transition {
    transition: all 0.3s ease-in-out;
}

/* Hover effects */
.hover\:-translate-y-1:hover {
    transform: translateY(-4px);
}

.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

/* Gradient backgrounds */
.bg-gradient-to-br {
    background-size: 200% 200%;
}

/* Table row hover effect */
tr:hover {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection