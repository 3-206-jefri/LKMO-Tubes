import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { Menu, ArrowRight, Flame } from 'lucide-react';
import { Sidebar } from './Sidebar.jsx';
import { UserProfile } from './userprofile.jsx';

export default function MealPlan() {
  const navigate = useNavigate();
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [showProfile, setShowProfile] = useState(false);
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

  const handleLogout = () => {
    if (window.confirm('Are you sure you want to logout?')) {
      try {
        const updatedUser = { ...user, isLoggedIn: false };
        localStorage.setItem('user', JSON.stringify(updatedUser));
        navigate('/signin');
      } catch (error) {
        console.error('Logout error:', error);
      }
    }
  };

  const meals = [
    {
      id: 1,
      name: 'Avocado Toast with Egg',
      image: '/assets/AvocadoToast.jpg',
      category: 'Weight Loss',
      categoryIcon: '⚖️',
      calories: 280,
      cookTime: 10,
      categoryColor: 'text-blue-400'
    },
    {
      id: 2,
      name: 'Salmon with Sweet Potato',
      image: '/assets/SalmonPotato.jpg',
      category: 'Muscle Gain',
      categoryIcon: '💪',
      calories: 520,
      cookTime: 30,
      categoryColor: 'text-orange-400'
    },
    {
      id: 3,
      name: 'Smoothie Bowl',
      image: '/assets/SmoothieBowl.jpg',
      category: 'Healthy Lifestyle',
      categoryIcon: '🥗',
      calories: 300,
      cookTime: 10,
      categoryColor: 'text-green-400'
    },
    {
      id: 4,
      name: 'Tofu Scramble',
      image: '/assets/TofuScramble.jpg',
      category: 'Vegetarian',
      categoryIcon: '🌱',
      calories: 330,
      cookTime: 15,
      categoryColor: 'text-green-500'
    },
    {
      id: 5,
      name: 'Yogurt & Granola Cup',
      image: '/assets/YogurtGranola.jpg',
      category: 'Quick & Easy',
      categoryIcon: '⚡',
      calories: 270,
      cookTime: 5,
      categoryColor: 'text-gray-400'
    }
  ];

  if (!user) return null;

  return (
    <div className="min-h-screen bg-black text-white">
      <Sidebar 
        isOpen={isMenuOpen} 
        onClose={() => setIsMenuOpen(false)}
        user={user}
        onProfileClick={() => {
          setShowProfile(true);
          setIsMenuOpen(false);
        }}
        onLogout={handleLogout}
      />

      {showProfile ? (
        <UserProfile 
          onBack={() => setShowProfile(false)}
          onMenuClick={() => setIsMenuOpen(true)}
          user={user}
          setUser={setUser}
        />
      ) : (
        <>
          {/* Header */}
          <header className="flex items-center justify-between px-6 py-4 border-b border-gray-800">
            <div className="flex items-center gap-3">
              <button 
                onClick={() => setIsMenuOpen(true)} 
                className="text-orange-500"
              >
                <Menu size={24} />
              </button>
              <div className="flex items-center gap-2">
                <div className="w-6 h-6 bg-orange-500 rounded"></div>
                <h1 className="text-lg font-bold">MoveWell</h1>
              </div>
            </div>
            <button 
              onClick={() => setShowProfile(true)}
              className="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-black text-xs font-bold hover:bg-gray-400 transition-colors"
            >
              {user.username?.substring(0, 2).toUpperCase() || 'DP'}
            </button>
          </header>

          {/* Main Content */}
          <main className="px-6 py-8">
            {/* Title Section */}
            <div className="mb-8">
              <h1 className="text-3xl font-bold mb-3 text-orange-500">Meal Plan</h1>
              <p className="text-gray-400 text-sm">
                "Eat Smart, Move Well, Live Strong"
              </p>
            </div>

            {/* Subtitle */}
            <div className="mb-6">
              <h2 className="text-base font-semibold mb-1">
                Healthy doesn't have to be boring 🍽️
              </h2>
              <p className="text-xs text-gray-400">
                Discover Meal Ideas That Are Easy To Follow, Taste Amazing, And Support Your Fitness Journey.
              </p>
            </div>

            {/* Meal Cards */}
            <div className="space-y-6">
              {meals.map((meal) => (
                <div
                  key={meal.id}
                  className="bg-gray-900 rounded-2xl overflow-hidden cursor-pointer hover:bg-gray-800 transition-colors"
                  onClick={() => navigate(`/meal/${meal.id}`)}
                >
                  <div className="flex items-center gap-4 p-4">
                    {/* Meal Image */}
                    <div className="w-40 h-32 flex-shrink-0 rounded-xl overflow-hidden bg-gray-800">
                      <img
                        src={meal.image}
                        alt={meal.name}
                        className="w-full h-full object-cover"
                      />
                    </div>

                    {/* Meal Info */}
                    <div className="flex-1">
                      {/* Category Tag */}
                      <div className="flex items-center gap-2 mb-3">
                        <span className="text-sm">{meal.categoryIcon}</span>
                        <span className={`text-xs font-medium ${meal.categoryColor}`}>
                          {meal.category}
                        </span>
                      </div>

                      {/* Meal Name */}
                      <h3 className="text-lg font-bold mb-3">{meal.name}</h3>

                      {/* Calories & Cook Time */}
                      <div className="flex items-center gap-4 mb-3 text-xs text-gray-400">
                        <div className="flex items-center gap-1">
                          <Flame size={14} className="text-orange-500" />
                          <span>{meal.calories} kcal</span>
                        </div>
                        <div className="flex items-center gap-1">
                          <span>🕐</span>
                          <span>{meal.cookTime} min cook</span>
                        </div>
                      </div>

                      {/* Click Here Button */}
                      <button className="flex items-center gap-2 text-orange-500 text-xs font-medium hover:text-orange-400 transition-colors">
                        <span>Click Here For More</span>
                        <ArrowRight size={14} />
                      </button>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </main>
        </>
      )}
    </div>
  );
}
