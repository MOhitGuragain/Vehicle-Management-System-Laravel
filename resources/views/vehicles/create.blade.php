@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-8">
    
    <!-- Back Navigation -->
    <div class="mb-8">
        <a href="{{ route('vehicles.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800 transition group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
            Back to Vehicles
        </a>
    </div>

    <!-- Main Form Container -->
    <div class="max-w-2xl mx-auto">
        <!-- Form Header -->
        <div class="text-center mb-10">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                <i class="fas fa-car text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Add New Vehicle</h1>
            <p class="text-gray-600">Complete the form below to add a vehicle to your fleet</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <div class="p-8">
                <!-- Success/Error Messages -->
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-5 rounded-lg">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-red-800 font-semibold mb-2">Please correct the following:</h3>
                                <ul class="list-disc pl-5 text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Form Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Vehicle Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-car text-blue-600"></i>
                                </span>
                                Vehicle Name
                            </label>
                            <input type="text" 
                                   name="vehicle_name" 
                                   placeholder="Enter vehicle name"
                                   value="{{ old('vehicle_name') }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:outline-none transition duration-200"
                                   required>
                        </div>

                        <!-- Vehicle Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-green-600"></i>
                                </span>
                                Vehicle Type
                            </label>
                            <input type="text" 
                                   name="vehicle_type" 
                                   placeholder="Enter vehicle type"
                                   value="{{ old('vehicle_type') }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-100 focus:outline-none transition duration-200"
                                   required>
                        </div>

                        <!-- Plate Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-id-card text-purple-600"></i>
                                </span>
                                Plate Number
                            </label>
                            <input type="text" 
                                   name="plate_number" 
                                   placeholder="Enter plate number"
                                   value="{{ old('plate_number') }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-100 focus:outline-none transition duration-200 font-mono uppercase"
                                   required>
                        </div>

                        <!-- Price per Day -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-dollar-sign text-yellow-600"></i>
                                </span>
                                Price per Day
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-medium">$</span>
                                </div>
                                <input type="number" 
                                       step="0.01" 
                                       name="rent_price_per_day" 
                                       placeholder="0.00"
                                       value="{{ old('rent_price_per_day') }}"
                                       class="w-full pl-12 pr-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-4 focus:ring-yellow-100 focus:outline-none transition duration-200"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="pt-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-camera text-pink-600"></i>
                            </span>
                            Vehicle Image
                        </label>
                        
                        <!-- File Upload Area -->
                        <div class="border-3 border-dashed border-gray-300 rounded-2xl p-8 text-center transition duration-300 hover:border-blue-400 hover:bg-blue-50 group">
                            <input type="file" 
                                   name="image"
                                   id="imageInput"
                                   class="hidden"
                                   onchange="updateFileName(this)">
                            
                            <div class="mb-5">
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto group-hover:scale-105 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl group-hover:text-blue-500 transition-colors"></i>
                                </div>
                            </div>
                            
                            <div>
                                <p class="text-gray-700 font-medium mb-2">Click to upload vehicle image</p>
                                <p class="text-sm text-gray-500 mb-4">or drag and drop</p>
                                
                                <!-- File Name Display -->
                                <div id="fileName" class="hidden mb-4">
                                    <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-lg">
                                        <i class="fas fa-file-image mr-2"></i>
                                        <span id="fileDisplayName" class="font-medium"></span>
                                        <button type="button" onclick="clearFile()" class="ml-3 text-green-700 hover:text-green-900">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <button type="button" 
                                        onclick="document.getElementById('imageInput').click()"
                                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:shadow-lg hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-300">
                                    <i class="fas fa-folder-open mr-2"></i>
                                    Browse Files
                                </button>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3 text-center">Supported formats: JPG, PNG, GIF • Max size: 5MB</p>
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-8 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-5 sm:space-y-0">
                            <div class="flex items-center text-gray-600">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-info-circle text-gray-500"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium">All fields are required</p>
                                    <p class="text-xs text-gray-500">Please fill in all information</p>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4">
                                <a href="{{ route('vehicles.index') }}" 
                                   class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition duration-300 flex items-center">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:shadow-2xl hover:shadow-blue-300 hover:-translate-y-1 transition-all duration-300 flex items-center group">
                                    <i class="fas fa-save mr-2 group-hover:rotate-12 transition-transform"></i>
                                    Save Vehicle
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Tips -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-5 border border-blue-200">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <h4 class="font-semibold text-blue-800">Accurate Details</h4>
                </div>
                <p class="text-sm text-blue-700">Ensure all vehicle information is correct and up-to-date.</p>
            </div>
            
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-5 border border-green-200">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-image text-white"></i>
                    </div>
                    <h4 class="font-semibold text-green-800">Quality Images</h4>
                </div>
                <p class="text-sm text-green-700">Upload clear images from multiple angles for better presentation.</p>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-5 border border-purple-200">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-dollar-sign text-white"></i>
                    </div>
                    <h4 class="font-semibold text-purple-800">Competitive Pricing</h4>
                </div>
                <p class="text-sm text-purple-700">Set prices based on market rates and vehicle condition.</p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for File Upload Display -->
<script>
function updateFileName(input) {
    const fileNameDisplay = document.getElementById('fileName');
    const fileDisplayName = document.getElementById('fileDisplayName');
    
    if (input.files.length > 0) {
        fileNameDisplay.classList.remove('hidden');
        fileDisplayName.textContent = input.files[0].name;
    } else {
        fileNameDisplay.classList.add('hidden');
    }
}

function clearFile() {
    const input = document.getElementById('imageInput');
    const fileNameDisplay = document.getElementById('fileName');
    
    input.value = '';
    fileNameDisplay.classList.add('hidden');
}

// Form validation and interaction
document.addEventListener('DOMContentLoaded', function() {
    // Add focus animations
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-opacity-50');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-opacity-50');
        });
    });
    
    // Add input validation styling
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const requiredInputs = form.querySelectorAll('input[required]');
        
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500', 'bg-red-50');
                isValid = false;
                
                // Add error message
                if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('error-message')) {
                    const error = document.createElement('p');
                    error.className = 'error-message text-red-600 text-xs mt-2 flex items-center';
                    error.innerHTML = '<i class="fas fa-exclamation-circle mr-1"></i> This field is required';
                    input.parentNode.appendChild(error);
                }
            } else {
                input.classList.remove('border-red-500', 'bg-red-50');
                const errorMsg = input.parentNode.querySelector('.error-message');
                if (errorMsg) errorMsg.remove();
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            // Scroll to first error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
});
</script>

<style>
/* Custom Styles */
.border-3 {
    border-width: 3px;
}

/* Smooth transitions */
.transition {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Input focus glow effect */
input:focus, input:focus-within {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1);
}

/* File upload area hover effect */
.border-dashed:hover {
    background: linear-gradient(white, white) padding-box,
                linear-gradient(45deg, #3b82f6, #8b5cf6) border-box;
    border: 3px dashed transparent;
}

/* Button hover effects */
button[type="submit"]:hover {
    background-size: 150% 150%;
}

/* Animation for icons */
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.fa-car {
    animation: float 3s ease-in-out infinite;
}

/* Custom scrollbar for the page */
::-webkit-scrollbar {
    width: 10px;
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
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection