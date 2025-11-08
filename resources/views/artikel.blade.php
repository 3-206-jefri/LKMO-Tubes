@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="min-h-screen flex justify-center">
        <div class="w-full max-w-md px-4 py-4">
        <!-- Title Section -->
        <div class="mb-4">
            <h1 class="text-xl font-bold mb-1 text-orange-500">Track Your Daily Activity 🔥</h1>
            <p class="text-gray-400 text-xs">Check Your Daily Fitness Activities And Maintain Your Health.</p>
        </div>

        <!-- Quick Access Cards -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <!-- Calories Card -->
            @if($calorieProfile)
            <a href="{{ route('calories.history') }}" class="bg-gray-950 rounded-xl p-3 hover:bg-gray-700 transition-all">
                <h3 class="text-xs font-semibold mb-2 text-white">Calories</h3>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">Consumed</p>
                        <p class="text-sm font-bold text-white">{{ number_format($todayCalories ?? 0, 0) }} Cal</p>
                        <p class="text-xs text-gray-400 mt-1">Remaining</p>
                        <p class="text-lg font-bold text-orange-500">{{ number_format(max(0, $remainingCalories ?? 0), 0) }} Cal</p>
                    </div>
                    <div class="w-16 h-16 rounded-full border-4 border-orange-500 flex items-center justify-center flex-shrink-0">
                        <span class="text-2xl">🔥</span>
                    </div>
                </div>
            </a>
            @else
            <a href="{{ route('calories.index') }}" class="bg-gray-950 rounded-xl p-3 hover:bg-gray-700 transition-all">
                <h3 class="text-xs font-semibold mb-2 text-white">Calories</h3>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-orange-500">Calculate your daily calories</p>
                    </div>
                    <div class="w-16 h-16 rounded-full border-4 border-orange-500 flex items-center justify-center flex-shrink-0">
                        <span class="text-2xl">🔥</span>
                    </div>
                </div>
            </a>
            @endif

            <!-- Daily Remainder Card -->
            @if($nextWorkout)
            <a href="{{ route('workouts.edit', $nextWorkout) }}" class="bg-gray-950 rounded-xl p-3 hover:bg-gray-700 transition-all">
                <h3 class="text-xs font-semibold mb-2 text-white">Daily Remainder</h3>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-orange-500">🏃 Today's Workout:</p>
                        <p class="text-sm font-semibold text-white">{{ $nextWorkout->activity_type }}</p>
                        <p class="text-lg font-bold text-white mt-1">{{ $nextWorkout->scheduled_at->format('H:i') }}</p>
                        <p class="text-xs text-gray-400 mt-1">Click Here For More</p>
                    </div>
                    <span class="text-4xl flex-shrink-0">💪</span>
                </div>
            </a>
            @else
            <a href="{{ route('workouts.create') }}" class="bg-gray-950 rounded-xl p-3 hover:bg-gray-700 transition-all">
                <h3 class="text-xs font-semibold mb-2 text-white">Daily Remainder</h3>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">No workout scheduled</p>
                        <p class="text-sm font-semibold text-orange-500 mt-1">Create One</p>
                    </div>
                    <span class="text-4xl flex-shrink-0">📅</span>
                </div>
            </a>
            @endif
        </div>

        <!-- Articles Section -->
        <div>
            <h2 class="text-base font-bold mb-1 text-orange-500">Article - "Feed Your Mind, Move Your Body"</h2>
            
            <div class="space-y-3 mt-4">
                <!-- Article 1 - Glucose -->
                <div class="bg-gray-950 rounded-xl overflow-hidden">
                    <button onclick="toggleArticle('article1')" class="w-full text-left hover:bg-gray-700 transition-all">
                        <div class="relative h-32">
                            <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=800&q=80" 
                                 alt="Glucose" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h2 class="text-4xl font-bold text-white opacity-90" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Glucose</h2>
                            </div>
                        </div>
                        <div class="p-3">
                            <h3 class="text-sm font-semibold mb-1 text-white">Memahami Glukosa Darah</h3>
                            <p class="text-gray-400 text-xs">Tips ini dapat ada pertahannya pada batas aman anda.</p>
                        </div>
                    </button>
                    <div id="article1" class="hidden p-3 pt-0 border-t border-gray-700">
                        <div class="text-xs text-gray-300 space-y-2 mt-3">
                            <p>Glukosa darah adalah sumber energi utama tubuh Anda. Memahami bagaimana glukosa bekerja dalam tubuh sangat penting untuk menjaga kesehatan metabolik.</p>
                            <p class="font-semibold text-orange-500">Tips Menjaga Glukosa Darah:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Konsumsi makanan dengan indeks glikemik rendah</li>
                                <li>Olahraga teratur 30 menit per hari</li>
                                <li>Hindari makanan tinggi gula olahan</li>
                                <li>Makan dengan porsi teratur</li>
                                <li>Cek kadar gula darah secara berkala</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Article 2 - Heart -->
                <div class="bg-gray-950 rounded-xl overflow-hidden">
                    <button onclick="toggleArticle('article2')" class="w-full text-left hover:bg-gray-700 transition-all">
                        <div class="relative h-32">
                            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" 
                                 alt="Heart" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                        </div>
                        <div class="p-3">
                            <h3 class="text-sm font-semibold mb-1 text-white">Pelajari Kebugaran Jantung</h3>
                            <p class="text-gray-400 text-xs">Bagaimana cara meningkatnya, manfaat jantung, dan cara meningkat kesehatan.</p>
                        </div>
                    </button>
                    <div id="article2" class="hidden p-3 pt-0 border-t border-gray-700">
                        <div class="text-xs text-gray-300 space-y-2 mt-3">
                            <p>Kebugaran jantung atau kardiovaskular mengukur seberapa efisien jantung memompa darah ke seluruh tubuh. Jantung yang sehat adalah kunci umur panjang.</p>
                            <p class="font-semibold text-orange-500">Cara Meningkatkan Kebugaran Jantung:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Lakukan cardio 150 menit per minggu</li>
                                <li>Latihan interval intensitas tinggi (HIIT)</li>
                                <li>Jalan cepat atau jogging rutin</li>
                                <li>Berenang atau bersepeda</li>
                                <li>Kurangi stres dan cukup tidur</li>
                            </ul>
                            <p class="font-semibold text-orange-500 mt-2">Manfaat:</p>
                            <p class="text-gray-400">Menurunkan risiko penyakit jantung, meningkatkan stamina, mengontrol berat badan, dan meningkatkan kualitas hidup.</p>
                        </div>
                    </div>
                </div>

                <!-- Article 3 - Fitness -->
                <div class="bg-gray-950 rounded-xl overflow-hidden">
                    <button onclick="toggleArticle('article3')" class="w-full text-left hover:bg-gray-700 transition-all">
                        <div class="relative h-32">
                            <img src="https://images.unsplash.com/photo-1476480862126-209bfaa8edc8?w=800&q=80" 
                                 alt="Fitness" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                        </div>
                        <div class="p-3">
                            <h3 class="text-sm font-semibold mb-1 text-white">Latihan yang Dapat Meningkatkan Stabilitas Berjalan Kaki</h3>
                            <p class="text-gray-400 text-xs">Kenapa stabilitas penting bagi kesehatan dan apa yang dapat anda lakukan untuk melatih stabilitas.</p>
                        </div>
                    </button>
                    <div id="article3" class="hidden p-3 pt-0 border-t border-gray-700">
                        <div class="text-xs text-gray-300 space-y-2 mt-3">
                            <p>Stabilitas berjalan sangat penting untuk mencegah jatuh dan cedera, terutama seiring bertambahnya usia. Keseimbangan yang baik meningkatkan mobilitas dan kemandirian.</p>
                            <p class="font-semibold text-orange-500">Latihan Meningkatkan Stabilitas:</p>
                            <ul class="list-disc list-inside space-y-1 text-gray-400">
                                <li>Single leg stand - berdiri satu kaki 30 detik</li>
                                <li>Heel-to-toe walk - jalan tumit ke jari kaki</li>
                                <li>Balance board exercises</li>
                                <li>Latihan core strengthening</li>
                                <li>Yoga atau tai chi</li>
                                <li>Squat dan lunges dengan proper form</li>
                            </ul>
                            <p class="font-semibold text-orange-500 mt-2">Manfaat Stabilitas:</p>
                            <p class="text-gray-400">Mengurangi risiko jatuh, meningkatkan postur tubuh, memperkuat otot inti, dan meningkatkan kepercayaan diri dalam bergerak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
        function toggleArticle(articleId) {
            const article = document.getElementById(articleId);
            article.classList.toggle('hidden');
        }
    </script>

@endsection