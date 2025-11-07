@extends('layouts.app')

@section('title', 'Create New Workout')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .form-error {
        @apply text-red-500 text-sm mt-1;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="mb-12">
            <h1 class="text-white text-3xl font-bold text-center tracking-tight">
                SET NEW WORKOUT TARGET
            </h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-900 border border-red-700 rounded-lg p-4 mb-6">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-200 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('workouts.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Activity Type -->
            <div>
                <div class="relative">
                    <input 
                        type="text" 
                        id="activity_type" 
                        name="activity_type" 
                        placeholder="Activity Type (e.g., Running)"
                        value="{{ old('activity_type') }}"
                        class="w-full px-4 py-3 bg-transparent border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
                        required>
                    <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                @error('activity_type')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Target Goal -->
            <div>
                <div class="relative">
                    <input 
                        type="text" 
                        id="target_goal" 
                        name="target_goal" 
                        placeholder="Target Goal (e.g., km)"
                        value="{{ old('target_goal') }}"
                        class="w-full px-4 py-3 bg-transparent border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
                        required>
                    <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 11-8 0 4 4 0 018 0zM13.5 5a4 4 0 11-8 0 4 4 0 018 0zM21 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                @error('target_goal')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Schedule Date & Time -->
            <div>
                <div class="relative">
                    <input 
                        type="datetime-local" 
                        id="scheduled_at" 
                        name="scheduled_at"
                        placeholder="Date & Time (e.g, Tuesday 5:00 PM)"
                        value="{{ old('scheduled_at') }}"
                        class="w-full px-4 py-3 bg-transparent border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
                        required>
                    <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                @error('scheduled_at')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Additional Notes (Hidden) -->
            <textarea 
                id="notes" 
                name="notes" 
                placeholder="Any additional notes? (optional)"
                class="hidden">{{ old('notes') }}</textarea>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-lg transition mt-8">
                SAVE SCHEDULE
            </button>
        </form>
    </div>
</div>
@endsection