@extends('head')

@section('content')
    <div class="container mt-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $friend->username }}</h5>
                <form action="{{ route('add-friend', [$friend]) }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
