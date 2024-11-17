@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Login</h1>

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

        {{-- Login Form --}}
        <form action="{{ route('login') }}" method="POST" class="mx-auto" style="max-width: 400px;">
            @csrf

            {{-- Email Input --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                    required autofocus>
            </div>

            {{-- Password Input --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        {{-- Registration Link --}}
        <p class="text-center mt-3">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
    </div>
@endsection
