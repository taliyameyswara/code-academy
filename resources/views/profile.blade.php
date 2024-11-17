@extends('layouts.app')

@section('title', 'Welcome to CodeAcademy')

@section('content')
    <section class="flex items-center justify-center min-h-screen bg-light">
        <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-md">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <button class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>

                </button>
                <h2 class="text-2xl font-bold text-center text-gray-700">My Profile</h2>
                <div></div> <!-- Placeholder to balance header spacing -->
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Picture -->
                <div class="flex justify-center my-6">
                    <div class="relative">
                        <img id="profilePic"
                            src="{{ Auth::user()->profile_picture ? 'storage/' . Auth::user()->profile_picture : 'https://via.placeholder.com/100' }}"
                            alt="Profile Picture" class="w-24 h-24 border-2 rounded-full border-primary">
                        <input type="file" id="fileInput" name="profile_picture"
                            class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)" />
                        <label for="fileInput"
                            class="absolute bottom-0 right-0 p-2 text-white rounded-full shadow-md cursor-pointer bg-primary hover:bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5L19.5 6.5" />
                                <path d="M16.5 3.5L4 16v4h4L20.5 7.5l-4-4z" />
                            </svg>
                        </label>
                    </div>

                    <script>
                        function previewImage(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const img = document.getElementById('profilePic');
                                    img.src = e.target.result; // Update the image source with the selected file
                                }
                                reader.readAsDataURL(file); // Convert file to base64 URL
                            }
                        }
                    </script>


                </div>

                <!-- Form -->
                <!-- Name Input -->
                <div class="relative mb-4">
                    <input type="text" name="name" placeholder="" value="{{ Auth::user()->name }}"
                        class="w-full p-3 pl-10 text-gray-800 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute text-gray-400 left-3 top-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M12 11c2.828 0 5-2.172 5-5S14.828 1 12 1 7 3.172 7 6s2.172 5 5 5zM2 21v-1a4 4 0 014-4h8a4 4 0 014 4v1" />
                        </svg>
                    </span>
                </div>

                <!-- Email Input -->
                <div class="relative mb-4">
                    <input type="email" name="email" value="{{ Auth::user()->email }}" readonly
                        class="w-full p-3 pl-10 text-gray-800 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute text-gray-400 left-3 top-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 4H2v16h20V4zM2 6l10 7L22 6" />
                        </svg>
                    </span>
                </div>

                <!-- Phone Input -->
                <div class="relative mb-4">
                    <input type="text" name="phone_number" placeholder="081344893214"
                        value="{{ Auth::user()->phone_number }}"
                        class="w-full p-3 pl-10 text-gray-800 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute text-gray-400 left-3 top-3">
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
                        class="w-full p-3 pl-10 text-gray-800 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
                    <span class="absolute text-gray-400 left-3 top-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                </div>

                <!-- Save Button -->
                <button type="submit" class="w-full py-3 font-semibold text-white bg-primary rounded-xl hover:bg-primary">
                    Save
                </button>
            </form>
        </div>
    </section>

@endsection
