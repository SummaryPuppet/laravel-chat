@extends('head')

@section('content')
    <main class="container mt-3 h-100 flex flex-column justify-content-center align-items-center text-center">
        <h1>Welcome to my chat project</h1>
        <div class="container">
            @auth

                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Dashboard</a>
                <a href="{{ route('chat.index') }}" class="btn btn-primary">Chat</a>
                <a href="{{ route('friends.index') }}" class="btn btn-primary">Friends</a>
            @endauth

            @guest
                <a href="{{ route('login.show') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register.show') }}" class="btn btn-primary">Register</a>
            @endguest
        </div>
    </main>
@endsection
