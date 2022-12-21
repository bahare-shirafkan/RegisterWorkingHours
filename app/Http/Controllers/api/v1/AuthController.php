<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Authenticatable;

    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where(User::COL_EMAIL, $request['email'])->first();
        if (!Hash::check($request->password, $user->password)) {
            $data['message'] = "wrong password";
            $data['code'] = 403;
        } else {
            $data['message'] = 'logged in successfully';
            $token = $user->createToken('myToken')->plainTextToken;
            $data['data']['token'] = $token;
            $data['data']['user'] = $user;
            $cookie = cookie('jwt', $token, 60 * 24 * 30 * 120);
            $data['code'] = 200;
        }
        return  response()->json($data);
    }
}
