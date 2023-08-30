<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendRequest;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $friends = $user->friends->each(function ($friend) {
            return $friend->user()->get();
        });

        return view('friend.index', ['friends' => $friends]);
    }


    public function store(FriendRequest $request)
    {
        $user = Auth::user();
        if ($user->username == $request->username) {
            return redirect()->route('friends.index')->withErrors("Not find user");
        }

        $friend = User::where('username', $request->username)->first();

        if ($friend == null) {
            return redirect()->route('friends.index')->withErrors("Not find user");
        }

        return view('friend.add-friend', ['friend' => $friend]);
    }

    public function addFriend(Request $request, $friend)
    {
        $user = Auth::id();

        $newFriend = new Friend();
        $newFriend->user_id = $user;
        $newFriend->friend_id = (int) $friend;

        $newFriend->save();

        return redirect()->route('friends.index')->with("success", "Friend added");
    }
}
