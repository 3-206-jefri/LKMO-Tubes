<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoveWell - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
    <!-- Header dengan Logo -->
    <div class="px-6 pt-8 pb-12">
        <div class="flex items-center space-x-2">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            <h1 class="text-2xl font-bold">MoveWell</h1>
        </div>
    </div>

    <!-- Content -->
    <div class="px-6">
        <!-- Title Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Create your account</h2>
            <p class="text-gray-400 text-sm leading-relaxed">
                Welcome! Please sign up to access your account. Fill in your details below to get started. It only takes a minute to join our community.
            </p>
            <p class="text-gray-400 text-sm mt-2">
                Enter your username, email, and a new password.
            </p>
        </div>

        <!-- Form Section -->
        <div class="mb-8">
            <h3 class="text-center text-xl font-bold mb-2">CREATE YOUR ACCOUNT</h3>
            <p class="text-center text-gray-400 text-sm mb-8">JOIN NOW</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm mb-2">Username</label>
                    <input 
                        id="username"
                        type="text" 
                        name="username"
                        value="{{ old('username') }}"
                        class="w-full bg-gray-200 text-black rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-gray-400 @error('username') ring-2 ring-red-500 @enderror"
                        required 
                        autofocus
                    >
                    @error('username')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm mb-2">Email</label>
                    <input 
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full bg-gray-200 text-black rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-gray-400 @error('email') ring-2 ring-red-500 @enderror"
                        required
                    >
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm mb-2">Password</label>
                    <input 
                        id="password"
                        type="password"
                        name="password"
                        class="w-full bg-gray-200 text-black rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-gray-400 @error('password') ring-2 ring-red-500 @enderror"
                        required
                    >
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Re-Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm mb-2">Re - Password</label>
                    <input 
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="w-full bg-gray-200 text-black rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                        required
                    >
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button 
                        type="submit"
                        class="w-full border border-white text-white rounded-full py-3 text-center hover:bg-white hover:text-black transition-colors duration-200 font-medium"
                    >
                        enter
                    </button>
                </div>

                <!-- Auth Footer -->
                <div class="text-center text-sm text-gray-400 pt-4">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-white hover:underline font-medium">
                        Login here
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>