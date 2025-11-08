@extends('layouts.app')

@section('title', 'My Profile')

@push('styles')
<style>
    .profile-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 1rem;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .profile-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: white;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: none;
        margin: 0 auto;
        background: #52525b;
        display: block;
    }

    .profile-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .stat-box {
        background: #27272a;
        border: 1px solid #3f3f46;
        color: white;
        padding: 1rem;
        border-radius: 12px;
        text-align: center;
    }

    .stat-label {
        font-size: 0.75rem;
        color: #a1a1aa;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
    }

    .info-section {
        margin-bottom: 1.5rem;
    }

    .info-row {
        display: flex;
        flex-direction: column;
        padding: 0.875rem 0;
        border-bottom: 1px solid #27272a;
    }

    .info-row:first-child {
        padding-top: 0;
    }

    .info-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-label {
        font-size: 0.75rem;
        font-weight: 500;
        color: #71717a;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 0.875rem;
        color: white;
        font-weight: 400;
    }

    .btn-edit {
        background: #f97316;
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        transition: background 0.3s;
        border: none;
        width: 100%;
        justify-content: center;
    }

    .btn-edit:hover {
        background: #ea580c;
    }
</style>
@endpush

@section('content')
<div class="profile-container">
    <h1 class="profile-title">Profile</h1>
    
    <div class="profile-header">
        <img src="{{ $user->profile_photo_url }}" alt="Profile" class="profile-photo">
    </div>

    <div class="info-section">
        <div class="info-row">
            <div class="info-label">Username</div>
            <div class="info-value">{{ $user->username }}</div>
        </div>

        @if($user->nickname)
        <div class="info-row">
            <div class="info-label">Nickname</div>
            <div class="info-value">{{ $user->nickname }}</div>
        </div>
        @endif

        <div class="info-row">
            <div class="info-label">Email</div>
            <div class="info-value">{{ $user->email }}</div>
        </div>

        <div class="info-row">
            <div class="info-label">Date of Birth</div>
            <div class="info-value">
                {{ $user->date_of_birth ? $user->date_of_birth->format('d F Y') : '-' }}
            </div>
        </div>

        @if($user->height)
        <div class="info-row">
            <div class="info-label">Height</div>
            <div class="info-value">{{ $user->height }} cm</div>
        </div>
        @endif

        @if($user->weight)
        <div class="info-row">
            <div class="info-label">Weight</div>
            <div class="info-value">{{ $user->weight }} kg</div>
        </div>
        @endif

        <div class="info-row">
            <div class="info-label">Gender</div>
            <div class="info-value">
                {{ $user->gender ? ucfirst($user->gender) : '-' }}
            </div>
        </div>
    </div>

    <a href="{{ route('profile.edit') }}" class="btn-edit">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
        </svg>
        Edit Profile
    </a>
</div>
@endsection