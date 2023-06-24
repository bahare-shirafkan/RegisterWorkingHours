<?php

namespace App\Http\Controllers;

use App\Http\Services\HourService;
use App\Http\Services\JobService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class JobController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        try {
            return JobService::index($request->all());
        } catch (Exception $e) {
            throw $e("Something went wrong while getting data from database");
        }
    }

    public function form(Request $request)
    {
        return view('job.form');
    }

    public function create(Request $request)
    {
        // try {
            return JobService::create($request->all());
        // } catch (Exception $e) {
        //     throw $e("Error while creating resource in the database");
        // }
    }
}
