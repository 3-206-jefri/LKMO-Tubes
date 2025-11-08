<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoveWell - Level Up Your Lifestyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-1.5">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7"/>
                </svg>
                <span class="text-lg font-bold">MoveWell</span>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('login') }}" class="px-3 py-1.5 text-sm border border-white rounded-full hover:bg-white hover:text-black transition duration-300">Sign In</a>
                <a href="{{ route('register') }}" class="px-3 py-1.5 text-sm bg-white text-black rounded-full hover:bg-gray-200 transition duration-300 font-semibold">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black z-10"></div>
        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" 
             alt="Fitness" 
             class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="relative z-20 text-center px-4 max-w-lg pt-16">
            <h1 class="text-4xl md:text-5xl font-black mb-6 leading-tight">
                LEVEL UP<br>
                YOUR LIFESTYLE
            </h1>
            <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                Fitness is not about being better than someone else. It's about being better than you were yesterday.
            </p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 px-4 bg-black">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black mb-3">KNOW WHAT YOU NEED</h2>
                <p class="text-sm md:text-base text-gray-400 uppercase tracking-wider">We are ready to help you</p>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                <!-- Feature 1 -->
                <div class="text-center group cursor-pointer">
                    <div class="mb-3 flex justify-center transform group-hover:scale-110 transition duration-300">
                        <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="text-sm md:text-base font-bold mb-2">Flexible Schedule</h3>
                    <p class="text-xs text-gray-400 italic hidden md:block">We provide several flagship features that you can try</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center group cursor-pointer">
                    <div class="mb-3 flex justify-center transform group-hover:scale-110 transition duration-300">
                        <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                        </svg>
                    </div>
                    <h3 class="text-sm md:text-base font-bold mb-2">Online Classes</h3>
                    <p class="text-xs text-gray-400 italic hidden md:block">We provide several flagship features that you can try</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center group cursor-pointer">
                    <div class="mb-3 flex justify-center transform group-hover:scale-110 transition duration-300">
                        <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="text-sm md:text-base font-bold mb-2">All Levels</h3>
                    <p class="text-xs text-gray-400 italic hidden md:block">We provide several flagship features that you can try</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center group cursor-pointer">
                    <div class="mb-3 flex justify-center transform group-hover:scale-110 transition duration-300">
                        <svg class="w-12 h-12 md:w-16 md:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="text-sm md:text-base font-bold mb-2">Expert Trainers</h3>
                    <p class="text-xs text-gray-400 italic hidden md:block">We provide several flagship features that you can try</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-black">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-black mb-4">READY TO ACHIEVE YOUR GOALS?</h2>
            <p class="text-sm md:text-base text-gray-400 mb-8 max-w-xl mx-auto">
                We're here to help you live healthier and get the life you've always wanted.
            </p>
            <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition duration-300 text-sm md:text-base uppercase tracking-wider">
                Join Us Now
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-black py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7"/>
                        </svg>
                        <span class="text-xl font-bold">MoveWell</span>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Let's take a journey with us to live healthier and achieve the dreams you have wanted for a long time, we are here to help you.
                    </p>
                </div>
                
                <div class="flex justify-start md:justify-end items-center space-x-5">
                    <span class="text-gray-600 cursor-pointer hover:text-black transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </span>
                    <span class="text-gray-600 cursor-pointer hover:text-black transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </span>
                    <span class="text-gray-600 cursor-pointer hover:text-black transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </span>
                </div>
            </div>
            
            <div class="border-t border-gray-300 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-600 space-y-3 sm:space-y-0">
                <p>&copy; Copyright 2025</p>
                <div class="flex space-x-6">
                    <span class="cursor-pointer hover:text-black transition">Terms</span>
                    <span class="cursor-pointer hover:text-black transition">Privacy</span>
                    <span class="cursor-pointer hover:text-black transition">FAQ</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>