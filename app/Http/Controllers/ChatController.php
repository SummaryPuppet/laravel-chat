<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::all();
        $friends = $user->friends->each(function ($friend) {
            return $friend->user()->get();
        });

        return view('chat.index', ['friends' => $friends, 'friend_id' => '', 'user' => $user, 'messages' => $messages]);
    }

    public function show(Request $request, $id)
    {
        $friend = User::find($id);
        $user = Auth::user();

        $friends = $user->friends->each(function ($friend) {
            return $friend->user()->get();
        });

        $messages_user = Message::whereIn('sender_id', [$user->id, $friend->id])
            ->whereIn('receiver_id', [$user->id, $friend->id])
            ->get();

        $messages_friend = Message::whereIn('sender_id', [$friend->id, $user->id])
            ->whereIn('receiver_id', [$user->id, $friend->id])
            ->get();

        $messages = $messages_user->merge($messages_friend)->sortBy('created_at', SORT_ASC);


        return view('chat.show', ['friend' => $friend, 'friend_id' => $friend->id, 'friends' => $friends, 'messages' => $messages]);
    }

    public function store(ChatRequest $request)
    {
        $user = Auth::user();
        $text = $request->text;
        $friend = User::find($request->id);

        if ($friend == null) {
            return;
        }

        $message = new Message();
        $message->sender_id = $user->id;
        $message->sender_username = $user->username;
        $message->receiver_id = $friend->id;
        $message->receiver_username = $friend->username;
        $message->text = $text;
        $message->save();

        return redirect()->route('chat.show', $friend->id);
    }
}
