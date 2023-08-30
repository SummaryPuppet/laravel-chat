@extends('head')

@section('content')
    <div class="container">

        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif


        <form action="{{ route('friends.store') }}" method="post" class="d-flex flex-column gap-2 container p-5">
            @csrf
            <h5>Add friends:</h5>

            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">

            <button type="submit" class="btn btn-success">Add friend</button>
        </form>

        @if (count($friends) == 0)
            <h2 class="my-3">No friends yet</h2>
        @endif

        <ul class="container-fluid grid">
            <div class="row row-cols-1 row-cols-md-4">
                @foreach ($friends as $friend)
                    @include('friend.partials.friend-card')
                @endforeach
            </div>
        </ul>
    </div>
@endsection
