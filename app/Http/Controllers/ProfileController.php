<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::find($id);

        if ($user == null) {
            return response()->json(['error' => 'User not find'], 404);
        }


        return view('profile.show', ['user' => $user]);
    }
}
