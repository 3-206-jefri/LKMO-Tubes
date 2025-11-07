<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MoveWell')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }

        .alert-success {
            background: #10b981;
            color: white;
        }

        .alert-danger {
            background: #ef4444;
            color: white;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-black text-white min-h-screen">
    @auth
    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-80 bg-neutral-900 z-50 transform -translate-x-full transition-transform duration-300 overflow-y-auto">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center space-x-2 mb-8">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <h1 class="text-2xl font-bold">MoveWell</h1>
            </div>

            <!-- Profile Section -->
            <div class="flex flex-col items-center mb-8 pb-8 border-b border-gray-700">
                <div class="w-24 h-24 bg-gray-400 rounded-full mb-3 overflow-hidden">
                    @if(auth()->user()->profile_photo_url)
                        <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile" class="w-full h-full object-cover">
                    @endif
                </div>
                <p class="font-semibold">{{ auth()->user()->username ?? auth()->user()->name }}</p>
                <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
            </div>

            <!-- Menu Items -->
            <nav class="space-y-4">
                <a href="{{ route('artikel') }}" class="flex items-center space-x-3 p-3 hover:bg-neutral-800 rounded-lg transition {{ request()->routeIs('artikel') ? 'bg-neutral-800' : '' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 hover:bg-neutral-800 rounded-lg transition {{ request()->routeIs('dashboard.*') ? 'bg-neutral-800' : '' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Scheduling</span>
                </a>

                <a href="{{ route('history.index') }}" class="flex items-center space-x-3 p-3 hover:bg-neutral-800 rounded-lg transition {{ request()->routeIs('history.*') ? 'bg-neutral-800' : '' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span>Exercise Guide</span>
                </a>

                <a href="{{ route('calories.index') }}" class="flex items-center space-x-3 p-3 hover:bg-neutral-800 rounded-lg transition {{ request()->routeIs('calories.*') ? 'bg-neutral-800' : '' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span>Calories Calculator</span>
                </a>

                <a href="#" class="flex items-center space-x-3 p-3 hover:bg-neutral-800 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span>Meal Plan</span>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 p-3 hover:bg-red-900 rounded-lg transition text-orange-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            </nav>
        </div>
    </div>

    <!-- Header -->
    <header class="flex items-center justify-between p-4 bg-neutral-900">
        <button onclick="toggleSidebar()" class="p-2 hover:bg-neutral-800 rounded-lg transition">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <div class="flex items-center space-x-2 cursor-pointer hover:bg-neutral-800 px-3 py-2 rounded-lg transition" onclick="window.location.href='{{ route('profile.show') }}'">
            <div class="w-10 h-10 bg-gray-400 rounded-full overflow-hidden">
                @if(auth()->user()->profile_photo_url)
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile" class="w-full h-full object-cover">
                @endif
            </div>
            <div>
                <p class="text-sm font-semibold">{{ auth()->user()->username ?? auth()->user()->name }}</p>
                <p class="text-xs text-gray-400">{{ auth()->user()->gender ?? 'User' }}</p>
            </div>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </header>
    @endauth

    <!-- Main Content -->
    <div class="container max-w-7xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when clicking outside
        window.onclick = function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (event.target === overlay) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>

    @stack('scripts')
</body>
</html>