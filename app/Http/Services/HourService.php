<?php

namespace App\Http\Services;

use App\ModelFilters\HourFilter;
use App\Models\Hour;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HourService
{
    public static function index($request)
    {
        $res['data'] = Hour::filter($request, HourFilter::class)->get();
        $sum = 0;
        foreach ($res['data'] as $hour) {
            $sum += $hour['value'];
        }

        return response()->json([
            'data' => $res['data'],
            'sum' => $sum
        ]);
    }

    public static function create($request)
    {
        DB::beginTransaction();
        try {
            $user_id = 1;
            foreach ($request['items'] as $item) {
                $times_end = explode(':', $item['to_time']);
                $hour_end=$times_end[0];
                $min_end=$times_end[1];
                $end_time=Carbon::parse($item['date'])->addHours($hour_end)->addMinutes($min_end);
                $times_start = explode(':', $item['from_time']);
                $hour_start=$times_start[0];
                $min_start=$times_start[1];
                $start_time=Carbon::parse($item['date'])->addHours($hour_start)->addMinutes($min_start);
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
