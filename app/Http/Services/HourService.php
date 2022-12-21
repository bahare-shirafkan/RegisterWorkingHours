<?php

namespace App\Http\Services;

use App\ModelFilters\HourFilter;
use App\Models\Hour;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
                if (!empty($item['date']))
                    Hour::create([
                        Hour::COL_DATE => $item['date'],
                        Hour::COL_FROM_TIME => $item['from_time'],
                        Hour::COL_TO_TIME => $item['to_time'],
                        Hour::COL_VALUE => (intval($item['to_time']) - intval($item['from_time'])) * 70000,
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
