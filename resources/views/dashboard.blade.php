@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <!-- Main Content -->
    <div class="flex-1">
        <!-- Main Content Area -->
        <main class="p-4 md:p-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Revenue -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-blue-100">Total Revenue</p>
                            <h2 class="text-3xl font-bold mt-2">$24,580</h2>
                        </div>
                        <div class="bg-white/20 p-3 rounded-xl">
                            <i class="fas fa-dollar-sign text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="text-green-300 text-sm flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 18.2%
                        </span>
                        <span class="text-blue-200 text-sm ml-2">This month</span>
                    </div>
                </div>

                <!-- Active Rentals -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Active Rentals</p>
                            <h2 class="text-3xl font-bold text-gray-900 mt-2">42</h2>
                        </div>
                        <div class="bg-green-100 p-3 rounded-xl">
                            <i class="fas fa-key text-green-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 5.2%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">This week</span>
                    </div>
                </div>

                <!-- Total Vehicles -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Total Vehicles</p>
                            <h2 class="text-3xl font-bold text-gray-900 mt-2">128</h2>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-xl">
                            <i class="fas fa-car text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <i class="fas fa-plus mr-1"></i> 8 New
                        </span>
                        <span class="text-gray-500 text-sm ml-2">This month</span>
                    </div>
                </div>

                <!-- Registered Users -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Customers</p>
                            <h2 class="text-3xl font-bold text-gray-900 mt-2">320</h2>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-xl">
                            <i class="fas fa-users text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 12.5%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">This month</span>
                    </div>
                </div>
            </div>

            <!-- Charts and Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Revenue Chart -->
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Revenue Overview</h3>
                        <select class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>This Week</option>
                            <option>This Month</option>
                            <option>This Year</option>
                        </select>
                    </div>
                    
                    <!-- Simple Chart (replace with real chart library) -->
                    <div class="h-64 flex items-end space-x-2">
                        <div class="flex-1 bg-blue-100 rounded-t-lg" style="height: 80%"></div>
                        <div class="flex-1 bg-blue-200 rounded-t-lg" style="height: 60%"></div>
                        <div class="flex-1 bg-blue-300 rounded-t-lg" style="height: 90%"></div>
                        <div class="flex-1 bg-blue-400 rounded-t-lg" style="height: 70%"></div>
                        <div class="flex-1 bg-blue-500 rounded-t-lg" style="height: 85%"></div>
                        <div class="flex-1 bg-blue-600 rounded-t-lg" style="height: 75%"></div>
                        <div class="flex-1 bg-blue-700 rounded-t-lg" style="height: 95%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-2">
                        <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                    </div>
                </div>

                <!-- Vehicle Status -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Vehicle Status</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Available</span>
                                <span>48%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 48%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Rented</span>
                                <span>32%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 32%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Maintenance</span>
                                <span>12%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 12%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Reserved</span>
                                <span>8%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: 8%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Rentals Table -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Recent Rentals</h3>
                        <p class="text-sm text-gray-500 mt-1">Latest 10 rental transactions</p>
                    </div>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="text-left py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-700">Customer</span>
                                        <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                                    </div>
                                </th>
                                <th class="text-left py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-700">Vehicle</span>
                                        <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                                    </div>
                                </th>
                                <th class="text-left py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-700">Rent Date</span>
                                        <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                                    </div>
                                </th>
                                <th class="text-left py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-700">Return Date</span>
                                    </div>
                                </th>
                                <th class="text-left py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-700">Amount</span>
                                        <i class="fas fa-sort ml-1 text-gray-400 text-xs"></i>
                                    </div>
                                </th>
                                <th class="text-left py-4 px-6">
                                    <span class="text-sm font-semibold text-gray-700">Status</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-blue-600 font-medium text-sm">M</span>
                                        </div>
                                        <div>
                                            <span class="font-medium text-gray-800 block">Madan Guragain</span>
                                            <span class="text-xs text-gray-500">madan@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <i class="fas fa-car text-gray-400 mr-2"></i>
                                        <span class="text-gray-700">Toyota Corolla</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Dec 10, 2025</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Dec 13, 2025</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-gray-800">$245</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium flex items-center w-fit">
                                        <i class="fas fa-circle text-xs mr-1"></i>
                                        Active
                                    </span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-purple-600 font-medium text-sm">J</span>
                                        </div>
                                        <div>
                                            <span class="font-medium text-gray-800 block">John Doe</span>
                                            <span class="text-xs text-gray-500">john@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <i class="fas fa-car text-gray-400 mr-2"></i>
                                        <span class="text-gray-700">Honda City</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Dec 8, 2025</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Dec 9, 2025</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-gray-800">$180</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium flex items-center w-fit">
                                        <i class="fas fa-check-circle text-xs mr-1"></i>
                                        Completed
                                    </span>
                                </td>
                            </tr>
                            
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-pink-600 font-medium text-sm">S</span>
                                        </div>
                                        <div>
                                            <span class="font-medium text-gray-800 block">Sita Kumari</span>
                                            <span class="text-xs text-gray-500">sita@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <i class="fas fa-car text-gray-400 mr-2"></i>
                                        <span class="text-gray-700">Hyundai i20</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Dec 11, 2025</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-500">Pending</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-gray-800">$210</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium flex items-center w-fit">
                                        <i class="fas fa-clock text-xs mr-1"></i>
                                        Pending
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">42</span> rentals
                    </div>
                    <div class="flex space-x-2">
                        <button class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-left text-gray-600"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-lg font-medium">
                            1
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100">
                            2
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-right text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- JavaScript for Mobile Sidebar -->
<script>
    // Mobile sidebar toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.hidden.md\\:flex');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-40');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768 && sidebar && !sidebar.contains(e.target) && e.target !== sidebarToggle) {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('fixed', 'inset-0', 'z-40');
        }
    });
</script>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
    .transition {
        transition: all 0.3s ease;
    }
    
    /* Hover effects */
    tr:hover {
        background-color: #f9fafb;
    }
    
    /* Card hover effects */
    .hover\:shadow-xl:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endsection