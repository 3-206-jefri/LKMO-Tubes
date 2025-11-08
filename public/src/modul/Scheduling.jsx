import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Plus, Edit2, Trash2, Menu, Dumbbell } from 'lucide-react';
import { Sidebar } from './Sidebar';
import { UserProfile } from './userprofile.jsx';

const SchedulingApp = () => {
  const navigate = useNavigate();
  const [activeTab, setActiveTab] = useState('history');
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [showProfile, setShowProfile] = useState(false);
  const [user, setUser] = useState(null);

  const [activities, setActivities] = useState({
    history: [
      { id: 1, date: 'Mon, 23/10', time: '7:00 AM', title: 'RUNNING (5 KM TARGET)', result: 'RESULT: 5 KM COMPLETED', status: 'achieved' },
      { id: 2, date: 'Tue, 24/10', time: '5:00 PM', title: 'RUNNING (5.5 KM TARGET)', result: 'RESULT: 5.5 KM COMPLETED', status: 'achieved' },
      { id: 3, date: 'Thu, 26/10', time: '7:00 AM', title: 'RUNNING (6 KM TARGET)', result: 'RESULT: 4 KM COMPLETED', status: 'missed' },
      { id: 7, date: 'Fri, 27/10', time: '6:30 AM', title: 'RUNNING (7 KM TARGET)', result: 'RESULT: 7 KM COMPLETED', status: 'achieved' },
      { id: 8, date: 'Sat, 28/10', time: '8:00 AM', title: 'RUNNING (5 KM TARGET)', result: 'RESULT: 5 KM COMPLETED', status: 'achieved' },
      { id: 9, date: 'Sun, 29/10', time: '7:00 AM', title: 'RUNNING (8 KM TARGET)', result: 'RESULT: 6 KM COMPLETED', status: 'missed' },
    ],
    upcoming: [
      { id: 4, date: 'Mon, 1/11', time: '7:00 AM', title: 'RUNNING (6 KM TARGET)' },
      { id: 5, date: 'Tue, 2/11', time: '5:00 PM', title: 'RUNNING (5.5 KM TARGET)' },
      { id: 6, date: 'Wed, 3/11', time: '4:00 PM', title: 'RUNNING (6 KM TARGET)' },
      { id: 10, date: 'Thu, 4/11', time: '7:00 AM', title: 'RUNNING (7 KM TARGET)' },
      { id: 11, date: 'Fri, 5/11', time: '6:00 AM', title: 'RUNNING (5 KM TARGET)' },
      { id: 12, date: 'Sat, 6/11', time: '8:30 AM', title: 'RUNNING (10 KM TARGET)' },
    ]
  });

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

  const completedCount = activities.history.filter(a => a.status === 'achieved').length;
  const missedCount = activities.history.filter(a => a.status === 'missed').length;
  const totalWorkouts = activities.history.length + activities.upcoming.length;

  const getStatusBadge = (status) => {
    if (status === 'achieved') {
      return <span className="px-2.5 py-1 bg-green-500 text-white text-[10px] font-bold rounded">ACHIEVED</span>;
    }
    if (status === 'missed') {
      return <span className="px-2.5 py-1 bg-orange-500 text-white text-[10px] font-bold rounded">MISSED</span>;
    }
    return null;
  };

  if (!user) return null;

  return (
    <div className="min-h-screen bg-black text-white">
      <style>{`
        .scrollbar-thin::-webkit-scrollbar {
          width: 4px;
        }
        .scrollbar-thin::-webkit-scrollbar-track {
          background: #1a1a1a;
          border-radius: 10px;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb {
          background: #4a4a4a;
          border-radius: 10px;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
          background: #5a5a5a;
        }
      `}</style>

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
          {/* Header - sama dengan Dashboard */}
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
            <h2 className="text-orange-500 text-lg font-semibold mb-4">MY ACTIVITY</h2>

            {/* Tabs */}
            <div className="flex gap-1 mb-4 bg-gray-900 rounded-lg p-1">
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
              <button
                onClick={() => setActiveTab('upcoming')}
                className={`flex-1 py-2.5 text-sm font-semibold rounded-md transition ${
                  activeTab === 'upcoming'
                    ? 'bg-gray-700 text-white'
                    : 'bg-transparent text-gray-400'
                }`}
              >
                Upcoming
              </button>
            </div>

        
            <div className="space-y-2.5 mb-4 max-h-96 overflow-y-auto pr-1 scrollbar-thin">
              {activities[activeTab].map((activity) => (
                <div
                  key={activity.id}
                  className="bg-gray-900 border border-gray-800 rounded-xl p-3 flex items-center justify-between"
                >
                  <div className="flex items-center gap-3 flex-1">
                    {/* Running Icon */}
                    <div className="w-9 h-9 flex items-center justify-center flex-shrink-0">
                      <svg className="w-7 h-7" fill="white" viewBox="0 0 24 24">
                        <path d="M13.49 5.48c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm-3.6 13.9l1-4.4 2.1 2v6h2v-7.5l-2.1-2 .6-3c1.3 1.5 3.3 2.5 5.5 2.5v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1l-5.2 2.2v4.7h2v-3.4l1.8-.7-2.1 8.8z"/>
                      </svg>
                    </div>
                    <div className="flex-1 min-w-0">
                      <div className="text-[10px] text-gray-400 mb-0.5">{activity.date} - {activity.time}</div>
                      <div className="font-bold text-xs mb-0.5">{activity.title}</div>
                      {activity.result && (
                        <div className="text-[10px] text-gray-400">{activity.result}</div>
                      )}
                    </div>
                  </div>
                  <div className="flex items-center gap-1.5 ml-2 flex-shrink-0">
                    {activeTab === 'history' ? (
                      getStatusBadge(activity.status)
                    ) : (
                      <div className="flex flex-col gap-1">
                        <button className="text-gray-400 hover:text-white transition p-1.5 rounded-full bg-gray-800">
                          <Edit2 className="w-3.5 h-3.5" />
                        </button>
                        <button className="text-gray-400 hover:text-white transition p-1.5 rounded-full bg-gray-800">
                          <Trash2 className="w-3.5 h-3.5" />
                        </button>
                      </div>
                    )}
                  </div>
                </div>
              ))}
            </div>

            {/* Stats */}
            <div className="grid grid-cols-2 gap-4 mb-4">
              <div className="bg-gray-900 rounded-2xl p-4 text-center">
                <div className="text-2xl font-bold mb-0.5">{completedCount}</div>
                <div className="text-sm text-gray-400">Completed</div>
              </div>
              <div className="bg-gray-900 rounded-2xl p-4 text-center">
                <div className="text-2xl font-bold mb-0.5">{activeTab === 'history' ? missedCount : activities.upcoming.length}</div>
                <div className="text-sm text-gray-400">{activeTab === 'history' ? 'Missed' : 'Upcoming'}</div>
              </div>
            </div>

            <div className="bg-gray-900 rounded-2xl p-4 text-center mb-4">
              <div className="text-2xl font-bold mb-0.5">{totalWorkouts}</div>
              <div className="text-sm text-gray-400">Total Workouts</div>
            </div>

              
              <button 
              onClick={() => navigate('/add-workout')}
              className="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg flex items-center justify-center gap-2 transition">
                ADD WORKOUT
                <Plus className="w-5 h-5" />
              </button>

          </main>
        </>
      )}
    </div>
  );
};

export default SchedulingApp;