import React, { useState } from 'react';
import { Menu, X, ChevronDown } from 'lucide-react';
import { UserProfile } from './userprofile';
import { Sidebar } from './Sidebar';

const AddWorkoutForm = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [formData, setFormData] = useState({
    activityType: '',
    targetGoal: '',
    dateTime: ''
  });
  const [showProfile, setShowProfile] = useState(false);
  

  const handleSubmit = () => {
    console.log('Form submitted:', formData);
    // Add your submit logic here
  };

  return (
    <div className="min-h-screen bg-black text-white flex flex-col">
      {/* Header */}
      <header className="flex items-center justify-between px-6 py-4 border-b border-gray-800">
        <div className="flex items-center gap-3">
          <button 
            onClick={() => setIsMenuOpen(!isMenuOpen)} 
            className="text-orange-500"
          >
            <Menu size={24} />
          </button>
          <h1 className="text-lg font-bold">MoveWell</h1>
        </div>
        <div className="flex items-center gap-2">
          <button className="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <div className="w-full h-full rounded-full bg-gray-300"></div>
          </button>
          <div className="text-right">
            <div className="text-[10px] text-gray-400">Hello</div>
            <div className="text-sm font-semibold flex items-center gap-1">
              Faizah
              <ChevronDown size={14} className="text-gray-400" />
            </div>
          </div>
        </div>
      </header>

      {/* Main Content */}
      <main className="flex-1 flex flex-col items-center justify-center px-6 py-8">
        <div className="w-full max-w-md">
          {/* Title */}
          <h2 className="text-2xl font-bold text-center mb-12">
            SET NEW WORKOUT TARGET
          </h2>

          {/* Form Fields */}
          <div className="space-y-4">
            {/* Activity Type */}
            <div className="relative">
              <input
                type="text"
                placeholder="Activity Type (e.g., Running)"
                value={formData.activityType}
                onChange={(e) => setFormData({...formData, activityType: e.target.value})}
                className="w-full bg-transparent border-2 border-gray-700 rounded-lg px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
              />
              <div className="absolute right-4 top-1/2 -translate-y-1/2">
                <svg className="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path d="M13.49 5.48c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm-3.6 13.9l1-4.4 2.1 2v6h2v-7.5l-2.1-2 .6-3c1.3 1.5 3.3 2.5 5.5 2.5v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1l-5.2 2.2v4.7h2v-3.4l1.8-.7-2.1 8.8z"/>
                </svg>
              </div>
            </div>

            {/* Target Goal */}
            <div className="relative">
              <input
                type="text"
                placeholder="Target Goal (e.g., km)"
                value={formData.targetGoal}
                onChange={(e) => setFormData({...formData, targetGoal: e.target.value})}
                className="w-full bg-transparent border-2 border-gray-700 rounded-lg px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
              />
              <div className="absolute right-4 top-1/2 -translate-y-1/2">
                <svg className="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/>
                </svg>
              </div>
            </div>

            {/* Date & Time */}
            <div className="relative">
              <input
                type="text"
                placeholder="Date & Time (e.g, Tuesday 5:00 PM)"
                value={formData.dateTime}
                onChange={(e) => setFormData({...formData, dateTime: e.target.value})}
                className="w-full bg-transparent border-2 border-gray-700 rounded-lg px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition"
              />
              <div className="absolute right-4 top-1/2 -translate-y-1/2">
                <svg className="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                </svg>
              </div>
            </div>

            {/* Submit Button */}
            <button
              onClick={handleSubmit}
              className="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-lg transition-colors mt-6"
            >
              SAVE SCHEDULE
            </button>
          </div>
        </div>
      </main>
    </div>
  );
};

export default AddWorkoutForm;