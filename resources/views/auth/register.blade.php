@extends('layouts.auth.loginRegister')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-sm w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h2>
        <p class="mt-6 mb-4 text-center text-gray-600 text-sm">
            Create an account to access the admin dashboard. If you already have an account, please
            <a href="#" class="text-blue-500 hover:underline">login</a>.
        </p>
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-6" x-data="{ show: false }">
                <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="password" name="password"
                        placeholder="Enter your password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
                        <svg x-show="!show" x-cloak class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <svg x-show="show" x-cloak class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.956 9.956 0 012.028-3.341m2.385-2.392A9.957 9.957 0 0112 5c4.478 0 8.269 2.943 9.543 7a9.97 9.97 0 01-4.178 5.17">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mb-6" x-data="{ showConfirm: false }">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium">Confirm
                    Password</label>
                <div class="relative">
                    <input :type="showConfirm ? 'text' : 'password'" id="password_confirmation"
                        name="password_confirmation" placeholder="Confirm your password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <button type="button" @click="showConfirm = !showConfirm"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
                        <svg x-show="!showConfirm" x-cloak class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <svg x-show="showConfirm" x-cloak class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.956 9.956 0 012.028-3.341m2.385-2.392A9.957 9.957 0 0112 5c4.478 0 8.269 2.943 9.543 7a9.97 9.97 0 01-4.178 5.17">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">Register</button>
            </div>
        </form>
        <div class="mt-4 flex justify-center text-sm">
            <span class="text-gray-600 mr-1">Forgot your password?</span>
            <a href="#" class="text-blue-500 hover:underline">Click here</a>
        </div>
    </div>
</div>
@endsection