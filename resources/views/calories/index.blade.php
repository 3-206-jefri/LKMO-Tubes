@extends('layouts.app')

@section('title', 'Calories Calculator')

@push('styles')
<style>
    .calories-container {
        max-width: 600px;
        margin: 2rem auto;
    }

    .calories-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .calories-title {
        font-size: 2.5rem;
        color: #ff6b35;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .calories-subtitle {
        color: white;
        font-size: 1.1rem;
    }

    .tab-container {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 0.5rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
        margin-bottom: 2rem;
    }

    .tab-btn {
        padding: 0.75rem;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .tab-btn.active {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .calculator-card {
        background: #1a1a1a;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: white;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        color: white;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #ff6b35;
        background: rgba(255, 255, 255, 0.08);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    select.form-control {
        cursor: pointer;
    }

    select.form-control option {
        background: #2a2a2a;
    }

    .input-with-unit {
        position: relative;
    }

    .input-unit {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
    }

    .btn-calculate {
        width: 100%;
        padding: 1.2rem;
        background: #7ed321;
        border: none;
        color: #000;
        font-size: 1.2rem;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-calculate:hover {
        background: #6ec019;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(126, 211, 33, 0.4);
    }

    .activity-notes {
        background: rgba(255, 107, 53, 0.1);
        border-left: 4px solid #ff6b35;
        padding: 1rem;
        border-radius: 5px;
        margin-top: 1.5rem;
    }

    .activity-notes h4 {
        color: #ff6b35;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .activity-notes ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .activity-notes li {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
        padding-left: 1rem;
        position: relative;
    }

    .activity-notes li:before {
        content: "•";
        position: absolute;
        left: 0;
        color: #ff6b35;
    }

    @media (max-width: 600px) {
        .calories-container {
            padding: 0 1rem;
        }

        .calculator-card {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="calories-container">
    <div class="calories-header">
        <h1 class="calories-title">Calories Calculator</h1>
        <p class="calories-subtitle">"By Meeting BMR, The Body Can Grow And Function Properly"</p>
    </div>

    <div class="tab-container">
        <button class="tab-btn active" onclick="window.location='{{ route('calories.index') }}'">Calculator</button>
        <button class="tab-btn" onclick="window.location='{{ route('calories.history') }}'">History</button>
    </div>

    <div class="calculator-card">
        <form action="{{ route('calories.calculate') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="age" class="form-label">Age</label>
                <input type="number" id="age" name="age" class="form-control" 
                       value="{{ old('age', $profile->age ?? auth()->user()->age) }}" 
                       placeholder="20" required min="10" max="120">
            </div>

            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $profile->gender ?? auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $profile->gender ?? auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="height" class="form-label">Height</label>
                <div class="input-with-unit">
                    <input type="number" step="0.01" id="height" name="height" class="form-control" 
                           value="{{ old('height', $profile->height ?? auth()->user()->height) }}" 
                           placeholder="180" required min="50" max="300">
                    <span class="input-unit">cm</span>
                </div>
            </div>

            <div class="form-group">
                <label for="weight" class="form-label">Weight</label>
                <div class="input-with-unit">
                    <input type="number" step="0.01" id="weight" name="weight" class="form-control" 
                           value="{{ old('weight', $profile->weight ?? auth()->user()->weight) }}" 
                           placeholder="60" required min="20" max="500">
                    <span class="input-unit">kg</span>
                </div>
            </div>

            <div class="form-group">
                <label for="activity_level" class="form-label">Activity</label>
                <select id="activity_level" name="activity_level" class="form-control" required>
                    <option value="">Select Activity Level</option>
                    <option value="sedentary" {{ old('activity_level', $profile->activity_level ?? '') == 'sedentary' ? 'selected' : '' }}>
                        Sedentary : Little or no Exercise
                    </option>
                    <option value="light" {{ old('activity_level', $profile->activity_level ?? '') == 'light' ? 'selected' : '' }}>
                        Light : Exercise 1-3 times/week
                    </option>
                    <option value="moderate" {{ old('activity_level', $profile->activity_level ?? '') == 'moderate' ? 'selected' : '' }}>
                        Moderate : Exercise 4-5 times/week
                    </option>
                    <option value="very_active" {{ old('activity_level', $profile->activity_level ?? '') == 'very_active' ? 'selected' : '' }}>
                        Very Active : Daily exercise
                    </option>
                    <option value="extra_active" {{ old('activity_level', $profile->activity_level ?? '') == 'extra_active' ? 'selected' : '' }}>
                        Extra Active : Intense exercise 6-7 times/week
                    </option>
                </select>
            </div>

            <div class="activity-notes">
                <h4>⚠️ Notes :</h4>
                <ul>
                    <li>Exercise: 15-30 Minutes Of Elevated Heart Rate Activity.</li>
                    <li>Intense Exercise: 45-120 Minutes Of Elevated Heart Rate Activity.</li>
                    <li>Very Intense Exercise: 2+ Hours Of Elevated Heart Rate Activity.</li>
                </ul>
            </div>

            <button type="submit" class="btn-calculate">Calculate</button>
        </form>
    </div>
</div>
@endsection