import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { Menu, Dumbbell } from 'lucide-react';
import { Sidebar } from './Sidebar.jsx';
import { UserProfile } from './userprofile.jsx';

export default function Dashboard() {
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

  const articles = [
    {
      id: 1,
      image: "/assets/Glukosa.jpg",
      title: 'Memahami Glukosa Darah',
      description: 'apa itu dan apa pengaruhnya pada tubuh anda'
    },
    {
      id: 2,
      image: '/assets/Threadmill.jpg',
      title: 'Pelajari Kebugaran Jantung',
      description: 'Bagaimana cara mengukurnya, kenapa itu penting, dan cara meningkatkannya'
    },
    {
      id: 3,
      image: '/assets/Jogging.jpg',
      title: 'Latihan yang Dapat Meningkatkan Stabilitas Berjalan Kaki',
      description: 'Kenapa stabilitas berjalan kaki menurun dan apa yang dapat anda lakukan untuk meningkatkannya'
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

          <main className="px-6 py-6">
            <section className="mb-8">
              <h2 className="text-orange-500 text-lg font-semibold mb-1 flex items-center gap-2">
                Track Your Daily Activity 🔥
              </h2>
              <p className="text-xs text-gray-400 mb-4">
                Check Your Daily Fitness Activities And Maintain Your Health.
              </p>

              <div className="grid grid-cols-2 gap-4 mb-4">
                <div className="bg-gray-900 rounded-2xl p-4">
                  <h3 className="text-sm mb-2">Calories</h3>
                  <div className="relative w-32 h-32 mx-auto mb-2">
                    <svg className="w-full h-full transform -rotate-90">
                      <circle cx="64" cy="64" r="56" stroke="#374151" strokeWidth="8" fill="none" />
                      <circle cx="64" cy="64" r="56" stroke="#f97316" strokeWidth="8" fill="none" strokeDasharray="351.86" strokeDashoffset="87.96" strokeLinecap="round" />
                    </svg>
                    <div className="absolute inset-0 flex flex-col items-center justify-center">
                      <span className="text-2xl font-bold">0</span>
                      <span className="text-xs text-gray-400">Cal</span>
                    </div>
                  </div>
                  <div className="flex justify-between text-xs">
                    <span className="text-gray-400">Goal</span>
                    <span>2,747 Cal</span>
                  </div>
                </div>

                <div className="bg-gray-900 rounded-2xl p-4 flex flex-col justify-between">
                  <h3 className="text-sm mb-2">Daily Remainder</h3>
                  <div className="flex-1 flex items-center justify-center">
                    <div className="text-center">
                      <div className="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <Dumbbell size={16} />
                      </div>
                      <p className="text-xs text-gray-400 mb-1">Today's Workout: 5 Km Run</p>
                      <p className="text-xs font-semibold">18:00 PM</p>
                    </div>
                  </div>
                  <button className="w-full py-2 bg-orange-500 rounded-lg text-xs font-medium mt-2">
                    Click Here For More
                  </button>
                </div>
              </div>
            </section>

            <section>
              <h2 className="text-orange-500 text-base font-semibold mb-3">
                Article - "Fuel Your Mind, Move Your Body"
              </h2>
              <div className="space-y-4">
                {articles.map((article, index) => (
                  <div 
                    key={index} 
                    className="relative rounded-2xl overflow-hidden h-48 cursor-pointer transition-transform hover:scale-[1.02]"
                    onClick={() => navigate(`/article/${article.id}`)}
                  >
                    <div className="absolute inset-0 bg-gradient-to-b from-black/40 to-black"></div>
                    <img src={article.image} alt={article.title} className="w-full h-full object-cover" />
                    <div className="absolute bottom-0 left-0 right-0 p-4">
                      <h3 className="font-semibold mb-1 text-sm">{article.title}</h3>
                      <p className="text-xs text-gray-300">{article.description}</p>
                    </div>
                  </div>
                ))}
              </div>
            </section>
          </main>
        </>
      )}
    </div>
  );
}