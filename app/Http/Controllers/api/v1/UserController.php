<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Services\UserService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        try {
            return UserService::index($request->all());
        } catch (Exception $e) {
            throw $e("Something went wrong while getting data from database");
        }
    }

    public function create(Request $request)
    {
        try {
           return UserService::create($request->all());
        } catch (Exception $e) {
            throw $e("Error while creating resource in the database");
        }
    }
}
