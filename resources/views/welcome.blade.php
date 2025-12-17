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

    <!-- Hero Section -->
    <section class="hero-gradient text-white relative">
        <div class="max-w-7xl mx-auto px-6 py-24 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center px-4 py-2 bg-white/10 rounded-full mb-6">
                        <i class="fas fa-bolt mr-2 text-yellow-300"></i>
                        <span class="text-sm font-medium">Streamlined Vehicle Management</span>
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        Drive Your Business
                        <span class="text-yellow-300">Forward</span>
                        With Smart Rentals
                    </h2>

                    <p class="mt-6 text-xl text-blue-100 leading-relaxed">
                        A comprehensive platform designed to simplify vehicle rental operations,
                        enhance customer experiences, and boost your business efficiency.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}"
                            class="bg-white text-blue-700 px-8 py-4 rounded-xl text-lg font-bold 
                                  hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 
                                  flex items-center justify-center">
                            <i class="fas fa-rocket mr-3"></i>Launch Dashboard
                        </a>

                        <a href="#features"
                            class="border-2 border-white/50 text-white px-8 py-4 rounded-xl text-lg font-bold 
                                  hover:bg-white/10 hover:border-white transition-all duration-300 
                                  flex items-center justify-center">
                            <i class="fas fa-play-circle mr-3"></i>View Demo
                        </a>
                    </div>

                    <div class="mt-12 flex items-center space-x-8">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-400 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-200">Trusted by</p>
                                <p class="text-xl font-bold">500+ Companies</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-star text-yellow-400 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-200">Rated</p>
                                <p class="text-xl font-bold">4.9/5 Stars</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="floating">
                        <img src="https://images.unsplash.com/photo-1483401757487-2ced3fa77952?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Luxury Cars" class="rounded-2xl shadow-2xl border-4 border-white/20">
                    </div>

                    <!-- Floating Stats -->
                    <div class="absolute -top-6 -left-6 bg-white p-4 rounded-2xl shadow-xl">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-car text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-500">Vehicles</p>
                                <p class="text-xl font-bold text-gray-800">2,500+</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-xl">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-500">Happy Customers</p>
                                <p class="text-xl font-bold text-gray-800">10,000+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features</h3>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Everything you need to manage your vehicle rental business efficiently
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <div class="feature-icon text-white text-2xl">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">Vehicle Management</h4>
                    <p class="text-gray-600 mb-6">
                        Complete control over your fleet with advanced tools for adding, editing,
                        tracking, and maintaining all vehicles in one centralized dashboard.
                    </p>
                    <div class="flex items-center text-blue-600 font-medium">
                        <span>Explore Features</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <div class="feature-icon text-white text-2xl">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">Role-Based Access</h4>
                    <p class="text-gray-600 mb-6">
                        Secure multi-level access control for administrators, managers,
                        and customers with customizable permissions and security protocols.
                    </p>
                    <div class="flex items-center text-purple-600 font-medium">
                        <span>Learn About Security</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="card-hover bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <div class="feature-icon text-white text-2xl">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">Booking System</h4>
                    <p class="text-gray-600 mb-6">
                        Seamless booking experience with real-time availability, automated
                        scheduling, payment processing, and comprehensive rental tracking.
                    </p>
                    <div class="flex items-center text-green-600 font-medium">
                        <span>See Booking Flow</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>

            <!-- Additional Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <i class="fas fa-chart-line text-blue-500 text-2xl mb-4"></i>
                    <h5 class="font-bold text-gray-900 mb-2">Analytics Dashboard</h5>
                    <p class="text-sm text-gray-600">Real-time business insights</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <i class="fas fa-credit-card text-green-500 text-2xl mb-4"></i>
                    <h5 class="font-bold text-gray-900 mb-2">Payment Integration</h5>
                    <p class="text-sm text-gray-600">Multiple payment options</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <i class="fas fa-mobile-alt text-purple-500 text-2xl mb-4"></i>
                    <h5 class="font-bold text-gray-900 mb-2">Mobile Ready</h5>
                    <p class="text-sm text-gray-600">Fully responsive design</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <i class="fas fa-headset text-orange-500 text-2xl mb-4"></i>
                    <h5 class="font-bold text-gray-900 mb-2">24/7 Support</h5>
                    <p class="text-sm text-gray-600">Dedicated customer service</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-700 to-blue-900 text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold mb-6">Ready to Transform Your Rental Business?</h3>
            <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                Join thousands of businesses already using VehicleRent to streamline their operations.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    class="bg-white text-blue-700 px-8 py-4 rounded-xl text-lg font-bold 
                          hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-play-circle mr-2"></i>Start Free Trial
                </a>
                <a href="{{ route('login') }}"
                    class="border-2 border-white/50 text-white px-8 py-4 rounded-xl text-lg font-bold 
                          hover:bg-white/10 transition-all duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Existing User Login
                </a>
            </div>
            <p class="mt-6 text-blue-200">
                No credit card required • 14-day free trial • Cancel anytime
            </p>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
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