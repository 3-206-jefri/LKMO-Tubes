<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        
        $schedules = $user->workoutSchedules()
            ->pending()
            ->orderBy('scheduled_at', 'asc')
            ->paginate(10);
        
        $totalWorkouts = $user->workoutSchedules()->count();
        $completedWorkouts = $user->workoutSchedules()->completed()->count();
        $pendingWorkouts = $user->workoutSchedules()->pending()->count();
        
        // Calorie data
        $calorieProfile = $user->calorieProfile;
        $todayCalories = $user->today_calories;
        $remainingCalories = $user->remaining_calories;
        
        // Next workout
        $nextWorkout = $user->workoutSchedules()
            ->pending()
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at', 'asc')
            ->first();
        
        return view('dashboard', compact(
            'schedules',
            'totalWorkouts',
            'completedWorkouts',
            'pendingWorkouts',
            'calorieProfile',
            'todayCalories',
            'remainingCalories',
            'nextWorkout'
        ));
    }
}