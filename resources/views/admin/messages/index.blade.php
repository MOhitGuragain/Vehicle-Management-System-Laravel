@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-6">

    <h2 class="text-2xl font-bold mb-4 text-gray-800">Contact Messages</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white text-left">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Subject</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $msg->name }}</td>
                    <td class="px-4 py-2">{{ $msg->email }}</td>
                    <td class="px-4 py-2">{{ $msg->subject }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded-full text-white text-sm 
                            {{ $msg->status == 'unread' ? 'bg-red-500' : 'bg-green-500' }}">
                            {{ ucfirst($msg->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.messages.view', $msg->id) }}"
                            class="text-blue-600 hover:underline font-medium">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection