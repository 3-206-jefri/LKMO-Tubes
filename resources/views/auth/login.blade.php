@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
    .auth-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        max-width: 450px;
        margin: 3rem auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .auth-title {
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        color: #667eea;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #333;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
    }

    .invalid-feedback {
        color: #ff6b6b;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .btn-primary {
        width: 100%;
        padding: 0.75rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        color: #666;
    }

    .auth-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<div class="auth-card">
    <h1 class="auth-title">Welcome Back!</h1>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                   name="username" value="{{ old('username') }}" required autofocus>
            @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                   name="password" required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-primary">Login</button>

        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </div>
    </form>
</div>
@endsection