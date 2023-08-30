@extends('head')

@section('content')
    <div class="container grid">
        <div class="row">
            <div class="col">
                <h1>
                    Hello {{ auth()->user()->username }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="container p-4">
                <h3>Friends {{ count(auth()->user()->friends) }}</h3>

                <div class="grid container">
                    <div class="row">
                        @foreach (auth()->user()->friends as $friend)
                            @include('friend.partials.friend-card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container p-4">
                <h3>Edit your account</h3>
                <form action="#" method="post" class="container">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" aria-describedby="username" required
                            autofocus value="{{ auth()->user()->username }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="name" required autofocus
                            value="{{ auth()->user()->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="email" required
                            autofocus value="{{ auth()->user()->email }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update Info</button>
                </form>
            </div>
        </div>
    </div>
@endsection
