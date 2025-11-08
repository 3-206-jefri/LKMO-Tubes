@extends('layouts.app')

@section('title', 'Meal Plan')

@section('content')
<div class="min-h-screen flex justify-center py-8">
    <div class="w-full max-w-md px-6">
        <!-- Title Section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold mb-2 text-orange-500 tracking-wider">MEAL PLAN</h1>
            <p class="text-gray-400 text-xs">"Eat Smart, Move Well, Live Strong"</p>
        </div>

        <!-- Subtitle -->
        <div class="mb-6 text-center">
            <p class="text-gray-300 text-sm mb-2">Healthy doesn't have to be boring 🥗</p>
            <p class="text-gray-500 text-xs">Discover New Meal That Are Easy To Follow. Table Amazing And Support Your Fitness Journey.</p>
        </div>

        <!-- Meal List -->
        <div class="space-y-4">
            <!-- Avocado Toast with Egg -->
            <div class="bg-black rounded-lg overflow-hidden shadow-lg border border-gray-800 hover:border-orange-500 transition">
                <button onclick="toggleMeal('meal1')" class="w-full text-left">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=200&h=200&fit=crop" 
                                 alt="Avocado Toast" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-green-500 text-xl">🥑</span>
                                <span class="text-gray-400 text-xs font-medium">Weight Loss</span>
                            </div>
                            <h3 class="text-white font-bold mb-1">Avocado Toast with Egg</h3>
                            <p class="text-orange-500 text-xs font-medium mb-2">⏱ 290 kcal · ⏱ 10 min cook</p>
                            <p class="text-orange-500 text-xs font-medium">Click Here For More →</p>
                        </div>
                    </div>
                </button>
                <div id="meal1" class="hidden px-4 pb-4 border-t border-gray-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A delicious and nutritious breakfast option rich in healthy fats and protein.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Ingredients:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400 text-xs">
                                <li>1 slice whole grain bread</li>
                                <li>1/2 ripe avocado</li>
                                <li>1 egg</li>
                                <li>Salt, pepper, lemon juice to taste</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400 text-xs">
                                <li>Toast the bread until golden brown</li>
                                <li>Mash avocado with lemon juice and spread on toast</li>
                                <li>Cook egg to preference (fried or poached)</li>
                                <li>Place egg on top of avocado toast</li>
                                <li>Season with salt and pepper</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salmon with Sweet Potato -->
            <div class="bg-black rounded-lg overflow-hidden shadow-lg border border-gray-800 hover:border-orange-500 transition">
                <button onclick="toggleMeal('meal2')" class="w-full text-left">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=200&h=200&fit=crop" 
                                 alt="Salmon" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-orange-500 text-xl">🐟</span>
                                <span class="text-gray-400 text-xs font-medium">Muscle Gain</span>
                            </div>
                            <h3 class="text-white font-bold mb-1">Salmon with Sweet Potato</h3>
                            <p class="text-orange-500 text-xs font-medium mb-2">⚡ 520 kcal · ⏱ 20 min cook</p>
                            <p class="text-orange-500 text-xs font-medium">Click Here For More →</p>
                        </div>
                    </div>
                </button>
                <div id="meal2" class="hidden px-4 pb-4 border-t border-gray-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A protein-rich meal perfect for muscle building and recovery.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Ingredients:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400 text-xs">
                                <li>150g salmon fillet</li>
                                <li>200g sweet potato</li>
                                <li>2 cups broccoli</li>
                                <li>Olive oil, salt, pepper</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400 text-xs">
                                <li>Cut sweet potato into cubes and bake at 200°C for 20 minutes</li>
                                <li>Season salmon and grill or bake for 12-15 minutes</li>
                                <li>Steam broccoli until tender</li>
                                <li>Plate together and drizzle with olive oil</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Smoothie Bowl -->
            <div class="bg-black rounded-lg overflow-hidden shadow-lg border border-gray-800 hover:border-orange-500 transition">
                <button onclick="toggleMeal('meal3')" class="w-full text-left">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1580959375944-abd7e991f971?w=200&h=200&fit=crop" 
                                 alt="Salmon" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-green-500 text-xl">🍃</span>
                                <span class="text-gray-400 text-xs font-medium">Healthy Lifestyle</span>
                            </div>
                            <h3 class="text-white font-bold mb-1">Smoothie Bowl</h3>
                            <p class="text-orange-500 text-xs font-medium mb-2">🥄 300 kcal · ⏱ 10 min cook</p>
                            <p class="text-orange-500 text-xs font-medium">Click Here For More →</p>
                        </div>
                    </div>
                </button>
                <div id="meal3" class="hidden px-4 pb-4 border-t border-gray-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A refreshing and colorful breakfast bowl packed with antioxidants.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Ingredients:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400 text-xs">
                                <li>1 cup mixed berries</li>
                                <li>1 banana</li>
                                <li>1/2 cup Greek yogurt</li>
                                <li>1/2 cup almond milk</li>
                                <li>Granola and coconut flakes for topping</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400 text-xs">
                                <li>Blend berries, banana, yogurt, and almond milk</li>
                                <li>Pour into a bowl</li>
                                <li>Top with granola and coconut flakes</li>
                                <li>Add fresh fruit if desired</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tofu Scramble -->
            <div class="bg-black rounded-lg overflow-hidden shadow-lg border border-gray-800 hover:border-orange-500 transition">
                <button onclick="toggleMeal('meal4')" class="w-full text-left">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=200&h=200&fit=crop" 
                                 alt="Tofu Scramble" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-green-500 text-xl">🥬</span>
                                <span class="text-gray-400 text-xs font-medium">Vegetarian</span>
                            </div>
                            <h3 class="text-white font-bold mb-1">Tofu Scramble</h3>
                            <p class="text-orange-500 text-xs font-medium mb-2">⚡ 310 kcal · ⏱ 15 min cook</p>
                            <p class="text-orange-500 text-xs font-medium">Click Here For More →</p>
                        </div>
                    </div>
                </button>
                <div id="meal4" class="hidden px-4 pb-4 border-t border-gray-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A delicious vegan protein-rich breakfast alternative.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Ingredients:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400 text-xs">
                                <li>200g firm tofu, crumbled</li>
                                <li>1 onion, diced</li>
                                <li>1 bell pepper, diced</li>
                                <li>Turmeric, garlic, salt to taste</li>
                                <li>Olive oil</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400 text-xs">
                                <li>Heat olive oil and sauté onion and pepper</li>
                                <li>Add crumbled tofu</li>
                                <li>Season with turmeric and garlic</li>
                                <li>Cook for 10 minutes until golden</li>
                                <li>Serve hot with toast</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yogurt & Granola Cup -->
            <div class="bg-black rounded-lg overflow-hidden shadow-lg border border-gray-800 hover:border-orange-500 transition">
                <button onclick="toggleMeal('meal5')" class="w-full text-left">
                    <div class="flex gap-4 p-4">
                        <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1580959375944-abd7e991f971?w=200&h=200&fit=crop" 
                                 alt="Salmon" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-white text-xl">🥛</span>
                                <span class="text-gray-400 text-xs font-medium">Quick & Easy</span>
                            </div>
                            <h3 class="text-white font-bold mb-1">Yogurt & Granola Cup</h3>
                            <p class="text-orange-500 text-xs font-medium mb-2">🥄 270 kcal · ⏱ 5 min</p>
                            <p class="text-orange-500 text-xs font-medium">Click Here For More →</p>
                        </div>
                    </div>
                </button>
                <div id="meal5" class="hidden px-4 pb-4 border-t border-gray-800">
                    <div class="text-sm text-gray-300 space-y-3 mt-4">
                        <p>A quick and nutritious snack or breakfast option.</p>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Ingredients:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400 text-xs">
                                <li>150g Greek yogurt</li>
                                <li>1/4 cup granola</li>
                                <li>Fresh berries</li>
                                <li>1 tbsp honey</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-500 mb-2">Instructions:</p>
                            <ol class="list-decimal list-inside space-y-1 text-gray-400 text-xs">
                                <li>Add yogurt to a bowl or cup</li>
                                <li>Top with granola and berries</li>
                                <li>Drizzle with honey</li>
                                <li>Enjoy immediately</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleMeal(mealId) {
        const meal = document.getElementById(mealId);
        meal.classList.toggle('hidden');
    }
</script>
@endsection