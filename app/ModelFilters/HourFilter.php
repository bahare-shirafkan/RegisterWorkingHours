<?php

namespace App\ModelFilters;

use App\Models\Hour;
use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\DB;

class HourFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function user($user_id)
    {
        $this->where(Hour::COL_USER_ID, $user_id);
    }

    public function fromDate($from_date)
    {
        $this->where(DB::raw("DATE_FORMAT( date,'%Y-%m-%d')"), '>=', date('Y-m-d', strtotime($from_date)));
    }

    public function toDate($to_date)
    {
        $this->where(DB::raw("DATE_FORMAT( date,'%Y-%m-%d')"), '=<', date('Y-m-d', strtotime($to_date)));
    }
}
