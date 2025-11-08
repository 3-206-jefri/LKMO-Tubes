import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

export default function SignUp() {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    username: '',
    email: '',
    password: '',
    rePassword: ''
  });
  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
    // Clear error when user types
    if (errors[name]) {
      setErrors(prev => ({ ...prev, [name]: '' }));
    }
  };

  const validateForm = () => {
    const newErrors = {};

    if (!formData.username.trim()) {
      newErrors.username = 'Username is required';
    }

    if (!formData.email.trim()) {
      newErrors.email = 'Email is required';
    } else if (!/\S+@\S+\.\S+/.test(formData.email)) {
      newErrors.email = 'Email is invalid';
    }

    if (!formData.password) {
      newErrors.password = 'Password is required';
    } else if (formData.password.length < 6) {
      newErrors.password = 'Password must be at least 6 characters';
    }

    if (!formData.rePassword) {
      newErrors.rePassword = 'Please confirm your password';
    } else if (formData.password !== formData.rePassword) {
      newErrors.rePassword = 'Passwords do not match';
    }

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    if (validateForm()) {
      // Check if email already exists
      const existingUser = localStorage.getItem('user');
      if (existingUser) {
        const user = JSON.parse(existingUser);
        if (user.email === formData.email) {
          alert('Email already registered! Please sign in.');
          navigate('/signin');
          return;
        }
      }

      // Save user data to localStorage
      const userData = {
        username: formData.username,
        email: formData.email,
        password: formData.password, // In real app, never store plain password!
        isLoggedIn: false
      };

      localStorage.setItem('user', JSON.stringify(userData));
      
      alert('Account created successfully! Please sign in.');
      navigate('/signin');
    }
  };

  return (
    <div className="min-h-screen bg-black text-white flex flex-col">
      {/* Header */}
      <header className="px-6 py-4">
        <Link to="/" className="flex items-center gap-2 w-fit">
          <img src="/assets/logo.svg" alt="MoveWell" className="w-8 h-8" />
          <h1 className="text-xl font-bold">MoveWell</h1>
        </Link>
      </header>

      {/* Main Content */}
      <main className="flex-1 flex flex-col items-center justify-center px-6 py-8">
        {/* Text Content */}
        <div className="max-w-md w-full mb-8">
          <h3 className="text-lg font-semibold mb-4">
            Create your account
          </h3>
          <p className="text-sm text-gray-400 leading-relaxed">
            Welcome! Please sign up to access your account. Fill in your details below to get started. It only takes a minute to join our community.
          </p>
          <p className="text-sm text-gray-400 mt-4">
            Enter your username, email, and a new password.
          </p>
        </div>

        {/* Form Section */}
        <div className="max-w-md w-full">
          <h2 className="text-2xl md:text-3xl font-bold text-center mb-2">
            CREATE YOUR ACCOUNT
          </h2>
          <p className="text-center text-sm text-gray-400 mb-8">JOIN NOW</p>

          <form onSubmit={handleSubmit} className="space-y-6">
            <div>
              <label className="block text-sm mb-2">Username</label>
              <input
                type="text"
                name="username"
                value={formData.username}
                onChange={handleChange}
                className="w-full px-4 py-3 bg-gray-200 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Enter your username"
              />
              {errors.username && (
                <p className="text-red-500 text-xs mt-1">{errors.username}</p>
              )}
            </div>

            <div>
              <label className="block text-sm mb-2">Email</label>
              <input
                type="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                className="w-full px-4 py-3 bg-gray-200 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Enter your email"
              />
              {errors.email && (
                <p className="text-red-500 text-xs mt-1">{errors.email}</p>
              )}
            </div>

            <div>
              <label className="block text-sm mb-2">Password</label>
              <input
                type="password"
                name="password"
                value={formData.password}
                onChange={handleChange}
                className="w-full px-4 py-3 bg-gray-200 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Create password"
              />
              {errors.password && (
                <p className="text-red-500 text-xs mt-1">{errors.password}</p>
              )}
            </div>

            <div>
              <label className="block text-sm mb-2">Re - Password</label>
              <input
                type="password"
                name="rePassword"
                value={formData.rePassword}
                onChange={handleChange}
                className="w-full px-4 py-3 bg-gray-200 text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Confirm password"
              />
              {errors.rePassword && (
                <p className="text-red-500 text-xs mt-1">{errors.rePassword}</p>
              )}
            </div>

            <button
              type="submit"
              className="w-full py-3 border-2 border-white rounded-lg font-semibold hover:bg-white hover:text-black transition-colors"
            >
              enter
            </button>

            <p className="text-center text-sm text-gray-400 mt-4">
              Already have an account?{' '}
              <Link to="/signin" className="text-blue-400 hover:underline">
                Sign in here
              </Link>
            </p>
          </form>
        </div>
      </main>

      {/* Footer */}
      <footer className="bg-white text-black px-6 py-8 mt-12">
        <div className="max-w-4xl mx-auto">
          {/* Footer Info */}
          <div className="mb-6">
            <div className="flex items-center gap-2 mb-3">
              <img src="/assets/logoitem.svg" alt="MoveWell" className="w-8 h-8" />
              <h1 className="text-xl font-bold">MoveWell</h1>
            </div>
            <p className="text-xs text-gray-700 leading-relaxed max-w-md">
              You don't have to be perfect to start, you just have to start. 
              Consistency beats motivation every time, and MoveWell is here to 
              keep you moving.
            </p>
          </div>

          {/* Footer Bottom */}
          <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-300 gap-4">
            <p className="text-xs">
              created by <span className="font-bold">Kelompok 2 - LKMO</span>
            </p>
            <div className="flex items-center gap-3">
              <p className="text-xs">Follow us:</p>
              <div className="flex gap-2">
                <a href="#" className="hover:opacity-70 transition-opacity">
                  <img src="/assets/icon_ig.svg" alt="Instagram" className="w-5 h-5" />
                </a>
                <a href="#" className="hover:opacity-70 transition-opacity">
                  <img src="/assets/icon_fb.svg" alt="Facebook" className="w-5 h-5" />
                </a>
                <a href="#" className="hover:opacity-70 transition-opacity">
                  <img src="/assets/icon_tiktok.svg" alt="TikTok" className="w-5 h-5" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}