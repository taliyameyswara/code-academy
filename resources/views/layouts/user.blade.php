@extends('layouts.app')

@section('content')
    <div class="user-container">
        <header>
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        </header>
        <section class="content">
            @yield('user-content')
        </section>
    </div>
@endsection
