@extends('layouts.app')

@section('title', 'Bantuan - CodeAcademy')

@section('content')
    <section class="bg-primary py-10 rounded-b-[2rem]">
        <div class="container mx-auto  px-4">
            <!-- Heading -->
            <h2 class="text-xl md:text-2xl text-white mb-2 text-center">Pertanyaan yang sering</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-pink-200 mb-8 text-center">DITANYAKAN</h1>

            <!-- FAQ Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 1?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 2?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 3?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 4?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 5?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pertanyaan 6?</h3>
                    <p class="text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-10">
        <div class="container mx-auto  px-4">
            <!-- Heading -->
            <h2 class="text-xl md:text-2xl text-secondary mb-2 text-center">Tanggapan</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-secondary mb-8 text-center">Teman-teman</h1>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                    <!-- Card -->
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDwmG52pVI5JZfn04j9gdtsd8pAGbqjjLswg&s"
                                class="w-10 h-10 rounded-full" alt="User Profile">
                            <h3 class="text-lg font-semibold text-gray-800">Username {{ $i }}</h3>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                @endfor
            </div>
        </div>
        </div>
    </section>

    <section class="bg-secondary py-20 rounded-t-[2rem]">
        <div class="container mx-auto  px-4">
            <!-- Heading -->
            <h2 class="text-xl md:text-2xl text-light mb-2 text-center">Hubungi</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-light mb-8 text-center">Kami</h1>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-pink-200 rounded-2xl flex items-center justify-center flex-col aspect-square">
                    <img src="{{ asset('image/ig.png') }}" alt="" class="w-36">
                    <p class="mt-5 text-lg font-semibold text-gray-600">@codeacademy</p>
                </div>
                <div class="bg-pink-200 rounded-2xl flex items-center justify-center flex-col aspect-square">
                    <img src="{{ asset('image/wa.png') }}" alt="" class="w-36">
                    <p class="mt-5 text-lg font-semibold text-gray-600">0896 4347 4489</p>
                </div>
                <div class="bg-pink-200 rounded-2xl flex items-center justify-center flex-col aspect-square">
                    <img src="{{ asset('image/email.png') }}" alt="" class="w-36">
                    <p class="mt-5 text-lg font-semibold text-gray-600">codeacademy@gmail.com</p>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
