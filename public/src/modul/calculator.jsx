import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Menu, ChevronDown, Flame } from 'lucide-react';
import { UserProfile } from "./userprofile.jsx";
import { Sidebar } from "./Sidebar.jsx";

const CaloriesCalculator = () => {
  const navigate = useNavigate();
  const [activeTab, setActiveTab] = useState('calculator');
  const [showResults, setShowResults] = useState(false);
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [showProfile, setShowProfile] = useState(false);
  const [user, setUser] = useState(null);
  
  const [formData, setFormData] = useState({
    age: '20',
    gender: 'Male',
    height: '180',
    weight: '60',
    activity: 'Sedentary : Little or no Exercise'
  });

  const [foodList, setFoodList] = useState([
    { id: 1, name: 'Salmon with Sweet Potato', kcal: 520, time: 'Mon, 23/10 - 17:00 PM' },
    { id: 2, name: 'Tofu Scramble', kcal: 330, time: 'Mon, 23/10 - 11:00 AM' },
    { id: 3, name: 'Yogurt & Granola Cup', kcal: 270, time: 'Mon, 23/10 - 7:35 AM' },
    { id: 4, name: 'Nasi Goreng', kcal: 290, time: 'Mon, 23/10 - 7:00 AM' }
  ]);

  const [newFood, setNewFood] = useState({ name: '', kcal: '' });
  const [showAddForm, setShowAddForm] = useState(false);

  const [results, setResults] = useState({
    bmr: 2051,
    tdee: 2461
  });

  const activityLevels = [
    'Sedentary : Little or no Exercise',
    'Exercise 15-30 Minutes Of Elevated Heart Rate Activity',
    'Intense Exercise 45-120 Minutes Of Elevated Heart Rate Activity',
    'Very Intense Exercise 2+ Hours of Elevated Heart Rate Activity'
  ];

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

  const handleCalculate = () => {
    const heightCm = parseFloat(formData.height);
    const weightKg = parseFloat(formData.weight);
    const age = parseFloat(formData.age);
    
    let bmr;
    if (formData.gender === 'Male') {
      bmr = 10 * weightKg + 6.25 * heightCm - 5 * age + 5;
    } else {
      bmr = 10 * weightKg + 6.25 * heightCm - 5 * age - 161;
    }

    let multiplier = 1.2;
    if (formData.activity.includes('15-30')) multiplier = 1.375;
    else if (formData.activity.includes('45-120')) multiplier = 1.55;
    else if (formData.activity.includes('2+')) multiplier = 1.725;

    const tdee = bmr * multiplier;

    setResults({
      bmr: Math.round(bmr),
      tdee: Math.round(tdee)
    });
    setShowResults(true);
  };

  const handleAddFood = () => {
    if (newFood.name && newFood.kcal) {
      const now = new Date();
      const timeStr = now.toLocaleString('en-US', { 
        weekday: 'short', 
        month: '2-digit', 
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true 
      });
      
      setFoodList([
        { 
          id: Date.now(), 
          name: newFood.name, 
          kcal: parseInt(newFood.kcal),
          time: timeStr
        },
        ...foodList
      ]);
      setNewFood({ name: '', kcal: '' });
      setShowAddForm(false);
    }
  };

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
              <button onClick={() => setIsMenuOpen(true)} className="text-orange-500">
                <Menu size={24} />
              </button>
              <div className="flex items-center gap-2">
                <img src="/assets/logo.svg" alt="Logo" className="w-8 h-8" />
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
          <main className="px-6 py-6">
            {/* Title */}
            <div className="text-center mb-6">
              <h2 className="text-orange-500 text-2xl font-bold mb-1">Calories Calculator</h2>
              <p className="text-white text-xs italic">"By Meeting BMR, The Body Can Grow And Function Properly"</p>
            </div>

            {/* Tabs */}
            <div className="flex gap-1 mb-6 bg-gray-900 rounded-lg p-1">
              <button
                onClick={() => {
                  setActiveTab('calculator');
                  setShowResults(false);
                }}
                className={`flex-1 py-2.5 text-sm font-semibold rounded-md transition ${
                  activeTab === 'calculator'
                    ? 'bg-gray-700 text-white'
                    : 'bg-transparent text-gray-400'
                }`}
              >
                Calculator
              </button>
              <button
                onClick={() => setActiveTab('history')}
                className={`flex-1 py-2.5 text-sm font-semibold rounded-md transition ${
                  activeTab === 'history'
                    ? 'bg-gray-700 text-white'
                    : 'bg-transparent text-gray-400'
                }`}
              >
                History
              </button>
            </div>

            {/* Calculator Tab */}
            {activeTab === 'calculator' && !showResults && (
              <div className="space-y-4">
                {/* Age */}
                <div>
                  <label className="text-sm text-white mb-2 block">Age</label>
                  <input
                    type="number"
                    value={formData.age}
                    onChange={(e) => setFormData({...formData, age: e.target.value})}
                    className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                  />
                </div>

                {/* Gender */}
                <div>
                  <label className="text-sm text-white mb-2 block">Gender</label>
                  <select
                    value={formData.gender}
                    onChange={(e) => setFormData({...formData, gender: e.target.value})}
                    className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 appearance-none"
                  >
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>

                {/* Height */}
                <div>
                  <label className="text-sm text-white mb-2 block">Height</label>
                  <div className="relative">
                    <input
                      type="number"
                      value={formData.height}
                      onChange={(e) => setFormData({...formData, height: e.target.value})}
                      className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    />
                    <span className="absolute right-4 top-1/2 -translate-y-1/2 text-black text-sm">cm</span>
                  </div>
                </div>

                {/* Weight */}
                <div>
                  <label className="text-sm text-white mb-2 block">Weight</label>
                  <div className="relative">
                    <input
                      type="number"
                      value={formData.weight}
                      onChange={(e) => setFormData({...formData, weight: e.target.value})}
                      className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    />
                    <span className="absolute right-4 top-1/2 -translate-y-1/2 text-black text-sm">kg</span>
                  </div>
                </div>

                {/* Activity */}
                <div>
                  <label className="text-sm text-white mb-2 block">Activity</label>
                  <select
                    value={formData.activity}
                    onChange={(e) => setFormData({...formData, activity: e.target.value})}
                    className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 appearance-none text-sm"
                  >
                    {activityLevels.map((level, idx) => (
                      <option key={idx}>{level}</option>
                    ))}
                  </select>
                </div>

                {/* Activity Info */}
                <div className="text-[10px] text-white space-y-1 mt-2">
                  <p>• Exercise 15-30 Minutes Of Elevated Heart Rate Activity.</p>
                  <p>• Intense Exercise 45-120 Minutes Of Elevated Heart Rate Activity.</p>
                  <p>• Very Intense Exercise 2+ Hours of Elevated Heart Rate Activity.</p>
                </div>

                {/* Calculate Button */}
                <button
                  onClick={handleCalculate}
                  className="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-lg transition-colors mt-6"
                >
                  CALCULATE
                </button>
              </div>
            )}

            {/* Results View */}
            {activeTab === 'calculator' && showResults && (
              <div className="space-y-4">
                {/* BMR Card */}
                <div className="bg-gray-200 text-black rounded-2xl p-5">
                  <div className="flex items-start justify-between mb-2">
                    <div className="flex items-center gap-2">
                      <Flame className="w-5 h-5 text-orange-500" />
                      <h3 className="font-bold text-lg">Your BMR Index</h3>
                    </div>
                    <div className="text-right">
                      <div className="text-3xl font-bold">{results.bmr.toLocaleString()}</div>
                      <div className="text-xs text-gray-600">kcal/day</div>
                    </div>
                  </div>
                  <p className="text-xs text-gray-700 leading-relaxed">
                    The BMR Index indicates the number of calories your body needs to maintain basic physiological functions at rest throughout the day
                  </p>
                </div>

                {/* TDEE Card */}
                <div className="bg-gray-200 text-black rounded-2xl p-5">
                  <div className="flex items-start justify-between mb-2">
                    <div className="flex items-center gap-2">
                      <Flame className="w-5 h-5 text-orange-500" />
                      <h3 className="font-bold text-lg">TDEE Index</h3>
                    </div>
                    <div className="text-right">
                      <div className="text-3xl font-bold">{results.tdee.toLocaleString()}</div>
                      <div className="text-xs text-gray-600">kcal/day</div>
                    </div>
                  </div>
                  <p className="text-xs text-gray-700 leading-relaxed">
                    TDEE is the total calories you burn in a day, including calories burned during physical activities and exercise on top of your BMR
                  </p>
                </div>

                {/* Notes */}
                <div className="bg-black border border-yellow-500 rounded-lg p-4 mt-4">
                  <div className="flex items-start gap-2">
                    <span className="text-yellow-500 text-lg">⚠️</span>
                    <div>
                      <h4 className="text-yellow-500 font-bold text-xs mb-1">Notes :</h4>
                      <p className="text-white text-[10px] leading-relaxed">
                        The Results From This BMR Calculator Are Not A Medical Diagnostic Tool Or A Substitute For Consulting A Doctor. Please Note That Several Factors May Influence The Results Of This BMR Calculator, Including Age, Physical Condition, Weight, Height And Daily Activity. Before Making Any Lifestyle Changes, Be Sure To Consult A Doctor First.
                      </p>
                    </div>
                  </div>
                </div>

                {/* Back Button */}
                <button
                  onClick={() => setShowResults(false)}
                  className="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors mt-4"
                >
                  CALCULATE AGAIN
                </button>
              </div>
            )}

            {/* History Tab */}
            {activeTab === 'history' && (
              <div>
                {showAddForm ? (
                  <div className="space-y-4 mb-6">
                    <div>
                      <label className="text-sm text-white mb-2 block">Food</label>
                      <input
                        type="text"
                        placeholder="Enter food name"
                        value={newFood.name}
                        onChange={(e) => setNewFood({...newFood, name: e.target.value})}
                        className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                      />
                    </div>
                    <div>
                      <label className="text-sm text-white mb-2 block">Kcal</label>
                      <input
                        type="number"
                        placeholder="Enter calories"
                        value={newFood.kcal}
                        onChange={(e) => setNewFood({...newFood, kcal: e.target.value})}
                        className="w-full bg-gray-200 text-black rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                      />
                    </div>
                    <div className="flex gap-2">
                      <button
                        onClick={handleAddFood}
                        className="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-lg transition-colors"
                      >
                        SAVE
                      </button>
                      <button
                        onClick={() => {
                          setShowAddForm(false);
                          setNewFood({ name: '', kcal: '' });
                        }}
                        className="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 rounded-lg transition-colors"
                      >
                        CANCEL
                      </button>
                    </div>
                  </div>
                ) : (
                  <div className="space-y-3 mb-6">
                    {foodList.map((food) => (
                      <div key={food.id} className="bg-transparent border-2 border-gray-700 rounded-xl p-4 flex items-center justify-between">
                        <div className="flex items-center gap-3">
                          <div className="w-10 h-10 flex items-center justify-center">
                            <svg className="w-8 h-8" fill="white" viewBox="0 0 24 24">
                              <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"/>
                            </svg>
                          </div>
                          <div>
                            <h3 className="font-bold text-sm">{food.name}</h3>
                            <p className="text-xs text-orange-500">🔥 {food.kcal} kcal</p>
                          </div>
                        </div>
                        <div className="text-right">
                          <p className="text-xs text-gray-400">{food.time}</p>
                        </div>
                      </div>
                    ))}
                  </div>
                )}

                {/* Add More Food Button */}
                {!showAddForm && (
                  <button
                    onClick={() => setShowAddForm(true)}
                    className="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-lg transition-colors"
                  >
                    ADD MORE FOOD
                  </button>
                )}
              </div>
            )}
          </main>
        </>
      )}
    </div>
  );
};

export default CaloriesCalculator;