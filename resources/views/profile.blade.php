@extends('layouts.app')

@section('title', 'Welcome to CodeAcademy')

@section('content')
    <section class="min-h-screen bg-light flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-md w-full max-w-lg p-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <button class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>

                </button>
                <h2 class="text-2xl font-bold text-gray-700 text-center">My Profile</h2>
                <div></div> <!-- Placeholder to balance header spacing -->
            </div>

            <!-- Profile Picture -->
            <div class="flex justify-center my-6">
                <div class="relative">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-2 border-primary">
                    <button
                        class="absolute bottom-0 right-0 bg-primary text-white p-2 rounded-full shadow-md hover:bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5L19.5 6.5" />
                            <path d="M16.5 3.5L4 16v4h4L20.5 7.5l-4-4z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form -->
            <form action="#" method="POST">
                @csrf
                <!-- Name Input -->
                <div class="relative mb-4">
                    <input type="text" name="name" placeholder="Anita Wulandari"
                        class="w-full border rounded-lg p-3 pl-10 text-gray-800 focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M12 11c2.828 0 5-2.172 5-5S14.828 1 12 1 7 3.172 7 6s2.172 5 5 5zM2 21v-1a4 4 0 014-4h8a4 4 0 014 4v1" />
                        </svg>
                    </span>
                </div>

                <!-- Email Input -->
                <div class="relative mb-4">
                    <input type="email" name="email" placeholder="anitawulandari@gmail.com"
                        class="w-full border rounded-lg p-3 pl-10 text-gray-800 focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 4H2v16h20V4zM2 6l10 7L22 6" />
                        </svg>
                    </span>
                </div>

                <!-- Phone Input -->
                <div class="relative mb-4">
                    <input type="text" name="phone" placeholder="081344893214"
                        class="w-full border rounded-lg p-3 pl-10 text-gray-800 focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>

                    </span>
                </div>

                <!-- Password Input -->
                <div class="relative mb-6">
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full border rounded-lg p-3 pl-10 text-gray-800 focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                </div>

                <!-- Save Button -->
                <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-primary">
                    Save
                </button>
            </form>
        </div>
    </section>

@endsection
