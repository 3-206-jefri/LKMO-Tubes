@extends('layouts.app')

@section('title', 'Food History')

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
            <button onclick="window.location='{{ route('calories.index') }}'" 
                    class="bg-zinc-800 text-zinc-400 py-3 rounded-lg font-medium text-sm hover:bg-zinc-700 transition-colors">
                Calculator
            </button>
            <button class="bg-zinc-700 text-white py-3 rounded-lg font-medium text-sm">
                History
            </button>
        </div>

        <!-- Summary Card -->
        @if($profile)
        <div class="bg-gradient-to-r from-orange-600 to-orange-700 rounded-lg p-4 mb-6">
            <div class="text-white text-sm font-medium mb-3">📊 Today's Summary</div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center">
                    <div class="text-gray-200 text-xs mb-1">Consumed</div>
                    <div class="text-2xl font-bold">{{ number_format($todayTotal, 0) }}<span class="text-sm">Cal</span></div>
                </div>
                <div class="text-center">
                    <div class="text-gray-200 text-xs mb-1">Remaining</div>
                    <div class="text-2xl font-bold">{{ number_format(max(0, $profile->tdee - $todayTotal), 0) }}<span class="text-sm">Cal</span></div>
                </div>
            </div>
        </div>
        @endif

        <!-- Add Food Form -->
        <div class="bg-zinc-800 rounded-lg p-4 mb-6">
            <h2 class="text-white font-bold mb-4 text-sm">Add Food</h2>
            <form action="{{ route('calories.add-food') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label for="food_name" class="block text-white text-xs font-medium mb-2">Food</label>
                    <input type="text" 
                           id="food_name" 
                           name="food_name" 
                           class="w-full bg-gray-200 text-black px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm" 
                           placeholder="e.g., Salmon with Sweet Potato" 
                           required>
                </div>

                <div>
                    <label for="calories" class="block text-white text-xs font-medium mb-2">Kcal</label>
                    <input type="number" 
                           step="0.01" 
                           id="calories" 
                           name="calories" 
                           class="w-full bg-gray-200 text-black px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm" 
                           placeholder="520" 
                           required 
                           min="0">
                </div>

                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors uppercase tracking-wide text-sm">
                    Add More Food
                </button>
            </form>
        </div>

        <!-- Food List -->
        <div class="space-y-2">
            @forelse($histories as $food)
            <div class="bg-zinc-800 rounded-lg p-4 flex items-center justify-between">
                <div class="flex items-center gap-3 flex-1">
                    <div class="text-2xl">🍴</div>
                    <div>
                        <div class="text-white font-medium text-sm">{{ $food->food_name }}</div>
                        <div class="text-orange-500 text-xs font-semibold">● {{ number_format($food->calories, 0) }} kcal</div>
                        <div class="text-gray-400 text-xs">{{ $food->date->format('D, d/m/Y') }} - {{ date('H:i', strtotime($food->time)) }}</div>
                    </div>
                </div>
                <form action="{{ route('calories.delete-food', $food) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="text-gray-400 hover:text-red-500 transition-colors text-lg"
                            onclick="return confirm('Delete this food?')">
                        ✕
                    </button>
                </form>
            </div>
            @empty
            <div class="text-center py-8">
                <div class="text-4xl mb-3">🍴</div>
                <p class="text-gray-400 text-sm">No food logged yet. Start tracking your meals!</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($histories->hasPages())
        <div class="mt-6">
            {{ $histories->links() }}
        </div>
        @endif
    </div>
</div>
@endsection