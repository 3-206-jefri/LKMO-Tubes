@extends('layouts.app')

@section('title', 'Workout History')

@push('styles')
<style>
    .history-header {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .history-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .history-subtitle {
        color: #666;
        font-size: 1.1rem;
    }

    .history-timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline-line {
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #667eea, #764ba2);
        transform: translateX(-50%);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 3rem;
        display: flex;
        align-items: center;
    }

    .timeline-item:nth-child(odd) {
        flex-direction: row;
    }

    .timeline-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    .timeline-content {
        width: calc(50% - 40px);
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .timeline-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .timeline-dot {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        z-index: 10;
        margin: 0 20px;
        border: 5px solid white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .history-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .history-activity {
        font-size: 1.3rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .history-goal {
        color: #667eea;
        font-size: 1rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .history-date {
        color: #999;
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
    }

    .history-completed {
        color: #51cf66;
        font-size: 0.9rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .badge-completed {
        background: #51cf66;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: bold;
        display: inline-block;
        margin-top: 0.5rem;
    }

    .empty-state {
        background: white;
        border-radius: 15px;
        padding: 4rem 2rem;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .empty-icon {
        font-size: 5rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .empty-text {
        color: #666;
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }

    .btn-create {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem 2rem;
        text-decoration: none;
        display: inline-block;
        border-radius: 8px;
        font-weight: bold;
    }

    .stats-summary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        text-align: center;
    }

    .stat-item h3 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .stat-item p {
        font-size: 1rem;
        opacity: 0.9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .timeline-line {
            left: 30px;
        }

        .timeline-item {
            flex-direction: row !important;
            padding-left: 80px;
        }

        .timeline-content {
            width: 100%;
        }

        .timeline-dot {
            position: absolute;
            left: 0;
            margin: 0;
        }
    }
</style>
@endpush

@section('content')
<div class="history-header">
    <h1 class="history-title">🏆 Workout History</h1>
    <p class="history-subtitle">Your journey to fitness excellence</p>
</div>

@if($histories->count() > 0)
    <div class="stats-summary">
        <div class="stat-item">
            <h3>{{ $histories->total() }}</h3>
            <p>Total Completed</p>
        </div>
        <div class="stat-item">
            <h3>🔥</h3>
            <p>Keep It Up!</p>
        </div>
        <div class="stat-item">
            <h3>💪</h3>
            <p>You're Amazing!</p>
        </div>
    </div>

    <div class="history-timeline">
        <div class="timeline-line"></div>
        
        @foreach($histories as $history)
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="history-icon">🏃‍♂️</div>
                <div class="history-activity">{{ $history->activity_type }}</div>
                <div class="history-goal">🎯 Target: {{ $history->target_goal }}</div>
                <div class="history-date">📅 Scheduled: {{ $history->scheduled_at->format('d M Y, H:i') }}</div>
                <div class="history-completed">
                    ✓ Completed: {{ $history->completed_at->format('d M Y, H:i') }}
                </div>
                <span class="badge-completed">COMPLETED</span>
            </div>
            <div class="timeline-dot">✓</div>
        </div>
        @endforeach
    </div>

    <div style="margin-top: 2rem; text-align: center;">
        {{ $histories->links() }}
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">📊</div>
        <h2 class="empty-title">No Workout History Yet</h2>
        <p class="empty-text">Complete your first workout to start tracking your progress!</p>
        <a href="{{ route('dashboard') }}" class="btn-create">Go to Dashboard</a>
    </div>
@endif
@endsection