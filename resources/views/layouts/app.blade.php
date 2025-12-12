<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rent Management System</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-200">

<!-- Navbar -->
<nav class="bg-white px-6 py-4 shadow-md flex justify-between items-center">
    <div class="flex items-center space-x-6">

        <div>
            <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>

            <div class="ml-0 mt-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium inline-flex items-center">
                <i class="fas fa-circle text-xs mr-1"></i>
                Live Updates
            </div>
        </div>

        <!-- Search (Desktop Only) -->
        <div class="relative hidden md:block">
            <input type="text" placeholder="Search..."
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg 
                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-64">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">

        <!-- Notifications -->
        <button class="relative w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition">
            <i class="fas fa-bell text-gray-600"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- User -->
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="ml-3 hidden md:block">
                <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Logout
            </button>
        </form>
    </div>
</nav>


<!-- Main Wrapper -->
<div class="flex">

    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white min-h-screen"
           id="sidebar">
        
        <!-- Logo -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-car text-white"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold">VehicleRent</h1>
                    <p class="text-xs text-gray-400">Management System</p>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-lg">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                <div class="ml-3">
                    <h3 class="font-medium">{{ Auth::user()->name }}</h3>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-2">

            <a href="/dashboard" class="flex items-center px-4 py-3 rounded-xl bg-blue-600 text-white">
                <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                Dashboard
            </a>

            <a href="{{ route('vehicles.index') }}" 
               class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-car w-5 mr-3"></i>
                Vehicles
                <span class="ml-auto bg-blue-500 text-xs px-2 py-1 rounded-full">128</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-users w-5 mr-3"></i>
                Customers
                <span class="ml-auto bg-green-500 text-xs px-2 py-1 rounded-full">320</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-calendar-alt w-5 mr-3"></i>
                Bookings
                <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded-full">42</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-file-invoice-dollar w-5 mr-3"></i>
                Payments
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-chart-bar w-5 mr-3"></i>
                Reports
            </a>

            <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-gray-700 text-gray-300 hover:text-white transition">
                <i class="fas fa-cog w-5 mr-3"></i>
                Settings
            </a>

        </nav>
    </aside>

    <!-- Mobile Toggle -->
    <button id="sidebarToggle" 
            class="md:hidden fixed top-4 left-4 z-50 w-10 h-10 bg-gray-900 text-white rounded-lg flex items-center justify-center">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

<!-- Sidebar Toggle Script -->
<script>
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('fixed');
        sidebar.classList.toggle('top-0');
        sidebar.classList.toggle('left-0');
        sidebar.classList.toggle('z-40');
    });
</script>

</body>
</html>
