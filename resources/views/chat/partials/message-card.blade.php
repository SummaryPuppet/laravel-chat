<li class="list-group-item border-0">
    <div class="card rounded @yield('card')" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('profile.show', $message->sender_id) }}" class="text-decoration-none @yield('card-title')">
                    {{ $message->sender_username }}
                </a>
            </h5>
            <p class="card-text @yield('card-text')">
                {{ $message->text }}
            </p>
            <small class="text-body-tertiary user-select-none">
                {{ $message->created_at }}
            </small>
        </div>
    </div>
</li>
