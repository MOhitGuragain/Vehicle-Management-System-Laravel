@extends('layouts.app')

@section('content')
<div class="py-12" x-data="{ tab: 'info' }">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Tabs -->
        <div class="flex space-x-2 mb-6">
            <button
                @click="tab = 'info'"
                :class="tab === 'info' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">
                Profile Info
            </button>

            <button
                @click="tab = 'password'"
                :class="tab === 'password' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">
                Change Password
            </button>

            <button
                @click="tab = 'delete'"
                :class="tab === 'delete' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">
                Delete Account
            </button>
        </div>

        <!-- Tab Content -->
        <div class="space-y-6">

            <!-- Profile Info -->
            <div x-show="tab === 'info'" x-transition>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div x-show="tab === 'password'" x-transition>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account -->
            <div x-show="tab === 'delete'" x-transition>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection