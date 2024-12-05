<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where("username", $username)->firstorFail();
        $pasties = $user->pasties()->latest()->get();
        return view("users.show", [
            "user" => $user,
            "pasties" => $pasties
        ]);
    }
}
