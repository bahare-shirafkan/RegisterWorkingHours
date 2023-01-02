<?php

namespace App\Http\Controllers;

use App\Http\Services\SettingService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class SettingController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        try {
            return SettingService::index($request->all());
        } catch (Exception $e) {
            throw $e("Something went wrong while getting data from database");
        }
    }

    public function create(Request $request)
    {
        // try {
            return SettingService::create($request->all());
        // } catch (Exception $e) {
        //     throw $e("Error while creating resource in the database");
        // }
    }
}
