@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex justify-center">
    <div class="w-full max-w-md px-4 py-4">
        <h2 class="text-2xl font-bold mb-6 text-white">MY ACTIVITY</h2>

        <!-- Tabs -->
        <div class="mb-6">
            <div class="grid grid-cols-2 bg-zinc-800 rounded-lg p-1">
                <button id="historyTab" class="py-3 px-6 rounded-md font-medium transition-colors bg-zinc-700 text-white text-sm">
                    History
                </button>
                <button id="upcomingTab" class="py-3 px-6 rounded-md font-medium transition-colors text-zinc-400 hover:text-white text-sm">
                    Upcoming
                </button>
            </div>
        </div>

        <!-- History Content -->
        <div id="historyContent" class="space-y-3 mb-6">
            @php
                $historyWorkouts = auth()->user()->workoutSchedules()->completed()->orderBy('scheduled_at', 'desc')->get();
            @endphp

            @forelse($historyWorkouts as $workout)
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                            <circle cx="6" cy="3" r="2"></circle>
                            <path d="M6 5v6"></path>
                            <path d="M6 13l2 8"></path>
                            <path d="M10 13l-2 8"></path>
                            <path d="M10 8l6-2"></path>
                            <path d="M16 6v8l3 3"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs text-zinc-400 mb-1">
                            {{ $workout->scheduled_at->format('D, d/m - g:i A') }}
                        </div>
                        <div class="font-semibold text-sm">{{ strtoupper($workout->activity_type) }}</div>
                        <div class="text-xs text-zinc-500">{{ $workout->target_goal }}</div>
                        @if($workout->actual_result)
                        <div class="text-xs text-zinc-400 mt-1">Result: {{ $workout->actual_result }}</div>
                        @endif
                    </div>
                </div>
                <div>
                    <span class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">ACHIEVED</span>
                </div>
            </div>
            @empty
            <div class="text-center py-12 text-zinc-500">
                <div class="text-4xl mb-3">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-zinc-600">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <p class="text-sm">No workout history yet</p>
            </div>
            @endforelse
        </div>

        <!-- Upcoming Content -->
        <div id="upcomingContent" class="space-y-3 mb-6 hidden">
            @forelse($schedules as $workout)
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                                <circle cx="6" cy="3" r="2"></circle>
                                <path d="M6 5v6"></path>
                                <path d="M6 13l2 8"></path>
                                <path d="M10 13l-2 8"></path>
                                <path d="M10 8l6-2"></path>
                                <path d="M16 6v8l3 3"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-400 mb-1">
                                {{ $workout->scheduled_at->format('D, d/m - g:i A') }}
                            </div>
                            <div class="font-semibold text-sm">{{ strtoupper($workout->activity_type) }}</div>
                            <div class="text-xs text-zinc-500">{{ $workout->target_goal }}</div>
                        </div>
                    </div>
                    <span class="bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">PENDING</span>
                </div>
                
                <div class="space-y-2">
                    <form action="{{ route('workouts.complete', $workout) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm" 
                                onclick="return confirm('Mark this workout as completed?')">
                            ✓ Complete
                        </button>
                    </form>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('workouts.edit', $workout) }}" 
                           class="bg-zinc-700 hover:bg-zinc-600 text-white text-center font-medium py-2.5 px-4 rounded-lg transition-colors text-sm flex items-center justify-center">
                            Edit
                        </a>
                        <form action="{{ route('workouts.destroy', $workout) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm" 
                                    onclick="return confirm('Are you sure you want to delete this schedule?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-12 text-zinc-500">
                <div class="text-4xl mb-3">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-zinc-600">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <p class="text-sm">No upcoming workouts</p>
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
        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="bg-zinc-800 border border-zinc-700 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold mb-1 text-green-500">{{ $completedWorkouts }}</div>
                <div class="text-xs font-medium text-zinc-400">Completed</div>
            </div>
            <div class="bg-zinc-800 border border-zinc-700 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold mb-1 text-yellow-500">{{ $pendingWorkouts }}</div>
                <div class="text-xs font-medium text-zinc-400">Pending</div>
            </div>
        </div>

        <div class="bg-zinc-800 border border-zinc-700 rounded-xl p-4 text-center mb-6">
            <div class="text-3xl font-bold mb-1 text-orange-500">{{ $totalWorkouts }}</div>
            <div class="text-xs font-medium text-zinc-400">Total Workouts</div>
        </div>

        <!-- Add Workout Button -->
        <a href="{{ route('workouts.create') }}" 
           class="block bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-3 rounded-full transition-colors shadow-lg">
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