@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen bg-black text-white flex flex-col">
    <!-- Header with Logo -->
    <div class="p-6">
        <div class="flex items-center space-x-2">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7"/>
            </svg>
            <span class="text-xl font-bold">MoveWell</span>
        </div>
    </div>

    <!-- Welcome Text -->
    <div class="px-6 mt-8">
        <h2 class="text-lg font-semibold mb-4">Welcome back to your account</h2>
        <p class="text-sm text-gray-400 leading-relaxed">
            Please log in to access your account and manage your details securely.<br>
            Your fitness journey continues here!<br>
            If you do not have an account, you can sign up now.
        </p>
    </div>

    <!-- Form Section -->
    <div class="flex-1 flex flex-col justify-center px-6 py-8">
        <div class="max-w-md mx-auto w-full">
            <h1 class="text-center text-xl font-bold mb-2">SIGN IN TO YOUR ACCOUNT</h1>
            <p class="text-center text-xs text-gray-400 mb-8 uppercase tracking-wider">Use your credentials</p>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium mb-2">Email</label>
                    <input id="username" 
                           type="text" 
                           class="w-full px-4 py-3 rounded-full bg-gray-200 text-black focus:outline-none focus:ring-2 focus:ring-white @error('username') ring-2 ring-red-500 @enderror" 
                           name="username" 
                           value="{{ old('username') }}" 
                           required 
                           autofocus>
                    @error('username')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium mb-2">Password</label>
                    <input id="password" 
                           type="password" 
                           class="w-full px-4 py-3 rounded-full bg-gray-200 text-black focus:outline-none focus:ring-2 focus:ring-white @error('password') ring-2 ring-red-500 @enderror" 
                           name="password" 
                           required>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3 rounded-full border-2 border-white text-white font-semibold hover:bg-white hover:text-black transition duration-300 uppercase tracking-wider text-sm">
                    Enter
                </button>
            </form>
        </div>
    </div>

    <!-- Footer - No Gap -->
    <div class="bg-white text-black px-6 py-6">
        <div class="max-w-md mx-auto">
            <div class="flex items-center space-x-2 mb-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7"/>
                </svg>
                <span class="font-bold">MoveWell</span>
            </div>
            <p class="text-xs text-gray-600 leading-relaxed mb-4">
                Let's take a journey with us to live healthier and achieve the dreams you have wanted for a long time, we are here to help you.
            </p>
            <div class="flex justify-between items-center text-xs text-gray-600 border-t border-gray-300 pt-4">
                <div class="space-x-4">
                    <span>Support</span>
                    <a href="{{ route('register') }}" class="underline hover:text-black">Register</a>
                    <span>FAQ</span>
                </div>
                <div class="flex space-x-3">
                    <span class="cursor-pointer hover:text-black">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                        </svg>
                    </span>
                    <span class="cursor-pointer hover:text-black">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                        </svg>
                    </span>
                    <span class="cursor-pointer hover:text-black">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection