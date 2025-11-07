@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
<style>
    .profile-container {
        max-width: 700px;
        margin: 2rem auto;
    }

    .profile-card {
        background: #1a1a1a;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        color: white;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .profile-title {
        font-size: 2rem;
        color: white;
        margin-bottom: 2rem;
        font-weight: bold;
    }

    .profile-photo-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 1.5rem;
    }

    .profile-photo-display {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #667eea;
        background: #2a2a2a;
    }

    .photo-upload-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: #667eea;
        color: white;
        border: 3px solid #1a1a1a;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .photo-upload-btn:hover {
        background: #5568d3;
        transform: scale(1.1);
    }

    .file-input {
        display: none;
    }

    .form-grid {
        display: grid;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #b0b0b0;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 0.9rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        font-size: 1rem;
        color: white;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.08);
        border-color: #667eea;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    select.form-control {
        cursor: pointer;
    }

    select.form-control option {
        background: #2a2a2a;
        color: white;
    }

    .invalid-feedback {
        color: #ff6b6b;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .btn-primary {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-cancel {
        width: 100%;
        padding: 1rem;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
        font-size: 1rem;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 0.5rem;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .photo-preview-name {
        text-align: center;
        color: #b0b0b0;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .info-note {
        background: rgba(102, 126, 234, 0.1);
        border-left: 4px solid #667eea;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1.5rem;
        color: #b0b0b0;
        font-size: 0.9rem;
    }

    @media (max-width: 600px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .profile-card {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h1 class="profile-title">Edit Profile</h1>
            
            <div class="profile-photo-wrapper">
                <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile Photo" class="profile-photo-display" id="profilePhotoPreview">
                <button type="button" class="photo-upload-btn" onclick="document.getElementById('profile_photo').click()">
                    📷
                </button>
            </div>
            <div class="photo-preview-name" id="photoFileName"></div>
        </div>

        <div class="info-note">
            💡 Complete your profile to get personalized workout recommendations and track your fitness journey better!
        </div>
        
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="file" id="profile_photo" name="profile_photo" class="file-input" accept="image/*" onchange="previewPhoto(event)">

            <div class="form-grid">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                           name="username" value="{{ old('username', auth()->user()->username) }}" 
                           placeholder="Dela Puspita Sari" required>
                    @error('username')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nickname" class="form-label">Nickname</label>
                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" 
                           name="nickname" value="{{ old('nickname', auth()->user()->nickname) }}" 
                           placeholder="Dela">
                    @error('nickname')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email', auth()->user()->email) }}" 
                           placeholder="delapst123@gmail.com" required>
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

            <button type="submit" class="btn-primary">💾 Save Changes</button>
            <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
        </form>
    </div>
</div>

<script>
    function previewPhoto(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePhotoPreview').src = e.target.result;
                document.getElementById('navProfilePhoto').src = e.target.result;
            }
            reader.readAsDataURL(file);
            document.getElementById('photoFileName').textContent = file.name;
        }
    }
</script>
@endsection