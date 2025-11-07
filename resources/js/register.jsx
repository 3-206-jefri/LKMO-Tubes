import React from 'react'
import ReactDOM from 'react-dom/client'

function SignUp() {
  return (
    <div className="min-h-screen bg-black text-white flex flex-col">
      {/* Header */}
      <header className="px-6 py-4">
        <a href="/" className="flex items-center gap-2 w-fit">
          <h1 className="text-xl font-bold">MoveWell</h1>
        </a>
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

          <div className="auth-card">
            <form method="POST" action="{{ route('register') }}" className="space-y-6">
              @csrf

              <div className="form-group">
                <label htmlFor="username" className="form-label">Username</label>
                <input
                  id="username"
                  type="text"
                  className="form-control @error('username') is-invalid @enderror"
                  name="username"
                  value="{{ old('username') }}"
                  required
                  autoFocus
                />
                @error('username')
                  <span className="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div className="form-group">
                <label htmlFor="email" className="form-label">Email Address</label>
                <input
                  id="email"
                  type="email"
                  className="form-control @error('email') is-invalid @enderror"
                  name="email"
                  value="{{ old('email') }}"
                  required
                />
                @error('email')
                  <span className="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div className="form-group">
                <label htmlFor="password" className="form-label">Password</label>
                <input
                  id="password"
                  type="password"
                  className="form-control @error('password') is-invalid @enderror"
                  name="password"
                  required
                />
                @error('password')
                  <span className="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div className="form-group">
                <label htmlFor="password_confirmation" className="form-label">Confirm Password</label>
                <input
                  id="password_confirmation"
                  type="password"
                  className="form-control"
                  name="password_confirmation"
                  required
                />
              </div>

              <button type="submit" className="btn-primary">Register</button>

              <div className="auth-footer">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
              </div>
            </form>
          </div>
        </div>
      </main>

      {/* Footer */}
      <footer className="bg-white text-black px-6 py-8 mt-12">
        <div className="max-w-4xl mx-auto">
          <div className="mb-6">
            <div className="flex items-center gap-2 mb-3">
              <h1 className="text-xl font-bold">MoveWell</h1>
            </div>
            <p className="text-xs text-gray-700 leading-relaxed max-w-md">
              You don't have to be perfect to start, you just have to start. 
              Consistency beats motivation every time, and MoveWell is here to 
              keep you moving.
            </p>
          </div>

          <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-300 gap-4">
            <p className="text-xs">
              created by <span className="font-bold">Kelompok 2 - LKMO</span>
            </p>
            <div className="flex items-center gap-3">
              <p className="text-xs">Follow us:</p>
              <div className="flex gap-2">
                <a href="#" className="hover:opacity-70 transition-opacity">
                  📱
                </a>
                <a href="#" className="hover:opacity-70 transition-opacity">
                  f
                </a>
                <a href="#" className="hover:opacity-70 transition-opacity">
                  🎵
                </a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}

// Mount React component
const el = document.getElementById('react-app')
if (el) {
  ReactDOM.createRoot(el).render(<SignUp />)
}