@extends('master')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">

    <h2 class="text-2xl font-bold text-gray-800 mb-2">Contact Us</h2>
    <p class="text-gray-600 mb-6">
        Have any questions about vehicle rental? Send us a message.
    </p>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    {{-- Contact Form --}}
    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Full Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Enter your name">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Enter your email">
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Phone --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                placeholder="98XXXXXXXX">
        </div>

        {{-- Subject --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Subject</label>
            <input type="text" name="subject" value="{{ old('subject') }}"
                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Vehicle Rent Inquiry">
            @error('subject')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Message --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" rows="4"
                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Write your message...">{{ old('message') }}</textarea>
            @error('message')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Send Message
        </button>

    </form>
</div>
@endsection