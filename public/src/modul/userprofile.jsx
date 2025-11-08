import React, { useState } from 'react';
import { Menu } from 'lucide-react';

export function UserProfile({ onBack, onMenuClick, user, setUser }) {
  const [formData, setFormData] = useState({
    username: user?.username || '',
    nickname: user?.nickname || '',
    email: user?.email || '',
    dateOfBirth: user?.dateOfBirth || '',
    height: user?.height || '',
    weight: user?.weight || '',
    gender: user?.gender || ''
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSave = async () => {
    const updatedUser = { ...user, ...formData };
    
    try {
      await window.storage.set('user', JSON.stringify(updatedUser));
      setUser(updatedUser);
      alert('Profile updated successfully!');
      onBack();
    } catch (error) {
      console.error('Error saving profile:', error);
      alert('Failed to save profile');
    }
  };

  const formFields = [
    { label: 'Username', name: 'username', type: 'text' },
    { label: 'Nickname', name: 'nickname', type: 'text' },
    { label: 'Email', name: 'email', type: 'email' },
    { label: 'Date of Birth', name: 'dateOfBirth', type: 'date' },
    { label: 'Height', name: 'height', type: 'number', placeholder: 'cm' },
    { label: 'Weight', name: 'weight', type: 'number', placeholder: 'kg' },
  ];

  return (
    <>
      <header className="flex items-center justify-between px-6 py-4 border-b border-gray-800">
        <div className="flex items-center gap-3">
          <button onClick={onMenuClick} className="text-orange-500">
            <Menu size={24} />
          </button>
          <div className="flex items-center gap-2">
            <img src="/assets/logo.svg" alt="Logo" className="w-8 h-8" />
            <h1 className="text-lg font-bold">MoveWell</h1>
          </div>
        </div>
      </header>

      <main className="px-6 py-6">
        <button onClick={onBack} className="flex items-center gap-2 text-gray-400 hover:text-white transition-colors mb-6">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
            <polyline points="15 18 9 12 15 6"/>
          </svg>
          <span className="text-sm">Back</span>
        </button>

        <h2 className="text-xl font-bold mb-6 text-center">Profile</h2>

        <div className="flex flex-col items-center mb-8">
          <div className="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center text-black text-3xl font-bold mb-3">
            {formData.username?.substring(0, 2).toUpperCase() || 'DP'}
          </div>
          <button className="text-sm text-blue-400 hover:underline">Change Photo</button>
        </div>

        <div className="space-y-4 max-w-md mx-auto">
          {formFields.map(field => (
            <div key={field.name}>
              <label className="block text-sm text-gray-400 mb-2">{field.label}</label>
              <input
                type={field.type}
                name={field.name}
                value={formData[field.name]}
                onChange={handleChange}
                placeholder={field.placeholder}
                className="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors"
              />
            </div>
          ))}

          <div>
            <label className="block text-sm text-gray-400 mb-2">Gender</label>
            <select
              name="gender"
              value={formData.gender}
              onChange={handleChange}
              className="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors"
            >
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>

          <button
            onClick={handleSave}
            className="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition-colors mt-6"
          >
            Save Changes
          </button>
        </div>
      </main>
    </>
  );
}