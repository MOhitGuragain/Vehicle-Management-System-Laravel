@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 p-4 md:p-8">
    
    <!-- Welcome Header -->
    <div class="mb-10 text-center md:text-left">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                        <i class="fas fa-user-circle text-white text-3xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                            Welcome back, <span class="text-blue-600">{{ auth()->user()->name }}</span> 👋
                        </h1>
                        <p class="text-gray-600 mt-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-blue-500"></i>
                            {{ now()->format('l, F j, Y') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="mt-6 md:mt-0">
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-star text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Member Since</p>
                        <p class="font-medium text-gray-800">{{ auth()->user()->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Active Rentals -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Active Rentals</p>
                    <h2 class="text-3xl font-bold mt-2">0</h2>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-key text-white text-xl"></i>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-white/20">
                <p class="text-sm text-blue-100">Currently no active rentals</p>
            </div>
        </div>
        
        <!-- Upcoming Bookings -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Upcoming Bookings</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">0</h2>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-xs text-gray-500">No upcoming bookings</p>
            </div>
        </div>
        
        <!-- Total Rentals -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Rentals</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">0</h2>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-history text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-xs text-gray-500">Start your first rental</p>
            </div>
        </div>
        
        <!-- Loyalty Points -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm">Loyalty Points</p>
                    <h2 class="text-3xl font-bold mt-2">100</h2>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-gem text-white text-xl"></i>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-white/20">
                <p class="text-sm text-purple-100">Earn rewards with each rental</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Quick Actions</h2>
            <div class="text-sm text-gray-500">
                <i class="fas fa-bolt mr-1 text-yellow-500"></i>
                Instant access
            </div>
        </div>
        
        <!-- Main Menu Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Browse Vehicles -->
            <a href="{{ route('vehicles.index') }}"
               class="group bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-blue-100 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full -mr-12 -mt-12 opacity-50 group-hover:scale-150 transition-transform"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-car text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                        Browse Vehicles
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Explore our wide selection of available vehicles
                    </p>
                    
                    <div class="flex items-center text-blue-600 font-medium">
                        <span>Get Started</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- Book a Vehicle -->
            <a href="{{ route('rentals.index') }}"
               class="group bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-green-100 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-100 to-green-200 rounded-full -mr-12 -mt-12 opacity-50 group-hover:scale-150 transition-transform"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-calendar-check text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">
                        Book a Vehicle
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Rent your preferred vehicle in just a few clicks
                    </p>
                    
                    <div class="flex items-center text-green-600 font-medium">
                        <span>Start Booking</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- My Rentals -->
            <a href="{{ route('rentals.index') }}"
               class="group bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-purple-100 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full -mr-12 -mt-12 opacity-50 group-hover:scale-150 transition-transform"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-clock-rotate-left text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                        My Rentals
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Track your booking history and current rentals
                    </p>
                    
                    <div class="flex items-center text-purple-600 font-medium">
                        <span>View History</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- My Profile -->
            <a href="{{ route('profile.edit') }}"
               class="group bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-indigo-100 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-full -mr-12 -mt-12 opacity-50 group-hover:scale-150 transition-transform"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-user-cog text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                        My Profile
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Manage your account settings and preferences
                    </p>
                    
                    <div class="flex items-center text-indigo-600 font-medium">
                        <span>Update Profile</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Additional Features -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
        <!-- Help & Support -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-headset text-orange-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Need Help?</h3>
            </div>
            <p class="text-gray-600 text-sm mb-4">
                Our support team is available 24/7 to assist you with any questions.
            </p>
            <button class="w-full px-4 py-2.5 bg-orange-100 text-orange-700 rounded-lg font-medium hover:bg-orange-200 transition">
                <i class="fas fa-comments mr-2"></i>Contact Support
            </button>
        </div>
        
        <!-- Promo Banner -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl p-6 shadow-lg lg:col-span-2">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">🎉 Special Offer!</h3>
                    <p class="text-blue-100">Get 15% off your first rental. Limited time offer.</p>
                </div>
                <button class="px-6 py-3 bg-white text-blue-600 rounded-xl font-bold hover:bg-blue-50 transition">
                    Claim Offer
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Quick Links</h3>
            <div class="text-sm text-gray-500">
                <i class="fas fa-external-link-alt mr-1"></i>
                Navigation
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-blue-50 transition group">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-file-invoice text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-800 group-hover:text-blue-600">Rental Policy</p>
                    <p class="text-xs text-gray-500">Terms & conditions</p>
                </div>
            </a>
            
            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition group">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-question-circle text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-800 group-hover:text-green-600">FAQs</p>
                    <p class="text-xs text-gray-500">Common questions</p>
                </div>
            </a>
            
            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-purple-50 transition group">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-map-marker-alt text-purple-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-800 group-hover:text-purple-600">Locations</p>
                    <p class="text-xs text-gray-500">Pickup points</p>
                </div>
            </a>
            
            <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-red-50 transition group">
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-shield-alt text-red-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-800 group-hover:text-red-600">Safety</p>
                    <p class="text-xs text-gray-500">Safety guidelines</p>
                </div>
            </a>
        </div>
    </div>

 <div class="mt-12 text-center">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 border border-blue-100">
        <i class="fas fa-car-side text-blue-600 text-3xl mb-4"></i>

        <h3 class="text-lg font-semibold text-gray-800 mb-2">
            Ready to start your first rental?
        </h3>

        <p class="text-gray-600 mb-4">
            Browse vehicles and make your first booking in minutes.
        </p>

        <a href="{{ route('vehicles.index') }}"
           class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
            Browse Vehicles
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click animations to cards
    const menuCards = document.querySelectorAll('[class*="hover:-translate-y-2"]');
    menuCards.forEach(card => {
        card.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });
        
        card.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px) scale(1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Add greeting based on time of day
    const hour = new Date().getHours();
    const greetingElement = document.querySelector('h1 span');
    let greeting = '';
    
    if (hour < 12) greeting = 'Good morning';
    else if (hour < 18) greeting = 'Good afternoon';
    else greeting = 'Good evening';
    
    // Update greeting
    const currentGreeting = greetingElement.textContent;
    greetingElement.textContent = greeting + ', ' + currentGreeting.split(', ')[1];
    
    // Add floating animation to icons
    const icons = document.querySelectorAll('.fa-car, .fa-calendar-check, .fa-clock-rotate-left, .fa-user-cog');
    icons.forEach((icon, index) => {
        icon.style.animation = `float 3s ease-in-out ${index * 0.5}s infinite`;
    });
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

/* Floating animation */
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0); }
    50% { transform: translateY(-10px) rotate(2deg); }
}

/* Gradient background animation */
.bg-gradient-to-br {
    background-size: 200% 200%;
}

/* Card hover effects */
.hover\:-translate-y-2:hover {
    transform: translateY(-8px);
}

/* Smooth transitions */
.transition {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Shine effect on cards */
.group:hover .absolute {
    animation: shine 2s ease-in-out infinite;
}

@keyframes shine {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 0.8; }
}

/* Pulse animation for stats */
@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.bg-gradient-to-r {
    animation: pulse 3s ease-in-out infinite;
}

.bg-gradient-to-r:hover {
    animation: none;
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection