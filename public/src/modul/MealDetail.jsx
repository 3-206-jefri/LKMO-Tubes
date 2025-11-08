import React, { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
import { ArrowLeft, Share2, Flame, Clock } from "lucide-react";

export default function MealDetail() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [user, setUser] = useState(null);

  useEffect(() => {
    loadUser();
  }, []);

  const loadUser = () => {
    try {
      const userData = localStorage.getItem('user');
      if (userData) {
        const parsedUser = JSON.parse(userData);
        if (parsedUser.isLoggedIn) {
          setUser(parsedUser);
        } else {
          navigate('/signin');
        }
      } else {
        navigate('/signin');
      }
    } catch (error) {
      console.error('Error loading user:', error);
      navigate('/signin');
    }
  };

  // Meal data with recipes
  const meals = {
    1: {
      id: 1,
      name: "Avocado Toast with Egg",
      image: "/assets/AvocadoToast.jpg",
      category: "Weight Loss",
      categoryIcon: "⚖️",
      calories: 280,
      cookTime: 10,
      servings: 1,
      difficulty: "Easy",
      ingredients: [
        "2 slice whole grain bread",
        "1 ripe avocado",
        "2 eggs",
        "1 tbsp olive oil",
        "Salt and pepper to taste",
        "Red pepper flakes (optional)",
        "Lemon juice (few drops)"
      ],
      steps: [
        "Toast the bread slices until golden brown and crispy.",
        "While bread is toasting, heat olive oil in a non-stick pan over medium heat.",
        "Crack eggs into the pan and cook to your preference (sunny side up or over easy).",
        "Cut avocado in half, remove pit, and scoop the flesh into a bowl.",
        "Mash the avocado with a fork and add salt, pepper, and a few drops of lemon juice.",
        "Spread the mashed avocado evenly on the toasted bread.",
        "Place the cooked egg on top of the avocado toast.",
        "Sprinkle with additional salt, pepper, and red pepper flakes if desired.",
        "Serve immediately while warm and enjoy!"
      ],
      nutritionTips: "Rich in healthy fats from avocado and protein from eggs. Perfect for a balanced breakfast that keeps you full longer."
    },
    2: {
      id: 2,
      name: "Salmon with Sweet Potato",
      image: "/assets/SalmonPotato.jpg",
      category: "Muscle Gain",
      categoryIcon: "💪",
      calories: 520,
      cookTime: 30,
      servings: 1,
      difficulty: "Medium",
      ingredients: [
        "1 salmon fillet (150g)",
        "1 medium sweet potato",
        "2 tbsp olive oil",
        "1 lemon",
        "2 cloves garlic, minced",
        "Fresh dill or parsley",
        "Salt and pepper to taste",
        "Paprika (optional)"
      ],
      steps: [
        "Preheat oven to 200°C (400°F).",
        "Wash and cut sweet potato into rounds, about 1cm thick.",
        "Toss sweet potato slices with 1 tbsp olive oil, salt, and pepper.",
        "Arrange sweet potato on a baking sheet and bake for 15 minutes.",
        "While potatoes are baking, pat salmon dry with paper towels.",
        "Season salmon with salt, pepper, minced garlic, and paprika.",
        "Heat remaining olive oil in an oven-safe pan over medium-high heat.",
        "Sear salmon skin-side down for 3-4 minutes until crispy.",
        "Flip salmon and transfer pan to oven for 8-10 minutes.",
        "Remove sweet potatoes and salmon from oven when done.",
        "Squeeze fresh lemon juice over salmon and garnish with fresh herbs.",
        "Plate salmon with sweet potato slices and serve hot."
      ],
      nutritionTips: "Excellent source of omega-3 fatty acids and lean protein. Sweet potato provides complex carbs for sustained energy and muscle recovery."
    },
    3: {
      id: 3,
      name: "Smoothie Bowl",
      image: "/assets/SmoothieBowl.jpg",
      category: "Healthy Lifestyle",
      categoryIcon: "🥗",
      calories: 300,
      cookTime: 10,
      servings: 1,
      difficulty: "Easy",
      ingredients: [
        "1 frozen banana",
        "1/2 cup frozen mixed berries",
        "1/2 cup Greek yogurt",
        "1/4 cup almond milk",
        "1 tbsp honey",
        "Toppings: granola, fresh berries, sliced banana, chia seeds, coconut flakes"
      ],
      steps: [
        "Add frozen banana, mixed berries, Greek yogurt, and almond milk to a blender.",
        "Blend on high speed until smooth and creamy. Add more milk if too thick.",
        "The consistency should be thicker than a regular smoothie (like soft-serve ice cream).",
        "Pour the smoothie mixture into a bowl.",
        "Arrange your favorite toppings in sections or patterns.",
        "Add granola for crunch, fresh berries for vitamins.",
        "Sprinkle chia seeds for omega-3s and fiber.",
        "Top with coconut flakes and sliced banana.",
        "Drizzle with honey if desired.",
        "Serve immediately and enjoy with a spoon!"
      ],
      nutritionTips: "Packed with antioxidants, probiotics from yogurt, and fiber. A refreshing breakfast that's both nutritious and Instagram-worthy!"
    },
    4: {
      id: 4,
      name: "Tofu Scramble",
      image: "/assets/TofuScramble.jpg",
      category: "Vegetarian",
      categoryIcon: "🌱",
      calories: 330,
      cookTime: 15,
      servings: 2,
      difficulty: "Easy",
      ingredients: [
        "400g firm tofu, drained and pressed",
        "1 tbsp olive oil",
        "1/2 onion, diced",
        "1 bell pepper, diced",
        "2 cloves garlic, minced",
        "1 tsp turmeric powder",
        "1/2 tsp cumin powder",
        "Salt and pepper to taste",
        "Fresh cilantro or parsley",
        "Cherry tomatoes (optional)"
      ],
      steps: [
        "Drain tofu and press it between paper towels to remove excess water.",
        "Crumble tofu with your hands into small, scrambled egg-sized pieces.",
        "Heat olive oil in a large non-stick pan over medium heat.",
        "Add diced onion and sauté for 2-3 minutes until translucent.",
        "Add bell pepper and garlic, cook for another 2 minutes.",
        "Add crumbled tofu to the pan and break it up with a spatula.",
        "Sprinkle turmeric, cumin, salt, and pepper over the tofu.",
        "Mix well and cook for 5-7 minutes, stirring occasionally.",
        "The turmeric will give it a yellow color similar to scrambled eggs.",
        "Add cherry tomatoes in the last 2 minutes if using.",
        "Taste and adjust seasoning as needed.",
        "Garnish with fresh herbs and serve hot with toast."
      ],
      nutritionTips: "Plant-based protein powerhouse! Tofu provides complete protein and is cholesterol-free. Turmeric adds anti-inflammatory benefits."
    },
    5: {
      id: 5,
      name: "Yogurt & Granola Cup",
      image: "/assets/YogurtGranola.jpg",
      category: "Quick & Easy",
      categoryIcon: "⚡",
      calories: 270,
      cookTime: 5,
      servings: 1,
      difficulty: "Easy",
      ingredients: [
        "1 cup Greek yogurt (plain or vanilla)",
        "1/3 cup granola",
        "1/4 cup mixed berries (blueberries, strawberries, raspberries)",
        "1 tbsp honey or maple syrup",
        "1 tbsp chopped nuts (almonds or walnuts)",
        "Fresh mint leaves (optional)"
      ],
      steps: [
        "Choose your favorite glass or bowl for serving.",
        "Start with a layer of Greek yogurt at the bottom (about 1/3 cup).",
        "Add a layer of granola on top of the yogurt.",
        "Add a layer of fresh mixed berries.",
        "Repeat the layers: yogurt, granola, berries.",
        "Top with remaining yogurt.",
        "Garnish with a final sprinkle of granola and berries.",
        "Add chopped nuts for extra crunch and healthy fats.",
        "Drizzle honey or maple syrup on top.",
        "Add a mint leaf for decoration if desired.",
        "Serve immediately or refrigerate for up to 2 hours."
      ],
      nutritionTips: "Quick protein-packed breakfast! Greek yogurt provides probiotics for gut health. Perfect for busy mornings or post-workout snack."
    }
  };

  const meal = meals[id] || meals[1];

  if (!user) return null;

  return (
    <div className="min-h-screen bg-black text-white pb-10">
      {/* Header */}
      <div className="sticky top-0 z-50 bg-black/95 backdrop-blur-sm border-b border-gray-800 px-6 py-4 flex justify-between items-center">
        <button
          onClick={() => navigate(-1)}
          className="p-2 hover:bg-gray-800 rounded-lg transition-colors"
        >
          <ArrowLeft size={24} />
        </button>
        <h1 className="text-lg font-semibold">Meal Plan</h1>
        <button className="p-2 hover:bg-gray-800 rounded-lg transition-colors">
          <Share2 size={24} />
        </button>
      </div>

      {/* Hero Image */}
      <div className="relative w-full h-64 overflow-hidden">
        <img
          src={meal.image}
          alt={meal.name}
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
      </div>

      {/* Content */}
      <div className="px-6 -mt-20 relative z-10">
        {/* Title & Meta */}
        <div className="mb-6">
          <h1 className="text-3xl font-bold mb-4">{meal.name}</h1>
          
          {/* Category */}
          <div className="flex items-center gap-2 mb-4">
            <span className="text-lg">{meal.categoryIcon}</span>
            <span className="text-sm font-medium text-orange-500">
              {meal.category}
            </span>
          </div>

          {/* Meta Info */}
          <div className="flex flex-wrap gap-4 text-sm">
            <div className="flex items-center gap-2 text-gray-300">
              <Flame size={16} className="text-orange-500" />
              <span>{meal.calories} kcal</span>
            </div>
            <div className="flex items-center gap-2 text-gray-300">
              <Clock size={16} className="text-orange-500" />
              <span>{meal.cookTime} min</span>
            </div>
            <div className="flex items-center gap-2 text-gray-300">
              <span>🍽️</span>
              <span>{meal.servings} serving{meal.servings > 1 ? 's' : ''}</span>
            </div>
            <div className="flex items-center gap-2 text-gray-300">
              <span>⚡</span>
              <span>{meal.difficulty}</span>
            </div>
          </div>
        </div>

        {/* Ingredients Section */}
        <div className="mb-8">
          <h2 className="text-2xl font-bold mb-4 text-orange-500">Bahan-Bahan</h2>
          <div className="bg-gray-900 rounded-xl p-5">
            <ul className="space-y-3">
              {meal.ingredients.map((ingredient, index) => (
                <li key={index} className="flex items-start gap-3 text-gray-300">
                  <span className="text-orange-500 mt-1">✓</span>
                  <span>{ingredient}</span>
                </li>
              ))}
            </ul>
          </div>
        </div>

        {/* Steps Section */}
        <div className="mb-8">
          <h2 className="text-2xl font-bold mb-4 text-orange-500">Cara Membuat</h2>
          <div className="space-y-4">
            {meal.steps.map((step, index) => (
              <div key={index} className="flex gap-4">
                <div className="flex-shrink-0 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-sm font-bold">
                  {index + 1}
                </div>
                <p className="text-gray-300 leading-relaxed pt-1">
                  {step}
                </p>
              </div>
            ))}
          </div>
        </div>

        {/* Nutrition Tips */}
        <div className="mb-8">
          <div className="bg-orange-500/10 border border-orange-500/30 rounded-xl p-5">
            <h3 className="text-lg font-bold mb-2 flex items-center gap-2">
              <span>💡</span>
              <span>Tips Nutrisi</span>
            </h3>
            <p className="text-gray-300 text-sm leading-relaxed">
              {meal.nutritionTips}
            </p>
          </div>
        </div>

        {/* Related Meals */}
        <div className="mt-10 pt-8 border-t border-gray-800">
          <h3 className="text-xl font-bold mb-4">Resep Lainnya</h3>
          <div className="grid grid-cols-1 gap-4">
            {Object.values(meals)
              .filter((m) => m.id !== meal.id)
              .slice(0, 2)
              .map((relatedMeal) => (
                <div
                  key={relatedMeal.id}
                  onClick={() => navigate(`/meal/${relatedMeal.id}`)}
                  className="bg-gray-900 rounded-xl overflow-hidden flex gap-4 cursor-pointer hover:bg-gray-800 transition-colors"
                >
                  <img
                    src={relatedMeal.image}
                    alt={relatedMeal.name}
                    className="w-24 h-24 object-cover"
                  />
                  <div className="flex-1 py-3 pr-4">
                    <div className="flex items-center gap-2 mb-2">
                      <span className="text-sm">{relatedMeal.categoryIcon}</span>
                      <span className="text-xs text-orange-500">{relatedMeal.category}</span>
                    </div>
                    <h4 className="font-semibold mb-2">{relatedMeal.name}</h4>
                    <div className="flex gap-3 text-xs text-gray-400">
                      <span>{relatedMeal.calories} kcal</span>
                      <span>•</span>
                      <span>{relatedMeal.cookTime} min</span>
                    </div>
                  </div>
                </div>
              ))}
          </div>
        </div>
      </div>
    </div>
  );
}
