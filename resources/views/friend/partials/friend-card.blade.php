<div class="col">
    <li class="card col" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $friend->user->username }}</h5>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('profile.show', $friend->user->id) }}" class="btn btn-sm btn-info">Profile</a>
                <a href="{{ route('chat.show', $friend->user->id) }}" class="btn btn-sm btn-success">Send
                    Messages</a>
            </div>
        </div>
    </li>
</div>
