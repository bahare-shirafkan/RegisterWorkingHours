<?php

namespace App\Http\Controllers;

use App\Http\Services\HourService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HourController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        // try {
            return HourService::index($request->all());
        // } catch (Exception $e) {
        //     throw $e("Something went wrong while getting data from database");
        // }
    }

    public function form(){
        $job_id=request()->route('job_id');
        return view('hour.form',compact('job_id'));
    }

    public function create(Request $request)
    {
        // try {
            return HourService::create($request->all());
        // } catch (Exception $e) {
        //     throw $e("Error while creating resource in the database");
        // }
    }
}
