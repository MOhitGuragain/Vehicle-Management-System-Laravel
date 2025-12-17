@extends('layouts.app')

@section('title', 'Message Detail')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-6">

    <h3 class="text-2xl font-bold mb-6 text-gray-800">Message Detail</h3>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4 border border-gray-200">

        <div>
            <span class="font-semibold">Name:</span> {{ $message->name }}
        </div>

        <div>
            <span class="font-semibold">Email:</span> {{ $message->email }}
        </div>

        <div>
            <span class="font-semibold">Phone:</span> {{ $message->phone }}
        </div>

        <div>
            <span class="font-semibold">Subject:</span> {{ $message->subject }}
        </div>

        <div>
            <span class="font-semibold">Message:</span>
            <p class="mt-1 p-3 bg-gray-50 rounded-md border border-gray-200">{{ $message->message }}</p>
        </div>

        <div>
            <a href="{{ route('admin.messages') }}"
                class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Back to Messages
            </a>
        </div>

    </div>
</div>
@endsection