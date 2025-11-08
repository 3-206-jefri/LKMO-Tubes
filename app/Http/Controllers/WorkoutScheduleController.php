<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSchedule;
use Illuminate\Http\Request;

class WorkoutScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('workouts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_type' => 'required|string|max:255',
            'target_goal' => 'required|string|max:255',
            'scheduled_at' => 'required|date|after:now',
        ]);

        auth()->user()->workoutSchedules()->create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Workout schedule created successfully!');
    }

    public function edit(WorkoutSchedule $schedule)
    {
        if ($schedule->user_id !== auth()->id()) {
            abort(403);
        }

        return view('workouts.edit', compact('schedule'));
    }

    public function update(Request $request, WorkoutSchedule $schedule)
    {
        if ($schedule->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'activity_type' => 'required|string|max:255',
            'target_goal' => 'required|string|max:255',
            'scheduled_at' => 'required|date|after:now',
        ]);

        $schedule->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Workout schedule updated successfully!');
    }

    public function destroy(WorkoutSchedule $schedule)
    {
        if ($schedule->user_id !== auth()->id()) {
            abort(403);
        }

        $schedule->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Workout schedule deleted successfully!');
    }

    public function complete(WorkoutSchedule $schedule)
    {
        if ($schedule->user_id !== auth()->id()) {
            abort(403);
        }

        $schedule->markAsCompleted();

        return redirect()->route('dashboard')
            ->with('success', 'Workout completed! Great job! 💪');
    }
}