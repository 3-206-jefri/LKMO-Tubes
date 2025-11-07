@extends('layouts.app')

@section('title', 'My Profile')

@push('styles')
<style>
    .profile-container {
        max-width: 800px;
        margin: 2rem auto;
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .profile-photo {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #667eea;
        margin-bottom: 1.5rem;
    }

    .profile-name {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .profile-nickname {
        font-size: 1.2rem;
        color: #667eea;
        margin-bottom: 1rem;
    }

    .profile-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .stat-box {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: bold;
    }

    .info-grid {
        display: grid;
        gap: 1.5rem;
    }

    .info-row {
        display: grid;
        grid-template-columns: 150px 1fr;
        padding: 1rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #666;
    }

    .info-value {
        color: #333;
    }

    .btn-edit {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1rem 2rem;
        border-radius: 10px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        margin-top: 2rem;
    }

    .empty-info {
        color: #999;
        font-style: italic;
    }
</style>
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="{{ $user->profile_photo_url }}" alt="Profile" class="profile-photo">
            <h1 class="profile-name">{{ $user->username }}</h1>
            @if($user->nickname)
                <p class="profile-nickname">{{ $user->nickname }}</p>
            @endif
        </div>

        @if($user->height && $user->weight)
        <div class="profile-stats">
            @if($user->age)
            <div class="stat-box">
                <div class="stat-label">Age</div>
                <div class="stat-value">{{ $user->age }}</div>
            </div>
            @endif
            <div class="stat-box">
                <div class="stat-label">Height</div>
                <div class="stat-value">{{ $user->height }} <small>cm</small></div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Weight</div>
                <div class="stat-value">{{ $user->weight }} <small>kg</small></div>
            </div>
            @if($user->bmi)
            <div class="stat-box">
                <div class="stat-label">BMI</div>
                <div class="stat-value">{{ $user->bmi }}</div>
            </div>
            @endif
        </div>
        @endif

        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">📧 Email</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">🎂 Date of Birth</div>
                <div class="info-value">
                    {{ $user->date_of_birth ? $user->date_of_birth->format('d F Y') : '-' }}
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">⚧ Gender</div>
                <div class="info-value">
                    {{ $user->gender ? ucfirst($user->gender) : '-' }}
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">📅 Member Since</div>
                <div class="info-value">{{ $user->created_at->format('d F Y') }}</div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('profile.edit') }}" class="btn-edit">✏️ Edit Profile</a>
        </div>
    </div>
</div>
@endsection