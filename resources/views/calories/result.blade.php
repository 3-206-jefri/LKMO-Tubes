@extends('layouts.app')

@section('title', 'Calorie Results')

@push('styles')
<style>
    .result-container {
        max-width: 600px;
        margin: 2rem auto;
    }

    .result-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .result-title {
        font-size: 2.5rem;
        color: #ff6b35;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .result-subtitle {
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
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .tab-btn.active {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .result-card {
        background: rgba(200, 200, 200, 0.95);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .result-card-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
    }

    .result-card-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .result-value {
        font-size: 3rem;
        font-weight: bold;
        color: #333;
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
    }

    .result-unit {
        font-size: 1.2rem;
        color: #666;
    }

    .disclaimer {
        background: rgba(255, 107, 53, 0.1);
        border: 2px solid #ff6b35;
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }

    .disclaimer-title {
        color: #ff6b35;
        font-weight: bold;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .disclaimer-text {
        color: white;
        font-size: 0.85rem;
        line-height: 1.6;
    }

    .btn-back {
        width: 100%;
        padding: 1rem;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 1rem;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: all 0.3s;
        margin-top: 1rem;
    }

    .btn-back:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
    }
</style>
@endpush

@section('content')
<div class="result-container">
    <div class="result-header">
        <h1 class="result-title">Calories Calculator</h1>
        <p class="result-subtitle">"By Meeting BMR, The Body Can Grow And Function Properly"</p>
    </div>

    <div class="tab-container">
        <a href="{{ route('calories.index') }}" class="tab-btn active">Calculator</a>
        <a href="{{ route('calories.history') }}" class="tab-btn">History</a>
    </div>

    <div class="result-card">
        <div class="result-card-title">
            🔥 Your BMR Index
        </div>
        <div class="result-card-description">
            The BMR index indicates the number of calories your body needs to maintain basic physiological functions at rest throughout the day.
        </div>
        <div class="result-value">
            {{ number_format($profile->bmr, 0) }}
            <span class="result-unit">kcal/day</span>
        </div>
    </div>

    <div class="result-card">
        <div class="result-card-title">
            🔥 TDEE Index
        </div>
        <div class="result-card-description">
            TDEE is the total calories you burn in a day, including calories burned during physical activity and the process of digesting food.
        </div>
        <div class="result-value">
            {{ number_format($profile->tdee, 0) }}
            <span class="result-unit">kcal/day</span>
        </div>
    </div>

    <div class="disclaimer">
        <div class="disclaimer-title">
            ⚠️ Notes :
        </div>
        <div class="disclaimer-text">
            The Results From This BMR Calculator Are Not A Medical Diagnostic Tool Or A Substitute For Consulting A Doctor. Please Note That Several Factors Can Influence The Results Of This BMR Calculator, Including Age, Physical Condition, Weight, Height, And Daily Activity. Before Making Any Lifestyle Changes, Be Sure To Consult A Doctor First.
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn-back">Back to Dashboard</a>
</div>
@endsection