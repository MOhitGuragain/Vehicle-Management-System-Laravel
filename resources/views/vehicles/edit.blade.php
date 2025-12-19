@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 p-4 md:p-8">
    
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
            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                <i class="fas fa-edit text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Edit Vehicle</h1>
            <p class="text-gray-600">Update the details for <span class="font-semibold text-green-700">{{ $vehicle->vehicle_name }}</span></p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <div class="p-8">
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

                @if(session('success'))
                    <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-5 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                            <p class="text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('vehicles.update', $vehicle->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Current Image Preview -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-image text-blue-600"></i>
                            </span>
                            Current Vehicle Image
                        </label>
                        
                        @if($vehicle->image)
                            <div class="relative w-48 h-48 rounded-xl overflow-hidden border-2 border-gray-200 shadow-md group">
                                <img src="{{ asset('storage/' . $vehicle->image) }}" 
                                     alt="{{ $vehicle->vehicle_name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                    <span class="text-white text-sm font-medium">Current Image</span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Upload a new image below to replace this one</p>
                        @else
                            <div class="w-48 h-48 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center border-2 border-dashed border-gray-300">
                                <div class="text-center">
                                    <i class="fas fa-car text-gray-400 text-4xl mb-3"></i>
                                    <p class="text-gray-500 text-sm">No image available</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Form Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Vehicle Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-car text-green-600"></i>
                                </span>
                                Vehicle Name
                            </label>
                            <input type="text" 
                                   name="vehicle_name" 
                                   value="{{ old('vehicle_name', $vehicle->vehicle_name) }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-100 focus:outline-none transition duration-200"
                                   required>
                        </div>

                        <!-- Vehicle Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-purple-600"></i>
                                </span>
                                Vehicle Type
                            </label>
                            <input type="text" 
                                   name="vehicle_type" 
                                   value="{{ old('vehicle_type', $vehicle->vehicle_type) }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-100 focus:outline-none transition duration-200"
                                   required>
                        </div>

                        <!-- Plate Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-id-card text-blue-600"></i>
                                </span>
                                Plate Number
                            </label>
                            <input type="text" 
                                   name="plate_number" 
                                   value="{{ old('plate_number', $vehicle->plate_number) }}"
                                   class="w-full px-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:outline-none transition duration-200 font-mono uppercase"
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
                                       value="{{ old('rent_price_per_day', $vehicle->rent_price_per_day) }}"
                                       class="w-full pl-12 pr-5 py-4 text-gray-700 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-4 focus:ring-yellow-100 focus:outline-none transition duration-200"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- New Image Upload Section -->
                    <div class="pt-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-camera text-pink-600"></i>
                            </span>
                            Update Vehicle Image (Optional)
                        </label>
                        
                        <!-- File Upload Area -->
                        <div class="border-3 border-dashed border-gray-300 rounded-2xl p-8 text-center transition duration-300 hover:border-green-400 hover:bg-green-50 group">
                            <input type="file" 
                                   name="image"
                                   id="imageInput"
                                   class="hidden"
                                   onchange="previewNewImage(event)">
                            
                            <!-- New Image Preview -->
                            <div id="newImagePreview" class="hidden mb-5">
                                <div class="relative w-48 h-48 rounded-xl overflow-hidden border-2 border-green-300 shadow-md mx-auto">
                                    <img id="previewImage" src="#" alt="New image preview" class="w-full h-full object-cover">
                                    <button type="button" onclick="removeNewImage()" 
                                            class="absolute top-2 right-2 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition shadow-md">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <p class="text-sm text-green-600 mt-2 font-medium">New image preview</p>
                            </div>

                            <!-- Upload Interface -->
                            <div id="uploadInterface">
                                <div class="mb-5">
                                    <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto group-hover:scale-105 transition-transform">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl group-hover:text-green-500 transition-colors"></i>
                                    </div>
                                </div>
                                
                                <div>
                                    <p class="text-gray-700 font-medium mb-2">Click to upload new image</p>
                                    <p class="text-sm text-gray-500 mb-4">Leave empty to keep current image</p>
                                    
                                    <button type="button" 
                                            onclick="document.getElementById('imageInput').click()"
                                            class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg font-medium hover:shadow-lg hover:shadow-green-200 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fas fa-folder-open mr-2"></i>
                                        Choose New Image
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3 text-center">Leave this field empty if you don't want to change the image</p>
                    </div>

                    <!-- Vehicle Status (Optional Enhancement) -->
                    <div class="pt-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-4 flex items-center">
                            <span class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-circle text-indigo-600"></i>
                            </span>
                            Vehicle Status (Current: 
                            <span class="ml-2 px-2 py-1 bg-{{ $vehicle->status === 'available' ? 'green' : ($vehicle->status === 'rented' ? 'blue' : 'yellow') }}-100 text-{{ $vehicle->status === 'available' ? 'green' : ($vehicle->status === 'rented' ? 'blue' : 'yellow') }}-800 rounded text-xs font-medium">
                                {{ ucfirst($vehicle->status) }}
                            </span>)
                        </label>
                        <div class="text-sm text-gray-600 bg-gray-50 rounded-xl p-4 border border-gray-200">
                            <p>Status is managed automatically based on rentals. You cannot manually change it here.</p>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-8 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between space-y-5 sm:space-y-0">
                            <div class="flex items-center text-gray-600">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-history text-gray-500"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium">Last updated</p>
                                    <p class="text-xs text-gray-500">{{ $vehicle->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4">
                                <a href="{{ route('vehicles.index') }}" 
                                   class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition duration-300 flex items-center">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-700 text-white rounded-xl font-semibold hover:shadow-2xl hover:shadow-green-300 hover:-translate-y-1 transition-all duration-300 flex items-center group">
                                    <i class="fas fa-save mr-2 group-hover:rotate-12 transition-transform"></i>
                                    Update Vehicle
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Vehicle Information Card -->
        <div class="mt-10 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200">
            <h3 class="font-semibold text-blue-800 mb-4 flex items-center">
                <i class="fas fa-info-circle mr-2"></i>
                Vehicle Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <p class="text-sm text-blue-600 font-medium mb-1">Vehicle ID</p>
                    <p class="text-gray-800 font-mono">#{{ $vehicle->id }}</p>
                </div>
                <div>
                    <p class="text-sm text-blue-600 font-medium mb-1">Created On</p>
                    <p class="text-gray-800">{{ $vehicle->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-blue-600 font-medium mb-1">Rental Count</p>
                    <p class="text-gray-800">N/A</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
function previewNewImage(event) {
    const input = event.target;
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('newImagePreview');
    const uploadInterface = document.getElementById('uploadInterface');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
            uploadInterface.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeNewImage() {
    const input = document.getElementById('imageInput');
    const previewContainer = document.getElementById('newImagePreview');
    const uploadInterface = document.getElementById('uploadInterface');
    
    input.value = '';
    previewContainer.classList.add('hidden');
    uploadInterface.classList.remove('hidden');
}

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const requiredInputs = form.querySelectorAll('input[required]');
        let isValid = true;
        
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
    
    // Add input focus effects
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-opacity-50');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-opacity-50');
        });
    });
});
</script>

<style>
/* Custom Styles */
.border-3 {
    border-width: 3px;
}

.transition {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Input focus effects */
input:focus {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.1);
}

/* File upload area hover */
.border-dashed:hover {
    background: linear-gradient(white, white) padding-box,
                linear-gradient(45deg, #10b981, #059669) border-box;
    border: 3px dashed transparent;
}

/* Button animations */
button[type="submit"]:hover {
    background-size: 150% 150%;
}

/* Image hover effects */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

/* Status color classes */
.bg-green-100 { background-color: #d1fae5; }
.text-green-800 { color: #065f46; }
.bg-blue-100 { background-color: #dbeafe; }
.text-blue-800 { color: #1e40af; }
.bg-yellow-100 { background-color: #fef3c7; }
.text-yellow-800 { color: #92400e; }

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #10b981, #059669);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #0da271, #047857);
}
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection