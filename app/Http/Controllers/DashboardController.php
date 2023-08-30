<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('dashboard.index');
    }
}
