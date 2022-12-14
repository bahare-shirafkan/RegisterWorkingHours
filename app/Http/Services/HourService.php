<?php

namespace App\Http\Services;

use App\Models\Hour;

class HourService
{
    public static function index($request)
    {
        return Hour::get();
    }

    public static function create($request)
    {
        return Hour::create($request);
    }
}
