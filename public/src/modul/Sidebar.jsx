import React from 'react';
import { useNavigate } from 'react-router-dom';
import { Menu, X, Home, Calendar, Dumbbell, Calculator, UtensilsCrossed, Sparkles, LogOut } from 'lucide-react';

export function Sidebar({ isOpen, onClose, user, onProfileClick, onLogout }) {
  const navigate = useNavigate();
  
  const menuItems = [
    { icon: Home, label: 'Dashboard', path: '/dashboard' },
    { icon: Calendar, label: 'Scheduling', path: '/scheduling' },
    { icon: Dumbbell, label: 'Exercise Guide', path: '/exercise-guide' },
    { icon: Calculator, label: 'Calories Calculator', path: '/calories-calculator' },
    { icon: UtensilsCrossed, label: 'Meal Plan', path: '/meal-plan' },
  ];

  const handleMenuClick = (path) => {
    navigate(path);
    onClose();
  };

  return (
    <div 
      className={`fixed inset-0 bg-black z-50 transform transition-transform duration-300 ${
        isOpen ? 'translate-x-0' : '-translate-x-full'
      }`}
    >
      <div className="flex flex-col h-full">
        {/* Header */}
        <div className="flex items-center justify-between px-6 py-4 border-b border-gray-800">
          <div className="flex items-center gap-2">
            <img src="/assets/logo.svg" alt="Logo" className="w-8 h-8" />
            <h1 className="text-lg font-bold">MoveWell</h1>
          </div>
          <button onClick={onClose}>
            <X size={24} />
          </button>
        </div>

        {/* Profile */}
        <div className="px-6 py-8 border-b border-gray-800">
          <button onClick={onProfileClick} className="w-full hover:opacity-80 transition-opacity">
            <div className="w-20 h-20 rounded-full bg-gray-300 mx-auto mb-4 flex items-center justify-center text-black text-2xl font-bold">
              {user?.username?.substring(0, 2).toUpperCase() || 'DP'}
            </div>
            <h2 className="text-center text-lg font-semibold mb-1">{user?.username || 'User'}</h2>
            <p className="text-center text-sm text-blue-400">{user?.email}</p>
          </button>
        </div>

        {/* Menu */}
        <nav className="flex-1 px-6 py-6 overflow-y-auto">
          <div className="space-y-2">
            {menuItems.map((item, index) => (
              <button
                key={index}
                onClick={() => handleMenuClick(item.path)}
                className="w-full flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-900 transition-colors text-left"
              >
                <item.icon size={20} />
                <span className="text-sm">{item.label}</span>
              </button>
            ))}
          </div>
        </nav>

        {/* Logout */}
        <div className="px-6 py-6 border-t border-gray-800">
          <button onClick={onLogout} className="w-full flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-900 transition-colors text-left text-orange-500">
            <LogOut size={20} />
            <span className="text-sm">Log Out</span>
          </button>
        </div>
      </div>
    </div>
  );
}
