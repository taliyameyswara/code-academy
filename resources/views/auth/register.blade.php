@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Register</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Register Form --}}
        <form action="{{ route('register') }}" method="POST" class="mx-auto" style="max-width: 400px;">
            @csrf

            {{-- Name Input --}}
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            {{-- Email Input --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                    required>
            </div>

            {{-- Password Input --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            {{-- Password Confirmation --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    required>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        {{-- Login Link --}}
        <p class="text-center mt-3">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
@endsection
