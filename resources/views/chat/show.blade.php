@extends('chat.partials.friends')
@extends('head')
@section('content')
@endsection

@section('friend-name')
    <a href="{{ route('profile.show', $friend_id) }}" class="nav-link">{{ $friend->username }}</a>
@endsection

@section('messages-list')
    <ul class="col list-group overflow-y-scroll" style="max-height: 39em;">
        @foreach ($messages as $message)
            @if ($message->sender_username == auth()->user()->username)
                @include('chat.partials.message-card')
                @section('card', 'bg-dark text-white')
            @section('card-title', 'text-white')
        @else
            @include('chat.partials.message-card')
        @endif
    @endforeach
</ul>

@if (count($messages) == 0)
    No messages yet
@endif
@endsection
