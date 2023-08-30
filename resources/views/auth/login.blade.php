@extends('head')

@section('content')
    <main class="container mt-5">
        <form action="{{ route('login.perform') }}" method="POST">
            @csrf

            @if (session('success'))
                <span class="alert alert-success">{{ $message }}</span>
            @endif

            <div class="mb-3">
                <label for="username" class="form-label">Username or email</label>
                <input type="text" class="form-control" name="username" aria-describedby="username"
                    placeholder="example@email.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password123">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <a href="{{ route('register.show') }}">or register</a>
        </form>
    </main>
@endsection
