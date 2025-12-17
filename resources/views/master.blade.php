<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rent Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            top: -100px;
            right: -100px;
        }

        .hero-gradient::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.03) 100%);
            bottom: -50px;
            left: -50px;
        }

        .card-hover {
            transition: all 0.4s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .card-hover:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .pulse-button {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.5);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                    <i class="fas fa-car text-white"></i>
                </div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                    VehicleRent
                </h1>
            </div>
            <nav class="flex items-center space-x-8">

                <a href="{{ route('contact') }}"
                    class="nav-link text-gray-700 font-medium hover:text-blue-600 transition flex items-center">
                    <i class="fas fa-envelope mr-2"></i> Contact Us
                </a>


                <a href="{{ route('login') }}"
                    class="nav-link text-gray-700 font-medium hover:text-blue-600 transition flex items-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>

                <a href="{{ route('register') }}"
                    class="nav-link text-gray-700 font-medium hover:text-blue-600 transition flex items-center">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </a>

            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6">
        @yield('content') {{-- This will be replaced by Contact form or any page content --}}
    </main>

    <!-- Footer -->
    <footer class="py-10 bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-6 md:mb-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-car text-white"></i>
                    </div>
                    <div class="ml-3">
                        <h4 class="text-xl font-bold text-white">VehicleRent</h4>
                        <p class="text-sm text-gray-400">Smart Rental Solutions</p>
                    </div>
                </div>

                <div class="flex space-x-6 mb-6 md:mb-0">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

                <div class="text-center md:text-right">
                    <p class="text-gray-400">
                        © {{ date('Y') }} Vehicle Rent Management System. All rights reserved.
                    </p>
                    <div class="mt-2">
                        <a href="#" class="text-gray-400 hover:text-white text-sm mx-3">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm mx-3">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm mx-3">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button onclick="scrollToTop()"
        class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg 
                   hover:bg-blue-700 transition hidden"
        id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Back to top button
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('hidden');
            } else {
                backToTop.classList.add('hidden');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>