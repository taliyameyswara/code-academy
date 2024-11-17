@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-800 text-white flex flex-col py-6 px-4">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg py-2 px-4">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.courses.index') }}"
                        class="block text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg py-2 px-4">
                        Manage Courses
                    </a>
                </li>
            </ul>
        </aside>

        {{-- Main Content --}}
        <section class="flex-1 bg-gray-100 p-6">
            @yield('admin-content')
        </section>
    </div>
@endsection
