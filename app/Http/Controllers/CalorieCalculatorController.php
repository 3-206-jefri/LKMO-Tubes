<?php

namespace App\Http\Controllers;

use App\Models\CalorieProfile;
use App\Models\FoodLog;
use Illuminate\Http\Request;

class CalorieCalculatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = auth()->user()->calorieProfile;
        return view('calories.index', compact('profile'));
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|integer|min:10|max:120',
            'gender' => 'required|in:male,female',
            'height' => 'required|numeric|min:50|max:300',
            'weight' => 'required|numeric|min:20|max:500',
            'activity_level' => 'required|in:sedentary,light,moderate,very_active,extra_active',
        ]);

        $bmr = CalorieProfile::calculateBMR(
            $validated['gender'],
            $validated['weight'],
            $validated['height'],
            $validated['age']
        );

        $tdee = CalorieProfile::calculateTDEE($bmr, $validated['activity_level']);

        $profile = CalorieProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            array_merge($validated, [
                'bmr' => round($bmr, 2),
                'tdee' => round($tdee, 2),
            ])
        );

        return redirect()->route('calories.result', $profile->id)
            ->with('success', 'Calorie calculation completed!');
    }

    public function result(CalorieProfile $profile)
    {
        // Ensure user can only see their own profile
        if ($profile->user_id !== auth()->id()) {
            abort(403);
        }

        return view('calories.result', compact('profile'));
    }

    public function history()
    {
        $histories = auth()->user()->foodLogs()
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->paginate(20);

        $todayTotal = auth()->user()->today_calories;
        $profile = auth()->user()->calorieProfile;

        return view('calories.history', compact('histories', 'todayTotal', 'profile'));
    }

    public function addFood(Request $request)
    {
        $validated = $request->validate([
            'food_name' => 'required|string|max:255',
            'calories' => 'required|numeric|min:0|max:10000',
            'date' => 'nullable|date',
            'time' => 'nullable',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['date'] = $validated['date'] ?? now()->format('Y-m-d');
        $validated['time'] = $validated['time'] ?? now()->format('H:i');

        auth()->user()->foodLogs()->create($validated);

        return redirect()->route('calories.history')
            ->with('success', 'Food added successfully!');
    }

    public function deleteFood(FoodLog $foodLog)
    {
        if ($foodLog->user_id !== auth()->id()) {
            abort(403);
        }

        $foodLog->delete();

        return redirect()->route('calories.history')
            ->with('success', 'Food deleted successfully!');
    }
}