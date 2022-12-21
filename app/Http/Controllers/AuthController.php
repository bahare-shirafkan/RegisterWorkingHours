<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{

    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where(User::COL_EMAIL, $request['email'])->first();

            if (!isset($user) || !Hash::check($request['password'], $user->password)) {
                $error_validation = "email or password is wrong";
                return view('Auth.login', compact('error_validation'));
            } else {
                $token = $user->createToken('myToken')->plainTextToken;
                $data['data']['token'] = $token;
                $data['data']['user'] = $user;
                $cookie = cookie('jwt', $token, 60 * 24 * 30 * 120);
            }
            DB::commit();
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
