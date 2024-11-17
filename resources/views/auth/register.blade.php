@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-2xl shadow-md p-8">
            <h1 class="text-2xl font-bold text-center text-primary mb-6">Sign Up</h1>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Register Form --}}
            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Name Input --}}
                <div>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        value="{{ old('name') }}" required>
                </div>

                {{-- Email Input --}}
                <div>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        value="{{ old('email') }}" required>
                </div>

                {{-- Phone Number Input --}}
                <div>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        value="{{ old('phone') }}" required>
                </div>

                {{-- Password Input --}}
                <div>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        required>
                </div>

                {{-- Password Confirmation Input --}}
                <div>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Verify Password"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200 text-gray-800"
                        required>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full bg-primary text-white font-semibold py-2 rounded-xl shadow transition">
                    Sign Up
                </button>
            </form>

            {{-- Login Link --}}
            <p class="text-center mt-4 text-primary">
                Already have an account? <a href="{{ route('login') }}" class="text-primary font-semibold">Sign
                    In</a>
            </p>
        </div>
    </div>
@endsection
