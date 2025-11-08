import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { Menu, ArrowRight } from 'lucide-react';
import { Sidebar } from './Sidebar.jsx';
import { UserProfile } from './userprofile.jsx';

export default function ExerciseGuide() {
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

  const exercises = [
    {
      id: 1,
      name: 'Push - Up',
      image: '/assets/PushUp.jpg',
      muscles: ['Chest', 'Triceps', 'Shoulders', 'Core']
    },
    {
      id: 2,
      name: 'Squat',
      image: '/assets/Squat.jpg',
      muscles: ['Quadriceps', 'Glutes', 'Hamstrings', 'Core']
    },
    {
      id: 3,
      name: 'Plank',
      image: '/assets/Plank.jpg',
      muscles: ['Shoulders', 'Lower back', 'Glutes', 'Core']
    },
    {
      id: 4,
      name: 'Jumping Jack',
      image: '/assets/JumpingJack.jpg',
      muscles: ['Calves', 'Shoulders', 'Glutes', 'Core']
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
          <main className="px-6 py-8">
        {/* Title Section */}
        <div className="mb-8">
          <h1 className="text-3xl font-bold mb-3">EXERCISE GUIDE</h1>
          <p className="text-gray-400 text-sm">
            "Every Move Counts. Start Small, Stay Consistent, And Feel The Difference"
          </p>
        </div>

        {/* Exercise Cards */}
        <div className="space-y-6">
          {exercises.map((exercise) => (
            <div
              key={exercise.id}
              className="bg-gray-900 rounded-2xl overflow-hidden cursor-pointer hover:bg-gray-800 transition-colors"
              onClick={() => navigate(`/exercise/${exercise.id}`)}
            >
              <div className="flex items-center gap-4 p-4">
                {/* Exercise Image */}
                <div className="w-40 h-32 flex-shrink-0 rounded-xl overflow-hidden bg-gray-800">
                  <img
                    src={exercise.image}
                    alt={exercise.name}
                    className="w-full h-full object-cover"
                  />
                </div>

                {/* Exercise Info */}
                <div className="flex-1">
                  {/* Muscle Tags */}
                  <div className="flex flex-wrap gap-2 mb-3">
                    {exercise.muscles.map((muscle, index) => (
                      <span
                        key={index}
                        className="px-3 py-1 bg-gray-800 rounded-full text-xs text-gray-300"
                      >
                        {muscle}
                      </span>
                    ))}
                  </div>

                  {/* Exercise Name */}
                  <h3 className="text-xl font-bold mb-3">{exercise.name}</h3>

                  {/* Click Here Button */}
                  <div className="flex items-center gap-2 text-orange-500 text-sm font-medium hover:text-orange-400 transition-colors">
                    <span>Click Here For More</span>
                    <ArrowRight size={16} />
                  </div>
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
