<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public static function index($request)
    {
        return User::get();
    }

    public static function create($request)
    {
        return User::create($request);
    }
}
