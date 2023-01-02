<?php

namespace App\Http\Services;

use App\ModelFilters\HourFilter;
use App\Models\Hour;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HourService
{
    public static function index($request)
    {
        $user_id = Auth::user()->id ?? 1;
        $setting = Setting::where(Setting::COL_USER_ID, $user_id)->first();
        $sum = 0;
        $res= null;
        if (isset($setting) && !empty($setting)) {
            $res= Hour::where(Hour::COL_USER_ID, $user_id)->get();
            foreach ($res as $item) {
                $sum += $item['diff_time'] * 70000;
            }
        } else {
            // TODO:i do its after
            $message= null;
        }

        return view('list', compact('res', 'sum','message'));
    }

    public static function create($request)
    {
        DB::beginTransaction();
        try {
            $user_id = 1;
            foreach ($request['items'] as $item) {
                $times_end = explode(':', $item['to_time']);
                $hour_end = $times_end[0];
                $min_end = $times_end[1];
                $end_time = Carbon::parse($item['date'])->addHours($hour_end)->addMinutes($min_end);
                $times_start = explode(':', $item['from_time']);
                $hour_start = $times_start[0];
                $min_start = $times_start[1];
                $start_time = Carbon::parse($item['date'])->addHours($hour_start)->addMinutes($min_start);
                $dif_time = Carbon::parse($end_time)->diffInMinutes(Carbon::parse($start_time));
                if (!empty($item['date']))
                    Hour::create([
                        Hour::COL_DATE => $item['date'],
                        Hour::COL_FROM_TIME => $item['from_time'],
                        Hour::COL_TO_TIME => $item['to_time'],
                        Hour::COL_DIFF_TIME => $dif_time,
                        Hour::COL_USER_ID => $user_id,
                    ]);
            }
            DB::commit();
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
