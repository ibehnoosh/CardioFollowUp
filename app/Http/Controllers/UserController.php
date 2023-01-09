<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        return view('user.index', [
            'users' => User::all()
        ]);
    }

}
