@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-8">
    
    <!-- Page Header -->
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Admin Dashboard</h1>
                <p class="text-gray-600">Welcome back! Here's your system overview.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center space-x-4">
                <div class="text-sm text-gray-500">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ now()->format('F d, Y') }}
                </div>
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Export Report
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Users -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Users</p>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center text-green-500 text-sm">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>12% from last month</span>
            </div>
        </div>

        <!-- Total Vehicles -->
        <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Vehicles</p>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $totalVehicles }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-car text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center text-green-500 text-sm">
                <i class="fas fa-plus mr-1"></i>
                <span>{{ $availableVehicles }} available</span>
            </div>
        </div>

        <!-- Available Vehicles -->
        <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl p-6 shadow-lg border border-emerald-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Available Vehicles</p>
                    <h2 class="text-3xl font-bold text-emerald-700">{{ $availableVehicles }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                {{ round(($availableVehicles / $totalVehicles) * 100, 1) }}% of fleet
            </div>
        </div>

        <!-- Rented Vehicles -->
        <div class="bg-gradient-to-br from-white to-red-50 rounded-2xl p-6 shadow-lg border border-red-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Rented Vehicles</p>
                    <h2 class="text-3xl font-bold text-red-600">{{ $rentedVehicles }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-key text-white text-2xl"></i>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                {{ round(($rentedVehicles / $totalVehicles) * 100, 1) }}% utilization
            </div>
        </div>

        <!-- Total Rentals -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Rentals</p>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $totalRentals }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center text-green-500 text-sm">
                <i class="fas fa-chart-line mr-1"></i>
                <span>Active bookings</span>
            </div>
        </div>

        <!-- Pending Rentals -->
        <div class="bg-gradient-to-br from-white to-yellow-50 rounded-2xl p-6 shadow-lg border border-yellow-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Pending Rentals</p>
                    <h2 class="text-3xl font-bold text-yellow-600">{{ $pendingRentals }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                {{ $pendingRentals > 0 ? 'Requires attention' : 'All clear' }}
            </div>
        </div>

        <!-- Approved Rentals -->
        <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Approved Rentals</p>
                    <h2 class="text-3xl font-bold text-green-700">{{ $approvedRentals }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-double text-white text-2xl"></i>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                {{ round(($approvedRentals / $totalRentals) * 100, 1) }}% approved
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
                    <h2 class="text-3xl font-bold text-purple-700">
                        Rs. {{ number_format($totalRevenue) }}
                    </h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center text-green-500 text-sm">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>Monthly average</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        <!-- Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Revenue Overview</h3>
                <select class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>Last 3 Months</option>
                </select>
            </div>
            
            <!-- Simple Bar Chart -->
            <div class="h-64 flex items-end space-x-2">
                <div class="flex-1 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg" style="height: 80%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg" style="height: 65%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg" style="height: 90%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg" style="height: 75%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg" style="height: 85%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-500 to-blue-600 rounded-t-lg" style="height: 95%"></div>
                <div class="flex-1 bg-gradient-to-t from-blue-300 to-blue-400 rounded-t-lg" style="height: 60%"></div>
            </div>
            <div class="flex justify-between text-xs text-gray-500 mt-2">
                <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
            </div>
        </div>

        <!-- Vehicle Status Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Vehicle Status Distribution</h3>
                <div class="text-sm text-gray-500">{{ $totalVehicles }} total vehicles</div>
            </div>
            
            <!-- Pie Chart Visualization -->
            <div class="flex items-center justify-center">
                <div class="relative w-48 h-48">
                    <!-- Pie Chart Segments -->
                    <div class="absolute inset-0 rounded-full" 
                         style="background: conic-gradient(
                             #10b981 0% {{ ($availableVehicles/$totalVehicles)*100 }}%,
                             #3b82f6 {{ ($availableVehicles/$totalVehicles)*100 }}% {{ (($availableVehicles + $rentedVehicles)/$totalVehicles)*100 }}%,
                             #f59e0b {{ (($availableVehicles + $rentedVehicles)/$totalVehicles)*100 }}% 100%
                         )"></div>
                    <div class="absolute inset-8 bg-white rounded-full"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">{{ $totalVehicles }}</div>
                            <div class="text-sm text-gray-500">Total</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Legend -->
            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-700">Available</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">{{ $availableVehicles }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-700">Rented</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">{{ $rentedVehicles }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                        <span class="text-sm text-gray-700">Maintenance</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">{{ $totalVehicles - $availableVehicles - $rentedVehicles }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="#" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-car text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Manage Vehicles</h4>
                    <p class="text-blue-100 text-sm">View & edit fleet</p>
                </div>
            </div>
            <div class="text-right">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        
        <a href="#" class="bg-gradient-to-r from-green-600 to-emerald-700 text-white rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-calendar-check text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Pending Rentals</h4>
                    <p class="text-green-100 text-sm">{{ $pendingRentals }} awaiting</p>
                </div>
            </div>
            <div class="text-right">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        
        <a href="#" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">User Management</h4>
                    <p class="text-purple-100 text-sm">{{ $totalUsers }} users</p>
                </div>
            </div>
            <div class="text-right">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
        
        <a href="#" class="bg-gradient-to-r from-red-600 to-pink-700 text-white rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-chart-bar text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Analytics</h4>
                    <p class="text-red-100 text-sm">View reports</p>
                </div>
            </div>
            <div class="text-right">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>
    </div>

    <!-- Recent Activity -->
    <div class="mt-10 bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-car text-green-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">New vehicle added</p>
                    <p class="text-sm text-gray-500">Toyota Camry added to fleet</p>
                </div>
                <span class="text-xs text-gray-400">2 hours ago</span>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-key text-blue-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">Rental approved</p>
                    <p class="text-sm text-gray-500">John Doe's booking approved</p>
                </div>
                <span class="text-xs text-gray-400">5 hours ago</span>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">New booking pending</p>
                    <p class="text-sm text-gray-500">Sarah Smith booked a vehicle</p>
                </div>
                <span class="text-xs text-gray-400">Yesterday</span>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to stats cards
    const statCards = document.querySelectorAll('.bg-gradient-to-br');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Animate pie chart on load
    const pieChart = document.querySelector('.absolute.inset-0.rounded-full');
    if (pieChart) {
        pieChart.style.transform = 'scale(0)';
        pieChart.style.transition = 'transform 1s ease-out';
        
        setTimeout(() => {
            pieChart.style.transform = 'scale(1)';
        }, 500);
    }
});
</script>

<style>
/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.fa-car, .fa-users, .fa-money-bill-wave {
    animation: float 3s ease-in-out infinite;
}

.fa-car { animation-delay: 0s; }
.fa-users { animation-delay: 0.5s; }
.fa-money-bill-wave { animation-delay: 1s; }

/* Transition effects */
.transition {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Card hover effects */
.hover\:shadow-xl:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.hover\:-translate-y-1:hover {
    transform: translateY(-4px);
}

/* Gradient backgrounds */
.bg-gradient-to-br {
    background-size: 200% 200%;
    background-position: 0% 0%;
}

.bg-gradient-to-br:hover {
    background-position: 100% 100%;
    transition: background-position 0.5s ease;
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection