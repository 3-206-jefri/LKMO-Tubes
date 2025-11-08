import React, { useState, useEffect } from 'react';
import { Link, useNavigate } from 'react-router-dom';

export default function SignInPage() {
  const navigate = useNavigate();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  // Check if user already logged in
  useEffect(() => {
    const userData = localStorage.getItem('user');
    if (userData) {
      const user = JSON.parse(userData);
      if (user.isLoggedIn) {
        navigate('/dashboard');
      }
    }
  }, [navigate]);

  const handleSubmit = (e) => {
    e.preventDefault();
    setError('');

    // Validation
    if (!email || !password) {
      setError('Please fill in all fields');
      return;
    }

    // Get user data from localStorage
    const userData = localStorage.getItem('user');
    
    if (!userData) {
      setError('No account found. Please sign up first.');
      return;
    }

    const user = JSON.parse(userData);

    // Check credentials
    if (user.email === email && user.password === password) {
      // Update login status
      user.isLoggedIn = true;
      localStorage.setItem('user', JSON.stringify(user));
      
      // Navigate to dashboard
      navigate('/dashboard');
    } else {
      setError('Invalid email or password');
    }
  };

  return (
    <div className="min-h-screen bg-black text-white flex flex-col">
      {/* Header */}
      <header className="px-6 py-6">
        <Link to="/" className="flex items-center gap-2 w-fit">
          <img src="/assets/logo.svg" alt="MoveWell" className="w-8 h-8" />
          <h1 className="text-xl font-bold">MoveWell</h1>
        </Link>
      </header>

      {/* Main Content */}
      <main className="flex-1 px-6 py-8 flex flex-col">
        {/* Welcome Text */}
        <div className="mb-12">
          <h2 className="text-2xl font-bold mb-4">Welcome back to your account</h2>
          <p className="text-sm text-gray-400 leading-relaxed">
            Please log in to access your account and manage your details securely.
          </p>
          <p className="text-sm text-gray-400 leading-relaxed mt-2">
            Enter your email and password below to proceed. If you do not have an account, you can{' '}
            <Link to="/signup" className="text-blue-400 hover:underline">
              sign up now
            </Link>.
          </p>
        </div>

        {/* Sign In Form */}
        <div className="flex-1 flex flex-col justify-center max-w-sm mx-auto w-full">
          <div className="text-center mb-8">
            <h3 className="text-xl font-bold mb-1">
              SIGN IN TO <span className="text-white">YOUR ACCOUNT</span>
            </h3>
            <p className="text-xs text-gray-400 tracking-widest">USE YOUR CREDENTIALS</p>
          </div>

          {/* Error Message */}
          {error && (
            <div className="mb-4 p-3 bg-red-500/10 border border-red-500 rounded-lg">
              <p className="text-red-500 text-sm text-center">{error}</p>
            </div>
          )}

          <form onSubmit={handleSubmit} className="space-y-6">
            {/* Email Input */}
            <div>
              <label htmlFor="email" className="block text-sm mb-2">Email</label>
              <input
                type="email"
                id="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                className="w-full px-4 py-3 rounded-lg bg-gray-200 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Enter your email"
              />
            </div>

            {/* Password Input */}
            <div>
              <label htmlFor="password" className="block text-sm mb-2">Password</label>
              <input
                type="password"
                id="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                className="w-full px-4 py-3 rounded-lg bg-gray-200 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white"
                placeholder="Enter your password"
                onKeyPress={(e) => e.key === 'Enter' && handleSubmit(e)}
              />
            </div>

            <button
              type="submit"
              className="w-full py-3 border-2 border-white rounded-lg text-white font-medium hover:bg-white hover:text-black transition-colors"
            >
              enter
            </button>

            <p className="text-center text-sm text-gray-400 mt-4">
              Don't have an account?{' '}
              <Link to="/signup" className="text-blue-400 hover:underline">
                Sign up here
              </Link>
            </p>
          </form>
        </div>
      </main>

      {/* Footer */}
      <footer className="bg-white text-black px-6 py-6">
        <div className="max-w-sm mx-auto">
          <div className="flex items-start gap-3 mb-4">
            <img src="/assets/logoitem.svg" alt="MoveWell" className="w-8 h-8 mt-1" />
            <div>
              <h3 className="font-bold text-lg mb-1">MoveWell</h3>
              <p className="text-xs leading-relaxed text-gray-700">
                You don't have to be perfect to start, you just have to start. Consistency beats motivation every time, and MoveWell is here to make you moving.
              </p>
            </div>
          </div>

          <div className="flex items-center justify-between pt-4 border-t border-gray-300">
            <p className="text-xs">
              created by <span className="font-bold">Kelompok 2 - LKMO</span>
            </p>
            <div className="flex items-center gap-2">
              <p className="text-xs">Follow us:</p>
              <div className="flex gap-2">
                <a href="#" className="hover:opacity-70 transition-opacity">
                  <img src="/assets/icon_fb.svg" alt="Facebook" className="w-5 h-5" />
                </a>
                <a href="#" className="hover:opacity-70 transition-opacity">
                  <img src="/assets/icon_ig.svg" alt="Instagram" className="w-5 h-5" />
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