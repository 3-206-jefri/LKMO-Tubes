@extends('layouts.app')

@section('title', 'Create Workout')

@push('styles')
<style>
    .workout-card {
        background: #000;
        border-radius: 15px;
        padding: 2rem;
        max-width: 600px;
        margin: 2rem auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .workout-title {
        color: white;
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 1rem 3rem 1rem 1rem;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        font-size: 1rem;
        color: white;
        transition: all 0.3s;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-control:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.15);
        border-color: #ff6b35;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.5rem;
    }

    .invalid-feedback {
        color: #ff6b6b;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .btn-save {
        width: 100%;
        padding: 1rem;
        background: #ff6b35;
        border: none;
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-save:hover {
        background: #ff8555;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    }

    .btn-cancel {
        width: 100%;
        padding: 1rem;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 1rem;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 1rem;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.1);
    }
</style>
@endpush

@section('content')
<div class="workout-card">
    <h1 class="workout-title">SET NEW WORKOUT TARGET</h1>
    
    <form method="POST" action="{{ route('workouts.store') }}">
        @csrf

        <div class="form-group">
            <div class="input-wrapper">
                <input id="activity_type" type="text" 
                       class="form-control @error('activity_type') is-invalid @enderror" 
                       name="activity_type" value="{{ old('activity_type') }}" 
                       placeholder="Activity Type (e.g., Running)" required>
                <span class="input-icon">🏃</span>
            </div>
            @error('activity_type')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form -group">
            <div class="input-wrapper">
                <input id="target_goal" type="text" 
                       class="form-control @error('target_goal') is-invalid @enderror" 
                       name="target_goal" value="{{ old('target_goal') }}" 
                       placeholder="Target Goal (e.g., 5 km)" required>
                <span class="input-icon">🎯</span>
            </div>
            @error('target_goal')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <div class="input-wrapper">
                <input id="scheduled_at" type="datetime-local" 
                       class="form-control @error('scheduled_at') is-invalid @enderror" 
                       name="scheduled_at" value="{{ old('scheduled_at') }}" required>
                <span class="input-icon">🕐</span>
            </div>
            @error('scheduled_at')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-save">Save Schedule</button>
        <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
    </form>
</div>
@endsection