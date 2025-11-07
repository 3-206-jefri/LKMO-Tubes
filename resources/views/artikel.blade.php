@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Title Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold mb-1 text-orange-500">Track Your Daily Activity 🔥</h1>
            <p class="text-gray-400 text-sm">Check Your Daily Fitness Activities And Maintain Your Health.</p>
        </div>

        <!-- Quick Access Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <!-- Calories Card -->
            @if($calorieProfile)
            <a href="{{ route('calories.history') }}" class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-2xl p-6 relative overflow-hidden hover:from-orange-700 hover:to-orange-800 transition-all">
                <div class="relative z-10">
                    <h3 class="text-lg font-semibold mb-4">Calories</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-orange-100 mb-1">Consumed</p>
                            <p class="text-4xl font-bold mb-3">{{ number_format($todayCalories ?? 0, 0) }} <span class="text-lg">Cal</span></p>
                            <p class="text-xs text-orange-100">Remaining</p>
                            <p class="text-2xl font-bold">{{ number_format(max(0, $remainingCalories ?? 0), 0) }} <span class="text-sm">Cal</span></p>
                        </div>
                        <div class="text-6xl">🔥</div>
                    </div>
                </div>
            </a>
            @else
            <a href="{{ route('calories.index') }}" class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-2xl p-6 relative overflow-hidden hover:from-orange-700 hover:to-orange-800 transition-all">
                <div class="relative z-10">
                    <h3 class="text-lg font-semibold mb-4">Calories Calculator</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-orange-100 mb-2">Calculate your daily calories</p>
                            <p class="text-xl font-semibold">Click here to start</p>
                        </div>
                        <div class="text-6xl">🔥</div>
                    </div>
                </div>
            </a>
            @endif

            <!-- Daily Remainder Card -->
            @if($nextWorkout)
            <a href="{{ route('workouts.edit', $nextWorkout) }}" class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 relative overflow-hidden hover:from-blue-700 hover:to-blue-800 transition-all">
                <div class="relative z-10">
                    <h3 class="text-lg font-semibold mb-4">Daily Remainder</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-100 mb-1">🏃 Today's Workout: {{ $nextWorkout->activity_type }}</p>
                            <p class="text-4xl font-bold mb-2">{{ $nextWorkout->scheduled_at->format('H:i') }}</p>
                            <p class="text-sm text-blue-100">Click Here For More</p>
                        </div>
                        <div class="text-6xl">💪</div>
                    </div>
                </div>
            </a>
            @else
            <a href="{{ route('workouts.create') }}" class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 relative overflow-hidden hover:from-blue-700 hover:to-blue-800 transition-all">
                <div class="relative z-10">
                    <h3 class="text-lg font-semibold mb-4">Daily Remainder</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-100 mb-2">No workout scheduled</p>
                            <p class="text-xl font-semibold">Create One</p>
                        </div>
                        <div class="text-6xl">📅</div>
                    </div>
                </div>
            </a>
            @endif
        </div>

        <!-- Articles Section -->
        <div>
            <h2 class="text-xl font-bold mb-1 text-orange-500">Article - "Feed Your Mind, Move Your Body"</h2>
            
            <div class="grid grid-cols-1 gap-4 mt-6">
                <!-- Article 1 - Glucose -->
                <a href="#" class="bg-gray-900 rounded-2xl overflow-hidden hover:bg-gray-800 transition-all block">
                    <div class="relative h-48">
                        <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=800&q=80" 
                             alt="Glucose" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-6xl font-bold text-white opacity-90" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Glucose</h2>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">Memahami Glukosa Darah</h3>
                        <p class="text-gray-400 text-sm">Tips ini dapat ada pertahannya pada batas aman anda.</p>
                    </div>
                </a>

                <!-- Article 2 - Heart -->
                <a href="#" class="bg-gray-900 rounded-2xl overflow-hidden hover:bg-gray-800 transition-all block">
                    <div class="relative h-48">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" 
                             alt="Heart" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">Pelajari Kebugaran Jantung</h3>
                        <p class="text-gray-400 text-sm">Bagaimana cara meningkatnya, manfaat jantung, dan cara meningkat kesehatan.</p>
                    </div>
                </a>

                <!-- Article 3 - Fitness -->
                <a href="#" class="bg-gray-900 rounded-2xl overflow-hidden hover:bg-gray-800 transition-all block">
                    <div class="relative h-48">
                        <img src="https://images.unsplash.com/photo-1476480862126-209bfaa8edc8?w=800&q=80" 
                             alt="Fitness" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold mb-2">Latihan yang Dapat Meningkatkan Stabilitas Berjalan Kaki</h3>
                        <p class="text-gray-400 text-sm">Kenapa stabilitas penting bagi kesehatan dan apa yang dapat anda lakukan untuk melatih stabilitas.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
@endsection