<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkoutScheduleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CalorieCalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Profile
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
});

// Workout Schedules
Route::prefix('workouts')->name('workouts.')->group(function () {
    Route::get('/create', [WorkoutScheduleController::class, 'create'])->name('create');
    Route::post('/', [WorkoutScheduleController::class, 'store'])->name('store');
    Route::get('/{schedule}/edit', [WorkoutScheduleController::class, 'edit'])->name('edit');
    Route::put('/{schedule}', [WorkoutScheduleController::class, 'update'])->name('update');
    Route::delete('/{schedule}', [WorkoutScheduleController::class, 'destroy'])->name('destroy');
    Route::post('/{schedule}/complete', [WorkoutScheduleController::class, 'complete'])->name('complete');
});

// History
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

Route::get('/artikel', [DashboardController::class, 'artikel'])->name('artikel');

// Profile
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('update');
});

// Calories Calculator
Route::prefix('calories')->name('calories.')->group(function () {
    Route::get('/', [CalorieCalculatorController::class, 'index'])->name('index');
    Route::post('/calculate', [CalorieCalculatorController::class, 'calculate'])->name('calculate');
    Route::get('/result/{profile}', [CalorieCalculatorController::class, 'result'])->name('result');
    Route::get('/history', [CalorieCalculatorController::class, 'history'])->name('history');
    Route::post('/add-food', [CalorieCalculatorController::class, 'addFood'])->name('add-food');
    Route::delete('/food/{foodLog}', [CalorieCalculatorController::class, 'deleteFood'])->name('delete-food');
});

