@extends('layouts.app')

@section('title', 'Dashboard - MoveWell')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Title -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-orange-500 mb-2">Track Your Daily Activity 🔥</h2>
        <p class="text-sm text-gray-400">Check Your Daily Fitness Activities And Maintain Your Health.</p>
    </div>

    <!-- Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    @if($calorieProfile)
    <!-- Calories Card - With Profile -->
    <a href="{{ route('calories.history') }}" class="bg-neutral-900 rounded-2xl p-5 hover:bg-neutral-800 transition">
        <h3 class="text-lg font-semibold mb-3">Calories</h3>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-500 text-sm">Consumed</p>
                <p class="text-2xl font-bold">{{ number_format($todayCalories ?? 0, 0) }} Cal</p>
                <p class="text-gray-400 text-sm mt-2">Remaining</p>
                <p class="text-xl font-semibold">{{ number_format(max(0, $remainingCalories ?? 0), 0) }} Cal</p>
            </div>
            <div class="w-24 h-24 rounded-full border-8 border-orange-500 flex items-center justify-center relative">
                <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </a>
    @else
    <!-- Calories Card - Without Profile (Calculator) -->
    <a href="{{ route('calories.index') }}" class="bg-neutral-900 rounded-2xl p-5 hover:bg-neutral-800 transition">
        <h3 class="text-lg font-semibold mb-3">Calories Calculator</h3>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-500 text-sm">Calculate your daily calories</p>
                <p class="text-2xl font-bold">Click here to start</p>
            </div>
            <div class="w-24 h-24 rounded-full border-8 border-orange-500 flex items-center justify-center relative">
                <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </a>
    @endif

<!-- Daily Remainder Card -->
@if($nextWorkout)
<a href="{{ route('workouts.edit', $nextWorkout) }}" class="block bg-neutral-900 rounded-2xl p-5 hover:bg-neutral-800 transition">
    <h3 class="text-lg font-semibold mb-3">Daily Remainder</h3>
    <div class="flex items-center space-x-2 mb-4">
        <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
        </svg>
        <p class="text-sm">🏃 Today's Workout: {{ $nextWorkout->activity_type }} ({{ $nextWorkout->scheduled_at->format('H:i') }})</p>
    </div>
    <button class="block w-full bg-neutral-800 text-sm py-2 rounded-lg hover:bg-neutral-700 transition text-center">
        Click Here For More
    </button>
</a>
@else
<a href="{{ route('workouts.create') }}" class="block bg-neutral-900 rounded-2xl p-5 hover:bg-neutral-800 transition">
    <h3 class="text-lg font-semibold mb-3">Daily Remainder</h3>
    <div class="flex items-center space-x-2 mb-4">
        <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
        </svg>
        <p class="text-sm">📅 No workout scheduled</p>
    </div>
    <button class="block w-full bg-neutral-800 text-sm py-2 rounded-lg hover:bg-neutral-700 transition text-center">
        Create One
    </button>
