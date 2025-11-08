import React from "react";
import { Link } from 'react-router-dom';
export default function Home() {
  return (
    <div className="min-h-screen bg-black text-white">
      {/* Header */}
      <header className="flex items-center justify-between px-6 py-4 bg-black/80 backdrop-blur-sm fixed top-0 left-0 right-0 z-50">
        <div className="flex items-center gap-2">
          <img src="/assets/logo.svg" alt="MoveWell" className="w-8 h-8" />
          <h1 className="text-xl font-bold">MoveWell</h1>
        </div>
        <nav className="flex gap-3">
          <Link to="/signin">
          <button className="px-4 py-1.5 text-sm border border-white rounded-md hover:bg-white hover:text-black transition-colors">
            Sign in
          </button>
          </Link>
          <Link to="/signup" >
          <button className="px-4 py-1.5 text-sm bg-white text-black rounded-md hover:bg-gray-200 transition-colors">
            Sign up
          </button>
          </Link>
        </nav>
      </header>

      {/* Hero Section */}
      <section className="relative h-[60vh] mt-16 overflow-hidden">
        <img 
          src="/assets/BG_.svg" 
          alt="Workout" 
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black"></div>
        
        <div className="absolute inset-0 flex flex-col justify-center px-6">
          <h1 className="text-4xl md:text-5xl font-bold leading-tight mb-4">
            LEVEL UP<br />YOUR LIFESTYLE
          </h1>
          <p className="text-sm md:text-base text-gray-300 max-w-md">
            Fitness is not about being better than someone else, it's about being better than you were yesterday.
          </p>
        </div>
      </section>

      {/* Features Section */}
      <section className="px-6 py-12 bg-black">
        <h2 className="text-2xl md:text-3xl font-bold text-center mb-2">
          KNOW WHAT YOU NEED
        </h2>
        <p className="text-center text-gray-400 mb-2">
          WE ARE READY TO HELP YOU
        </p>
        <p className="text-center text-sm text-gray-500 italic mb-10">
          "We provide several flagship features that you can try"
        </p>

        <div className="grid grid-cols-2 gap-6 max-w-md mx-auto">
          <div className="flex flex-col items-center text-center">
            <img 
              src="/assets/Schedule.svg" 
              alt="Workout Scheduling" 
              className="w-16 h-16 mb-3"
            />
            <p className="text-sm text-gray-300">Workout Scheduling</p>
          </div>
          <div className="flex flex-col items-center text-center">
            <img 
              src="/assets/CaloriesIntake.svg" 
              alt="Calories Intake" 
              className="w-16 h-16 mb-3"
            />
            <p className="text-sm text-gray-300">Calories Intake</p>
          </div>
          <div className="flex flex-col items-center text-center">
            <img 
              src="/assets/WorkOutGuide.svg" 
              alt="Workout Guides" 
              className="w-16 h-16 mb-3"
            />
            <p className="text-sm text-gray-300">Workout Guides</p>
          </div>
          <div className="flex flex-col items-center text-center">
            <img 
              src="/assets/HealthyMeal.svg" 
              alt="Healthy Meal Ideas" 
              className="w-16 h-16 mb-3"
            />
            <p className="text-sm text-gray-300">Healthy Meal Ideas</p>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="px-6 py-16 bg-black text-center">
        <h2 className="text-2xl md:text-3xl font-bold mb-3">
          READY TO ACHIEVE YOUR GOALS?
        </h2>
        <p className="text-sm text-gray-400 mb-6 max-w-md mx-auto">
          We're here to help you live healthier and get the life you've always wanted.
        </p>
        <Link to="/signup">
        <button className="px-8 py-3 bg-white text-black font-semibold rounded-md hover:bg-gray-200 transition-colors">
          Join us now
        </button>
        </Link>
        
      </section>

      {/* Footer */}
      <footer className="px-6 py-8 bg-white text-black">
        <div className="max-w-md mx-auto">
          <div className="mb-6">
            <div className="flex items-center gap-2 mb-3">
              <img src="/assets/logoitem.svg" alt="MoveWell" className="w-8 h-8" />
              <h1 className="text-xl font-bold">MoveWell</h1>
            </div>
            <p className="text-xs text-gray-700 leading-relaxed">
              You don't have to be perfect to start, you just have to start. 
              Consistency beats motivation every time, and MoveWell is here to 
              keep you moving.
            </p>
          </div>

          <div className="flex items-center justify-between pt-4 border-t border-gray-300">
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