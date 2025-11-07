@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-black text-white">

        <h2 class="text-3xl font-bold mb-8">MY ACTIVITY</h2>

        <!-- Tabs -->
        <div class="mb-6">
            <div class="grid grid-cols-2 bg-zinc-800 rounded-lg p-1 max-w-md">
                <button id="historyTab" class="py-3 px-6 rounded-md font-medium transition-colors bg-zinc-700 text-white">
                    History
                </button>
                <button id="upcomingTab" class="py-3 px-6 rounded-md font-medium transition-colors text-zinc-400 hover:text-white">
                    Upcoming
                </button>
            </div>
        </div>

        <!-- History Content -->
        <div id="historyContent" class="space-y-4 mb-8">
            @php
                // Get completed workouts only
                $historyWorkouts = auth()->user()->workoutSchedules()->completed()->orderBy('scheduled_at', 'desc')->get();
            @endphp

            @forelse($historyWorkouts as $workout)
            <div class="bg-zinc-900 border-2 border-zinc-800 rounded-xl p-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center text-2xl">
                        🏃
                    </div>
                    <div>
                        <div class="text-xs text-zinc-400 mb-1">
                            {{ $workout->scheduled_at->format('D, d/m - g:i A') }}
                        </div>
                        <div class="font-bold">{{ strtoupper($workout->activity_type) }} ({{ $workout->target_goal }})</div>
                        @if($workout->actual_result)
                        <div class="text-sm text-zinc-400">RESULT: {{ $workout->actual_result }}</div>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="bg-green-500 text-white text-xs font-bold px-4 py-1 rounded-full">ACHIEVED</span>
                </div>
            </div>
            @empty
            <div class="text-center py-12 text-zinc-500">
                <div class="text-4xl mb-4">📅</div>
                <p>No workout history yet</p>
            </div>
            @endforelse
        </div>

        <!-- Upcoming Content -->
        <div id="upcomingContent" class="space-y-4 mb-8 hidden">
            @forelse($schedules as $workout)
            <div class="bg-zinc-900 border-2 border-zinc-800 rounded-xl p-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center text-2xl">
                            🏃
                        </div>
                        <div>
                            <div class="text-xs text-zinc-400 mb-1">
                                {{ $workout->scheduled_at->format('D, d/m - g:i A') }}
                            </div>
                            <div class="font-bold">{{ strtoupper($workout->activity_type) }} ({{ $workout->target_goal }})</div>
                        </div>
                    </div>
                    <span class="bg-yellow-500 text-white text-xs font-bold px-4 py-1 rounded-full">PENDING</span>
                </div>
                
                <div class="grid grid-cols-3 gap-2">
                    <form action="{{ route('workouts.complete', $workout) }}" method="POST" class="col-span-3">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition-colors" 
                                onclick="return confirm('Mark this workout as completed?')">
                            ✓ Complete
                        </button>
                    </form>
                    <a href="{{ route('workouts.edit', $workout) }}" 
                       class="bg-zinc-700 hover:bg-zinc-600 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
                        Edit
                    </a>
                    <form action="{{ route('workouts.destroy', $workout) }}" method="POST" class="col-span-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors" 
                                onclick="return confirm('Are you sure you want to delete this schedule?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="text-center py-12 text-zinc-500">
                <div class="text-4xl mb-4">📅</div>
                <p>No upcoming workouts</p>
            </div>
            @endforelse

            <!-- Pagination -->
            @if($schedules->hasPages())
            <div class="mt-6">
                {{ $schedules->links() }}
            </div>
            @endif
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-zinc-200 text-black rounded-xl p-6 text-center">
                <div class="text-4xl font-bold mb-2">{{ $completedWorkouts }}</div>
                <div class="text-sm font-medium">Completed</div>
            </div>
            <div class="bg-zinc-200 text-black rounded-xl p-6 text-center">
                <div class="text-4xl font-bold mb-2">{{ $pendingWorkouts }}</div>
                <div class="text-sm font-medium">Pending</div>
            </div>
        </div>

        <div class="bg-zinc-200 text-black rounded-xl p-6 text-center mb-8">
            <div class="text-4xl font-bold mb-2">{{ $totalWorkouts }}</div>
            <div class="text-sm font-medium">Total Workouts</div>
        </div>

        <!-- Add Workout Button -->
        <a href="{{ route('workouts.create') }}" 
           class="block bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-4 rounded-full transition-colors">
            ADD WORKOUT +
    </a>
    </div>
</div>

<script>
    const historyTab = document.getElementById('historyTab');
    const upcomingTab = document.getElementById('upcomingTab');
    const historyContent = document.getElementById('historyContent');
    const upcomingContent = document.getElementById('upcomingContent');

    historyTab.addEventListener('click', () => {
        historyTab.classList.add('bg-zinc-700', 'text-white');
        historyTab.classList.remove('text-zinc-400');
        upcomingTab.classList.remove('bg-zinc-700', 'text-white');
        upcomingTab.classList.add('text-zinc-400');
        
        historyContent.classList.remove('hidden');
        upcomingContent.classList.add('hidden');
    });

    upcomingTab.addEventListener('click', () => {
        upcomingTab.classList.add('bg-zinc-700', 'text-white');
        upcomingTab.classList.remove('text-zinc-400');
        historyTab.classList.remove('bg-zinc-700', 'text-white');
        historyTab.classList.add('text-zinc-400');
        
        upcomingContent.classList.remove('hidden');
        historyContent.classList.add('hidden');
    });
</script>
@endsection