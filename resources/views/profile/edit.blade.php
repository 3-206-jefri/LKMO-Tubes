@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
<style>
    .profile-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 1rem;
    }

    .profile-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: white;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .profile-photo-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto;
    }

    .profile-photo-display {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: none;
        background: #52525b;
        display: block;
    }

    .photo-upload-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #f97316;
        color: white;
        border: 2px solid #18181b;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .photo-upload-btn:hover {
        background: #ea580c;
    }

    .file-input {
        display: none;
    }

    .photo-preview-name {
        text-align: center;
        color: #a1a1aa;
        font-size: 0.75rem;
        margin-top: 0.5rem;
        min-height: 1rem;
    }

    .form-section {
        margin-bottom: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        padding: 0.875rem 0;
        border-bottom: 1px solid #27272a;
    }

    .form-group:first-child {
        padding-top: 0;
    }

    .form-group:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .form-label {
        font-size: 0.75rem;
        font-weight: 500;
        color: #71717a;
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem 0;
        background: transparent;
        border: none;
        font-size: 0.875rem;
        color: white;
        font-weight: 400;
    }

    .form-control:focus {
        outline: none;
    }

    .form-control::placeholder {
        color: #52525b;
    }

    select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23a1a1aa' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0 center;
        padding-right: 1.5rem;
    }

    select.form-control option {
        background: #18181b;
        color: white;
    }

    .invalid-feedback {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }

    .form-control.is-invalid {
        color: #ef4444;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        padding: 0.875rem 0;
        border-bottom: 1px solid #27272a;
    }

    .form-row .form-group {
        padding: 0;
        border-bottom: none;
    }

    .form-row .form-group:first-child {
        padding-right: 0.5rem;
        border-right: 1px solid #27272a;
    }

    .form-row .form-group:last-child {
        padding-left: 0.5rem;
    }

    .btn-primary {
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
        cursor: pointer;
        margin-bottom: 0.5rem;
    }

    .btn-primary:hover {
        background: #ea580c;
    }

    .btn-cancel {
        background: transparent;
        color: #a1a1aa;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s;
        border: 1px solid #3f3f46;
        width: 100%;
        justify-content: center;
    }

    .btn-cancel:hover {
        background: #27272a;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="profile-container">
    <h1 class="profile-title">Edit Profile</h1>
    
    <div class="profile-header">
        <div class="profile-photo-wrapper">
            <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile Photo" class="profile-photo-display" id="profilePhotoPreview">
            <button type="button" class="photo-upload-btn" onclick="document.getElementById('profile_photo').click()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
            </button>
        </div>
        <div class="photo-preview-name" id="photoFileName"></div>
    </div>
    
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" id="profile_photo" name="profile_photo" class="file-input" accept="image/*" onchange="previewPhoto(event)">

        <div class="form-section">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                       name="username" value="{{ old('username', auth()->user()->username) }}" 
                       placeholder="Enter your username" required>
                @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nickname" class="form-label">Nickname</label>
                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" 
                       name="nickname" value="{{ old('nickname', auth()->user()->nickname) }}" 
                       placeholder="Enter your nickname">
                @error('nickname')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email', auth()->user()->email) }}" 
                       placeholder="Enter your email" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" 
                       name="date_of_birth" value="{{ old('date_of_birth', auth()->user()->date_of_birth?->format('Y-m-d')) }}">
                @error('date_of_birth')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="height" class="form-label">Height (cm)</label>
                    <input id="height" type="number" step="0.01" class="form-control @error('height') is-invalid @enderror" 
                           name="height" value="{{ old('height', auth()->user()->height) }}" 
                           placeholder="170">
                    @error('height')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input id="weight" type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" 
                           name="weight" value="{{ old('weight', auth()->user()->weight) }}" 
                           placeholder="65">
                    @error('weight')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', auth()->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            Save Changes
        </button>
        <a href="{{ route('artikel') }}" class="btn-cancel">Cancel</a>
    </form>
</div>

<script>
    function previewPhoto(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePhotoPreview').src = e.target.result;
                if (document.getElementById('navProfilePhoto')) {
                    document.getElementById('navProfilePhoto').src = e.target.result;
                }
            }
            reader.readAsDataURL(file);
            document.getElementById('photoFileName').textContent = file.name;
        }
    }
</script>
@endsection