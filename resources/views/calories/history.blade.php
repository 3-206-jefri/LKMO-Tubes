@extends('layouts.app')

@section('title', 'Food History')

@push('styles')
<style>
    .history-container {
        max-width: 600px;
        margin: 2rem auto;
    }

    .history-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .history-title {
        font-size: 2.5rem;
        color: #ff6b35;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .history-subtitle {
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

    .add-food-card {
        background: #1a1a1a;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .add-food-title {
        color: white;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
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
        border-color: #7ed321;
        background: rgba(255, 255, 255, 0.08);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    .btn-add-food {
        width: 100%;
        padding: 1rem;
        background: #7ed321;
        border: none;
        color: #000;
        font-size: 1.1rem;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
    }

    .btn-add-food:hover {
        background: #6ec019;
        transform: translateY(-2px);
    }

    .food-list {
        margin-bottom: 2rem;
    }

    .food-item {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s;
    }

    .food-item:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .food-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 107, 53, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .food-info {
        flex: 1;
    }

    .food-name {
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 0.25rem;
    }

    .food-calories {
        color: #ff6b35;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .food-time {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.85rem;
    }

    .btn-delete {
        background: #ff6b6b;
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s;
    }

    .btn-delete:hover {
        background: #ff5252;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: rgba(255, 255, 255, 0.5);
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .summary-card {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
    }

    .summary-title {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .summary-item {
        text-align: center;
    }

    .summary-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .summary-value {
        font-size: 2rem;
        font-weight: bold;
    }

    .summary-unit {
        font-size: 1rem;
        opacity: 0.8;
    }
</style>
@endpush

@section('content')
<div class="history-container">
    <div class="history-header">
        <h1 class="history-title">Calories Calculator</h1>
        <p class="history-subtitle">"By Meeting BMR, The Body Can Grow And Function Properly"</p>
    </div>

    <div class="tab-container">
        <a href="{{ route('calories.index') }}" class="tab-btn">Calculator</a>
        <a href="{{ route('calories.history') }}" class="tab-btn active">History</a>
    </div>

    @if($profile)
    <div class="summary-card">
        <div class="summary-title">📊 Today's Summary</div>
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">Consumed</div>
                <div class="summary-value">
                    {{ number_format($todayTotal, 0) }}
                    <span class="summary-unit">Cal</span>
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Remaining</div>
                <div class="summary-value">
                    {{ number_format(max(0, $profile->tdee - $todayTotal), 0) }}
                    <span class="summary-unit">Cal</span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="add-food-card">
        <h2 class="add-food-title">Add Food</h2>
        <form action="{{ route('calories.add-food') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="food_name" class="form-label">Food</label>
                <input type="text" id="food_name" name="food_name" class="form-control" 
                       placeholder="e.g., Salmon with Sweet Potato" required>
            </div>

            <div class="form-group">
                <label for="calories" class="form-label">Kcal</label>
                <input type="number" step="0.01" id="calories" name="calories" class="form-control" 
                       placeholder="520" required min="0">
            </div>

            <button type="submit" class="btn-add-food">Add More Food</button>
        </form>
    </div>

    <div class="food-list">
        @forelse($histories as $food)
        <div class="food-item">
            <div class="food-icon">🍽️</div>
            <div class="food-info">
                <div class="food-name">{{ $food->food_name }}</div>
                <div class="food-calories">🔥 {{ number_format($food->calories, 0) }} kcal</div>
                <div class="food-time">{{ $food->date->format('D, d/m/Y') }} - {{ date('H:i', strtotime($food->time)) }}</div>
            </div>
            <form action="{{ route('calories.delete-food', $food) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('Delete this food?')">🗑️</button>
            </form>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-icon">🍽️</div>
            <p>No food logged yet. Start tracking your meals!</p>
        </div>
        @endforelse
    </div>

    @if($histories->hasPages())
    <div style="margin-top: 2rem;">
        {{ $histories->links() }}
    </div>
    @endif
</div>
@endsection