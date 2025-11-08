@extends('layouts.app')

@section('title', 'Calories Calculator')

@section('content')
<div class="min-h-screen flex justify-center py-8">
    <div class="w-full max-w-md px-6">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-orange-500 mb-2">Calories Calculator</h1>
            <p class="text-gray-400 text-xs">"By Meeting BMR, The Body Can Grow And Function Properly"</p>
        </div>

        <!-- Tabs -->
        <div class="grid grid-cols-2 gap-2 mb-6">
            <button class="bg-zinc-700 text-white py-3 rounded-lg font-medium text-sm">
                Calculator
            </button>
            <button onclick="window.location='{{ route('calories.history') }}'" 
                    class="bg-zinc-800 text-zinc-400 py-3 rounded-lg font-medium text-sm hover:bg-zinc-700 transition-colors">
                History
            </button>
        </div>

        <!-- Calculator Form -->
        <div class="space-y-4">
            <form action="{{ route('calories.calculate') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Age -->
                <div>
                    <label for="age" class="block text-white text-sm font-medium mb-2">Age</label>
                    <input type="number" 
                           id="age" 
                           name="age" 
                           class="w-full bg-gray-200 text-black px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                           value="{{ old('age', $profile->age ?? auth()->user()->age) }}" 
                           placeholder="20" 
                           required 
                           min="10" 
                           max="120">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-white text-sm font-medium mb-2">Gender</label>
                    <select id="gender" 
                            name="gender" 
                            class="w-full bg-gray-200 text-black px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 appearance-none" 
                            required>
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender', $profile->gender ?? auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $profile->gender ?? auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <!-- Height -->
                <div>
                    <label for="height" class="block text-white text-sm font-medium mb-2">Height</label>
                    <div class="relative">
                        <input type="number" 
                               step="0.01" 
                               id="height" 
                               name="height" 
                               class="w-full bg-gray-200 text-black px-4 py-3 pr-12 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                               value="{{ old('height', $profile->height ?? auth()->user()->height) }}" 
                               placeholder="180" 
                               required 
                               min="50" 
                               max="300">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm">cm</span>
                    </div>
                </div>

                <!-- Weight -->
                <div>
                    <label for="weight" class="block text-white text-sm font-medium mb-2">Weight</label>
                    <div class="relative">
                        <input type="number" 
                               step="0.01" 
                               id="weight" 
                               name="weight" 
                               class="w-full bg-gray-200 text-black px-4 py-3 pr-12 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                               value="{{ old('weight', $profile->weight ?? auth()->user()->weight) }}" 
                               placeholder="60" 
                               required 
                               min="20" 
                               max="500">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm">kg</span>
                    </div>
                </div>

                <!-- Activity Level -->
                <div>
                    <label for="activity_level" class="block text-white text-sm font-medium mb-2">Activity</label>
                    <select id="activity_level" 
                            name="activity_level" 
                            class="w-full bg-gray-200 text-black px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 appearance-none text-sm" 
                            required>
                        <option value="">Select Activity Level</option>
                        <option value="sedentary" {{ old('activity_level', $profile->activity_level ?? '') == 'sedentary' ? 'selected' : '' }}>
                            Sedentary : Little or no Exercise
                        </option>
                        <option value="light" {{ old('activity_level', $profile->activity_level ?? '') == 'light' ? 'selected' : '' }}>
                            Light : Exercise 1-3 times/week
                        </option>
                        <option value="moderate" {{ old('activity_level', $profile->activity_level ?? '') == 'moderate' ? 'selected' : '' }}>
                            Moderate : Exercise 4-5 times/week
                        </option>
                        <option value="very_active" {{ old('activity_level', $profile->activity_level ?? '') == 'very_active' ? 'selected' : '' }}>
                            Very Active : Daily exercise
                        </option>
                        <option value="extra_active" {{ old('activity_level', $profile->activity_level ?? '') == 'extra_active' ? 'selected' : '' }}>
                            Extra Active : Intense exercise 6-7 times/week
                        </option>
                    </select>
                </div>

                <!-- Notes -->
                <div class="bg-zinc-800 rounded-lg p-4">
                    <ul class="text-xs text-gray-400 space-y-1">
                        <li>• Exercise: 15-30 Minutes Of Elevated Heart Rate Activity.</li>
                        <li>• Intense Exercise: 45-120 Minutes Of Elevated Heart Rate Activity.</li>
                        <li>• Very Intense Exercise: 2+ Hours Of Elevated Heart Rate Activity.</li>
                    </ul>
                </div>

                <!-- Calculate Button -->
                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors uppercase tracking-wide">
                    Calculate
                </button>
            </form>
        </div>
    </div>
</div>
@endsection