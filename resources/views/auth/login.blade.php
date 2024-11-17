@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-light">
        <div class="bg-white w-full max-w-md rounded-2xl shadow-md p-8">
            <h1 class="text-2xl font-bold text-center text-primary mb-6">Sign In</h1>

            {{-- Login Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email Input --}}
                <div>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        value="{{ old('email') }}" required autofocus>
                </div>

                {{-- Password Input --}}
                <div>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        required>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full bg-primary text-white font-semibold py-2 rounded-xl shadow transition">
                    Sign In
                </button>
            </form>

            {{-- Registration Link --}}
            <p class="text-center mt-4 text-primary">
                Belum punya akun? <a href="{{ route('register') }}" class="text-primary font-semibold">Daftar</a>
            </p>
        </div>
    </div>
@endsection