</a>
@endif
</div>

    <!-- Article Section -->
    <div class="mb-6">
        <h3 class="text-xl font-bold mb-2">
            <span class="text-orange-500">Article</span> 
            <span class="text-gray-400">- "Fuel Your Mind, Move Your Body"</span>
        </h3>
    </div>

    <!-- Article Cards -->
    <div class="space-y-4">
        <!-- Article 1 -->
        <div class="bg-neutral-900 rounded-2xl overflow-hidden cursor-pointer hover:bg-neutral-800 transition" onclick="toggleArticle('article1')">
            <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=800" alt="Glucose" class="w-full h-48 object-cover">
            <div class="p-5">
                <h4 class="text-lg font-bold mb-2">Memahami Glukosa Darah</h4>
                <p class="text-sm text-gray-400">apa itu dan apa pengaruhnya pada tubuh anda.</p>
            </div>
        </div>

        <!-- Article 1 Detail (Hidden) -->
        <div id="article1" class="hidden bg-neutral-900 rounded-2xl p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-bold">Memahami Glukosa Darah</h3>
                <button onclick="toggleArticle('article1')" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=800" alt="Glucose" class="w-full h-64 object-cover rounded-xl mb-4">
            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300 mb-4">
                    Glukosa darah adalah gula yang ditemukan dalam darah Anda dan merupakan sumber energi utama bagi tubuh. Memahami kadar glukosa darah sangat penting untuk menjaga kesehatan, terutama bagi penderita diabetes.
                </p>
                <h4 class="text-lg font-semibold mb-2">Mengapa Glukosa Penting?</h4>
                <p class="text-gray-300 mb-4">
                    Glukosa memberikan energi untuk sel-sel tubuh, otak, dan organ vital lainnya. Kadar glukosa yang terlalu tinggi atau rendah dapat berdampak buruk pada kesehatan Anda.
                </p>
                <h4 class="text-lg font-semibold mb-2">Kadar Normal:</h4>
                <ul class="text-gray-300 mb-4 list-disc list-inside">
                    <li>Puasa: 70-100 mg/dL</li>
                    <li>2 jam setelah makan: Kurang dari 140 mg/dL</li>
                </ul>
            </div>
        </div>

        <!-- Article 2 -->
        <div class="bg-neutral-900 rounded-2xl overflow-hidden cursor-pointer hover:bg-neutral-800 transition" onclick="toggleArticle('article2')">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800" alt="Cardio" class="w-full h-48 object-cover">
            <div class="p-5">
                <h4 class="text-lg font-bold mb-2">Pelajari Kebugaran Jantung</h4>
                <p class="text-sm text-gray-400">Bagaimana cara mengukurnya, kenapa ini penting, dan cara meningkatkannya</p>
            </div>
        </div>

        <!-- Article 2 Detail (Hidden) -->
        <div id="article2" class="hidden bg-neutral-900 rounded-2xl p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-bold">Pelajari Kebugaran Jantung</h3>
                <button onclick="toggleArticle('article2')" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800" alt="Cardio" class="w-full h-64 object-cover rounded-xl mb-4">
            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300 mb-4">
                    Kebugaran jantung atau kardiovaskular adalah kemampuan jantung dan paru-paru untuk memasok oksigen ke otot selama aktivitas fisik. Ini adalah indikator kesehatan yang sangat penting.
                </p>
                <h4 class="text-lg font-semibold mb-2">Cara Meningkatkan:</h4>
                <ul class="text-gray-300 mb-4 list-disc list-inside">
                    <li>Lari atau jogging minimal 30 menit</li>
                    <li>Bersepeda secara rutin</li>
                    <li>Berenang 2-3 kali seminggu</li>
                    <li>HIIT (High Intensity Interval Training)</li>
                </ul>
                <p class="text-gray-300">
                    Konsistensi adalah kunci untuk meningkatkan kebugaran jantung Anda.
                </p>
            </div>
        </div>

        <!-- Article 3 -->
        <div class="bg-neutral-900 rounded-2xl overflow-hidden cursor-pointer hover:bg-neutral-800 transition" onclick="toggleArticle('article3')">
            <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=800" alt="Walking" class="w-full h-48 object-cover">
            <div class="p-5">
                <h4 class="text-lg font-bold mb-2">Latihan yang Dapat Meningkatkan Stabilitas Berjalan Kaki</h4>
                <p class="text-sm text-gray-400">Kenapa stabilitas berjalan kaki menurun dan apa yang dapat anda lakukan untuk meindakianjutnya</p>
            </div>
        </div>

        <!-- Article 3 Detail (Hidden) -->
        <div id="article3" class="hidden bg-neutral-900 rounded-2xl p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-bold">Latihan Meningkatkan Stabilitas Berjalan</h3>
                <button onclick="toggleArticle('article3')" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=800" alt="Walking" class="w-full h-64 object-cover rounded-xl mb-4">
            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300 mb-4">
                    Stabilitas berjalan kaki sangat penting untuk mencegah cedera dan meningkatkan keseimbangan, terutama seiring bertambahnya usia.
                </p>
                <h4 class="text-lg font-semibold mb-2">Latihan yang Direkomendasikan:</h4>
                <ul class="text-gray-300 mb-4 list-disc list-inside">
                    <li>Single leg stance (berdiri satu kaki)</li>
                    <li>Heel-to-toe walk</li>
                    <li>Balance board exercises</li>
                    <li>Strengthening latihan untuk otot kaki</li>
                </ul>
                <p class="text-gray-300">
                    Lakukan latihan ini secara rutin untuk meningkatkan stabilitas dan mencegah risiko jatuh.
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleArticle(articleId) {
        const article = document.getElementById(articleId);
        const allArticles = document.querySelectorAll('[id^="article"]');
        
        // Hide all articles
        allArticles.forEach(a => {
            if (a.id !== articleId) {
                a.classList.add('hidden');
            }
        });
        
        // Toggle clicked article
        article.classList.toggle('hidden');
        
        // Scroll to article if opening
        if (!article.classList.contains('hidden')) {
            article.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>
@endpush
@endsection