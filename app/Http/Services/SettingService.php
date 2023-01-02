<?php

namespace App\Http\Services;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingService
{
    public static function index($request)
    {
        $data = null;
        $user_id = Auth::user()->id ?? 1;
        $data = Setting::where(Setting::COL_USER_ID, $user_id)->first();
        return view('setting', compact('data'));
    }

    public static function create($request)
    {
        $request['user_id']=Auth::user()->id ?? 1;
        $data=Setting::updateOrCreate([
            Setting::COL_USER_ID=>$request['user_id'],
        ],$request);
        return view('setting',compact('data'));
    }
}
