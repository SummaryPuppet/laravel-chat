@extends('head')

@section('content')
    <main class="container mt-3">
        <header>
            <h1>{{ $user->username }}</h1>
            <p>{{ $user->name }}</p>
            <small class="text-body-secondary">{{ $user->created_at }}</small>
        </header>

    </main>
@endsection
