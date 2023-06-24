<?php

namespace App\Http\Services;

use App\Jobs\SendTransactionToZoho;
use App\Models\Hour;
use App\Models\Job;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
use EasyJalali\JalaliDate;

class JobService
{
    public static function index($request)
    {
        $res = Job::get();
        return view('job.list',compact('res'));
    }

    public static function create($request)
    {
        DB::beginTransaction();
        try {
            $request['user_id']=1;
            Job::create($request);
            DB::commit();
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
