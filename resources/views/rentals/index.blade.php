@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 p-4 md:p-8">
    
    <!-- Page Header -->
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Rental Bookings</h1>
                <p class="text-gray-600">Manage and track all vehicle rental bookings</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex space-x-4">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search bookings..." 
                           class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none w-full md:w-64">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                
                <a href="{{ route('rentals.available') }}" 
                   class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-2.5 rounded-xl font-medium hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                    <i class="fas fa-car mr-2"></i>
                    Available Vehicles
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Bookings</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $rentals->total() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">This month: <span class="font-medium text-gray-700">{{ $rentals->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count() }}</span></p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Revenue</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">
                            Rs. {{ number_format($rentals->sum('total_amount'), 0) }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">Avg per booking: <span class="font-medium text-gray-700">Rs. {{ number_format($rentals->avg('total_amount') ?? 0, 0) }}</span></p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Active Rentals</p>
                        <p class="text-2xl font-bold text-indigo-600 mt-1">
                            {{ $rentals->where('status', 'approved')->where('end_date', '>=', now())->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-key text-indigo-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">Currently running</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Pending Approval</p>
                        <p class="text-2xl font-bold text-yellow-600 mt-1">
                            {{ $rentals->where('status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">Awaiting approval</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Booking List</h3>
                <p class="text-sm text-gray-500 mt-1">All rental bookings and their status</p>
            </div>
            
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                <button class="px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Export
                </button>
                <button class="px-4 py-2 text-sm font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 transition flex items-center">
                    <i class="fas fa-print mr-2"></i>
                    Print
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
                                <span class="text-sm font-semibold text-gray-700">Booking ID</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Vehicle & Customer</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Rental Period</span>
                                <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Duration</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left">
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-700">Amount</span>
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
                    @forelse ($rentals as $rental)
                    <tr class="hover:bg-blue-50 transition duration-150 group">
                        <!-- Booking ID -->
                        <td class="py-4 px-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-100 to-indigo-200 rounded-xl flex items-center justify-center">
                                <span class="text-blue-700 font-bold text-lg">{{ $loop->iteration }}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1 text-center">ID: {{ $rental->id }}</p>
                        </td>

                        <!-- Vehicle & Customer -->
                        <td class="py-4 px-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-car text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">{{ $rental->vehicle->vehicle_name ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500">{{ $rental->vehicle->vehicle_type ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $rental->user->name ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500">Customer</p>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Rental Period -->
                        <td class="py-4 px-6">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-calendar-plus text-green-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Start Date</p>
                                        <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($rental->start_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-calendar-minus text-red-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">End Date</p>
                                        <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($rental->end_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Duration -->
                        <td class="py-4 px-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-indigo-600 mb-1">{{ $rental->total_days }}</div>
                                <div class="text-sm text-gray-500">days</div>
                                <div class="text-xs text-gray-400 mt-2">
                                    @php
                                        $daysLeft = \Carbon\Carbon::parse($rental->end_date)->diffInDays(now());
                                    @endphp
                                    @if($rental->status === 'approved' && $rental->end_date >= now())
                                        <span class="text-green-600 font-medium">{{ $daysLeft }} days left</span>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <!-- Amount -->
                        <td class="py-4 px-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600 mb-1">
                                    Rs. {{ number_format($rental->total_amount) }}
                                </div>
                                <div class="text-xs text-gray-500">Total amount</div>
                                @if($rental->total_days > 0)
                                <div class="text-xs text-gray-400 mt-1">
                                    Rs. {{ number_format($rental->total_amount / $rental->total_days, 0) }}/day
                                </div>
                                @endif
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-6">
                            @php
                                $statusConfig = [
                                    'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fa-clock', 'border' => 'border-yellow-200'],
                                    'approved' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fa-check-circle', 'border' => 'border-green-200'],
                                    'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'fa-times-circle', 'border' => 'border-red-200'],
                                ];
                                $config = $statusConfig[$rental->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => 'fa-question-circle', 'border' => 'border-gray-200'];
                            @endphp
                            <div class="inline-flex flex-col items-center">
                                <span class="px-4 py-2 {{ $config['bg'] }} {{ $config['text'] }} rounded-full font-medium text-sm border {{ $config['border'] }} flex items-center">
                                    <i class="fas {{ $config['icon'] }} mr-2"></i>
                                    {{ ucfirst($rental->status) }}
                                </span>
                                @if($rental->status === 'approved' && $rental->start_date <= now() && $rental->end_date >= now())
                                <div class="mt-2 w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                @endif
                            </div>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-6">
                            <div class="space-y-2">
                                <a href="{{ route('rentals.confirmation', $rental->id) }}"
                                   class="block w-full px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center group-hover:scale-105">
                                    <i class="fas fa-eye mr-2"></i>
                                    View Details
                                </a>
                                
                                <div class="flex space-x-2">
                                    @if($rental->status === 'pending')
                                    <button class="flex-1 px-3 py-1.5 bg-green-100 text-green-700 rounded-lg text-sm font-medium hover:bg-green-200 transition flex items-center justify-center">
                                        <i class="fas fa-check text-xs mr-1"></i>
                                        Approve
                                    </button>
                                    <button class="flex-1 px-3 py-1.5 bg-red-100 text-red-700 rounded-lg text-sm font-medium hover:bg-red-200 transition flex items-center justify-center">
                                        <i class="fas fa-times text-xs mr-1"></i>
                                        Reject
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-16 px-6 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-calendar-times text-gray-400 text-3xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings found</h3>
                                <p class="text-gray-500 mb-6">There are no rental bookings to display.</p>
                                <a href="{{ route('rentals.available') }}" 
                                   class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg font-medium hover:shadow-lg transition flex items-center">
                                    <i class="fas fa-car mr-2"></i>
                                    Book a Vehicle
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($rentals->count() > 0)
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <!-- Pagination Info -->
            <div class="text-sm text-gray-700 mb-4 sm:mb-0">
                Showing <span class="font-medium">{{ $rentals->firstItem() ?? 0 }}</span> to 
                <span class="font-medium">{{ $rentals->lastItem() ?? 0 }}</span> of 
                <span class="font-medium">{{ $rentals->total() }}</span> bookings
            </div>
            
            <!-- Pagination Links -->
            @if($rentals->hasPages())
            <div class="flex items-center space-x-2">
                <!-- Previous Button -->
                @if($rentals->onFirstPage())
                <span class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
                @else
                <a href="{{ $rentals->previousPageUrl() }}" 
                   class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-chevron-left"></i>
                </a>
                @endif
                
                <!-- Page Numbers -->
                @foreach ($rentals->getUrlRange(max(1, $rentals->currentPage() - 2), min($rentals->lastPage(), $rentals->currentPage() + 2)) as $page => $url)
                    @if($page == $rentals->currentPage())
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
                @if($rentals->hasMorePages())
                <a href="{{ $rentals->nextPageUrl() }}" 
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

    <!-- Quick Stats -->
    @if($rentals->count() > 0)
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h4 class="font-bold text-lg">Pending Approval</h4>
                    <p class="text-blue-100 text-sm">{{ $rentals->where('status', 'pending')->count() }} bookings</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
            </div>
            <button class="w-full bg-white text-blue-600 py-2.5 rounded-xl font-bold hover:bg-blue-50 transition">
                Review Now
            </button>
        </div>
        
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h4 class="font-bold text-lg">Active Rentals</h4>
                    <p class="text-green-100 text-sm">{{ $rentals->where('status', 'approved')->where('end_date', '>=', now())->count() }} active</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-key text-white text-xl"></i>
                </div>
            </div>
            <button class="w-full bg-white text-green-600 py-2.5 rounded-xl font-bold hover:bg-green-50 transition">
                Manage Active
            </button>
        </div>
        
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h4 class="font-bold text-lg">Revenue Overview</h4>
                    <p class="text-purple-100 text-sm">Rs. {{ number_format($rentals->sum('total_amount'), 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
            </div>
            <button class="w-full bg-white text-purple-600 py-2.5 rounded-xl font-bold hover:bg-purple-50 transition">
                View Report
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
    
    // Status filter functionality
    const statusButtons = document.querySelectorAll('[class*="bg-"] button');
    statusButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const status = this.textContent.trim().toLowerCase();
            filterByStatus(status);
        });
    });
    
    function filterByStatus(status) {
        const rows = document.querySelectorAll('tbody tr:not(:first-child)');
        
        rows.forEach(row => {
            const statusElement = row.querySelector('[class*="bg-"]');
            if (statusElement) {
                const rowStatus = statusElement.textContent.trim().toLowerCase();
                if (status === 'all' || rowStatus.includes(status)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }
    
    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Search bookings..."]');
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
    background: linear-gradient(to right, #3b82f6, #8b5cf6);
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to right, #2563eb, #7c3aed);
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
.hover\:-translate-y-0\.5:hover {
    transform: translateY(-2px);
}

.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

/* Table row hover gradient */
tr:hover {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
}

/* Status badge animations */
@keyframes statusPulse {
    0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
    100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
}

.bg-green-500.animate-pulse {
    animation: statusPulse 2s infinite;
}

/* Date styling */
.text-green-600 {
    color: #059669;
}

.text-red-600 {
    color: #dc2626;
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection