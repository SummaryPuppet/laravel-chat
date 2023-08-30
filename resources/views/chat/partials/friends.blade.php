<main class="mt-3 px-3 grid ">
    <div class="row">
        <div class="col">
            <h4>Friends</h4>
        </div>
        <div class="col">
            <h4>@yield('friend-name')</h4>
        </div>
    </div>

    <div class="row container-fluid position-relative" style="height: 39em;">
        <ul class="list-group col-2 overflow-y-scroll">
            @foreach ($friends as $friend)
                <li class="list-group-item {{ $friend->user->id == $friend_id ? 'bg-dark text-white' : '' }}">
                    <a href="{{ route('chat.show', $friend->user->id) }}" class="btn">{{ $friend->user->username }}</a>
                </li>
            @endforeach

            @if (count($friends) == 0)
                <li class="list-group-item">No friends yet</li>
            @endif

        </ul>
        @yield('messages-list')
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col">
            <form action="{{ route('chat.store') }}" method="post" class="d-flex gap-1">
                @csrf
                <input type="hidden" value="{{ $friend_id }}" name="id">
                <input class="form-control rounded" type="text" name="text" autofocus required
                    placeholder="Type a message">

                <button type="submit" class="btn btn-success rounded">></button>
            </form>

        </div>
    </div>
</main>
