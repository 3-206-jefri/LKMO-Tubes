@extends('layouts.app')

@section('title', 'Exercise Guide')

@section('content')
<div class="min-h-screen flex justify-center py-8">
    <div class="w-full max-w-md px-6">
        <!-- Title Section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold mb-2 text-white tracking-wider">EXERCISE GUIDE</h1>
            <p class="text-gray-400 text-xs">"Every Move Counts. Start Small, Stay Consistent, And Feel The Difference"</p>
        </div>

        <!-- Exercise List -->
        <div class="space-y-6">
            <!-- Push-Up -->
            <div class="bg-gray-950 rounded-2xl overflow-hidden shadow-xl">
                <button onclick="toggleArticle('exercise1')" class="w-full text-left">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=600&h=300&fit=crop" 
                             alt="Push Up" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Chest</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Triceps</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Shoulders</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Core</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1">Push - Up</h3>
                        <p class="text-orange-500 text-sm font-medium">Click Here For More →</p>
                    </div>
                </button>
                <div id="exercise1" class="hidden px-4 pb-4 border-t border-zinc-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A classic bodyweight exercise that targets multiple upper body muscles.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400">
                                <li>Start in a plank position with hands shoulder-width apart</li>
                                <li>Lower your body until chest nearly touches the floor</li>
                                <li>Keep your core engaged and body in a straight line</li>
                                <li>Push back up to starting position</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Keep elbows at 45-degree angle</li>
                                <li>Breathe in while lowering, out while pushing up</li>
                                <li>Start with knee push-ups if needed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Squat -->
            <div class="bg-black rounded-2xl overflow-hidden shadow-xl">
                <button onclick="toggleArticle('exercise2')" class="w-full text-left">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=600&h=300&fit=crop" 
                             alt="Squat" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Quadriceps</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Glutes</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Hamstrings</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Core</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1">Squat</h3>
                        <p class="text-orange-500 text-sm font-medium">Click Here For More →</p>
                    </div>
                </button>
                <div id="exercise2" class="hidden px-4 pb-4 border-t border-zinc-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A fundamental lower body exercise that builds strength and muscle.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400">
                                <li>Stand with feet shoulder-width apart</li>
                                <li>Lower your body by bending knees and hips</li>
                                <li>Keep chest up and back straight</li>
                                <li>Go down until thighs are parallel to floor</li>
                                <li>Push through heels to return to start</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Keep knees in line with toes</li>
                                <li>Don't let knees cave inward</li>
                                <li>Maintain neutral spine throughout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plank -->
            <div class="bg-black rounded-2xl overflow-hidden shadow-xl">
                <button onclick="toggleArticle('exercise3')" class="w-full text-left">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e?w=600&h=300&fit=crop" 
                             alt="Plank" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Shoulders</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Lower back</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Glutes</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Core</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1">Plank</h3>
                        <p class="text-orange-500 text-sm font-medium">Click Here For More →</p>
                    </div>
                </button>
                <div id="exercise3" class="hidden px-4 pb-4 border-t border-zinc-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>An isometric core exercise that builds endurance and stability.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400">
                                <li>Start in a forearm plank position</li>
                                <li>Keep body in straight line from head to heels</li>
                                <li>Engage core and squeeze glutes</li>
                                <li>Hold position without sagging hips</li>
                                <li>Breathe steadily throughout</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Don't let hips sag or pike up</li>
                                <li>Keep neck neutral, don't look up</li>
                                <li>Start with shorter holds and build up</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumping Jack -->
            <div class="bg-black rounded-2xl overflow-hidden shadow-xl">
                <button onclick="toggleArticle('exercise4')" class="w-full text-left">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&h=300&fit=crop" 
                             alt="Jumping Jack" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Calves</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Shoulders</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Glutes</span>
                            <span class="text-xs bg-zinc-800 text-zinc-300 px-2 py-1 rounded">Core</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-1">Jumping Jack</h3>
                        <p class="text-orange-500 text-sm font-medium">Click Here For More →</p>
                    </div>
                </button>
                <div id="exercise4" class="hidden px-4 pb-4 border-t border-zinc-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A dynamic cardio exercise that increases heart rate and warms up the body.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400">
                                <li>Start standing with feet together, arms at sides</li>
                                <li>Jump while spreading legs and raising arms overhead</li>
                                <li>Jump again to return to starting position</li>
                                <li>Maintain a steady rhythm</li>
                                <li>Continue for desired time or reps</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Land softly on balls of feet</li>
                                <li>Keep core engaged throughout</li>
                                <li>Modify by stepping instead of jumping if needed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleArticle(articleId) {
        const article = document.getElementById(articleId);
        article.classList.toggle('hidden');
    }
</script>
@endsection