@extends('layouts.app')

@section('title', 'Create Workout')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-8">
    <div class="w-full max-w-sm bg-black rounded-3xl px-8 py-12 shadow-2xl">
        <h1 class="text-white text-2xl font-bold text-center mb-16 tracking-wide">
            SET NEW WORKOUT TARGET
        </h1>
        
        <form method="POST" action="{{ route('workouts.store') }}" class="space-y-6">
            @csrf

            <!-- Activity Type -->
            <div>
                <div class="relative">
                    <input id="activity_type" 
                           type="text" 
                           class="w-full bg-transparent border-2 border-white/30 rounded-full px-6 py-4 pr-14 text-white text-base placeholder-white/40 focus:outline-none focus:border-orange-500 transition-colors" 
                           name="activity_type" 
                           value="{{ old('activity_type') }}" 
                           placeholder="Activity Type (e.g., Running)" 
                           required>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                            <circle cx="6" cy="3" r="2"></circle>
                            <path d="M6 5v6"></path>
                            <path d="M6 13l2 8"></path>
                            <path d="M10 13l-2 8"></path>
                            <path d="M10 8l6-2"></path>
                            <path d="M16 6v8l3 3"></path>
                        </svg>
                    </span>
                </div>
                @error('activity_type')
                    <p class="text-red-500 text-xs mt-2 ml-6">{{ $message }}</p>
                @enderror
            </div>

            <!-- Target Goal -->
            <div>
                <div class="relative">
                    <input id="target_goal" 
                           type="text" 
                           class="w-full bg-transparent border-2 border-white/30 rounded-full px-6 py-4 pr-14 text-white text-base placeholder-white/40 focus:outline-none focus:border-orange-500 transition-colors" 
                           name="target_goal" 
                           value="{{ old('target_goal') }}" 
                           placeholder="Target Goal (e.g., km)" 
                           required>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                            <circle cx="12" cy="12" r="9"></circle>
                            <polygon points="12 7 15 12 12 17 9 12"></polygon>
                        </svg>
                    </span>
                </div>
                @error('target_goal')
                    <p class="text-red-500 text-xs mt-2 ml-6">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date & Time -->
            <div>
                <div class="relative">
                    <input id="scheduled_at" 
                           type="datetime-local" 
                           class="w-full bg-transparent border-2 border-white/30 rounded-full px-6 py-4 pr-14 text-white text-base focus:outline-none focus:border-orange-500 transition-colors" 
                           name="scheduled_at" 
                           value="{{ old('scheduled_at') }}" 
                           required>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                            <circle cx="12" cy="12" r="9"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </span>
                </div>
                @error('scheduled_at')
                    <p class="text-red-500 text-xs mt-2 ml-6">{{ $message }}</p>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="pt-6">
                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-full transition-all duration-200 uppercase tracking-wider text-base shadow-lg">
                    SAVE SCHEDULE
                </button>
            </div>

            <!-- Cancel Link -->
            <div class="text-center pt-2">
                <a href="{{ route('artikel') }}" 
                   class="text-white/50 hover:text-white text-sm font-medium transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Datetime picker styling */
    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
        filter: invert(1) opacity(0);
    }

    input[type="datetime-local"]::-webkit-datetime-edit {
        color: white;
    }

    input[type="datetime-local"]::-webkit-datetime-edit-fields-wrapper {
        color: white;
    }

    input[type="datetime-local"]::-webkit-datetime-edit-text {
        color: rgba(255, 255, 255, 0.6);
    }

    input[type="datetime-local"]::-webkit-datetime-edit-month-field,
    input[type="datetime-local"]::-webkit-datetime-edit-day-field,
    input[type="datetime-local"]::-webkit-datetime-edit-year-field,
    input[type="datetime-local"]::-webkit-datetime-edit-hour-field,
    input[type="datetime-local"]::-webkit-datetime-edit-minute-field {
        color: white;
    }
</style>
@endsection