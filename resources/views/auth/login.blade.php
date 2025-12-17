<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 p-4">
        <div class="w-full max-w-md">
            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <!-- Decorative Header -->
                <div class="relative h-40 bg-gradient-to-r from-blue-600 to-purple-600">
                    <div class="absolute inset-0 bg-black opacity-10"></div>
                    <div class="relative h-full flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-white">Welcome Back</h1>
                        <p class="text-blue-100 text-sm mt-1">Sign in to your account</p>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="p-8">
                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                            <div class="flex">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <p class="text-red-700 font-medium">Please fix the following errors:</p>
                                    <ul class="list-disc pl-5 text-red-600 text-sm mt-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if(session('status'))
                        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                            <div class="flex">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-green-700">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Email Address
                                </div>
                            </label>
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-200"
                                   placeholder="Enter your email">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Password
                                </div>
                            </label>
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-200"
                                   placeholder="Enter your password">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center cursor-pointer group">
                                <div class="relative">
                                    <input id="remember_me" 
                                           name="remember" 
                                           type="checkbox" 
                                           class="sr-only peer">
                                    <div class="w-5 h-5 bg-gray-100 border-2 border-gray-300 rounded peer-checked:bg-blue-500 peer-checked:border-blue-500 transition duration-200"></div>
                                    <svg class="w-3 h-3 text-white absolute top-1 left-1 hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="ml-2 text-sm text-gray-600 group-hover:text-gray-800 transition">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-blue-600 hover:text-blue-800 hover:underline transition flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3.5 rounded-lg font-medium hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <div class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                {{ __('Log in') }}
                            </div>
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <!-- Social Login (Optional - keeps functionality same) -->
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" 
                                    class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </button>
                            
                            <button type="button" 
                                    class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                                </svg>
                            </button>
                            
                            <button type="button" 
                                    class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="text-center pt-4 border-t border-gray-200">
                            <p class="text-gray-600">
                                Don't have an account?
                                <a href="{{ route('register') }}" 
                                   class="font-medium text-blue-600 hover:text-blue-800 hover:underline transition ml-1">
                                    Create account
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    By signing in, you agree to our
                    <a href="#" class="text-blue-600 hover:underline">Terms</a> 
                    and 
                    <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        /* Additional custom styles */
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .transition {
            transition: all 0.2s ease-in-out;
        }

        /* Custom checkbox styling */
        .sr-only:checked + div {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        /* Smooth background animation */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .bg-gradient-to-br {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }
    </style>
</x-guest-layout>