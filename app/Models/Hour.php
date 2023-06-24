<?php

namespace App\Models;

use App\ModelFilters\HourFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;

class Hour extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    const COL_ID = 'id';
    const COL_JOB_ID='job_id';
    const COL_DATE = 'date';
    const COL_FROM_TIME = 'from_time';
    const COL_TO_TIME = 'to_time';
    const COL_DIFF_TIME = 'diff_time';
    const COL_CREATED_BY = 'created_by';

    protected $fillable = [
        self::COL_JOB_ID,
        self::COL_DATE,
        self::COL_DATE,
        self::COL_FROM_TIME,
        self::COL_TO_TIME,
        self::COL_DIFF_TIME
    ];

    protected $casts = [
        self::COL_DATE => 'date',
    ];

    public function modelFilter()
    {
        return $this->provideFilter(HourFilter::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(
            Job::class,
            self::COL_JOB_ID,
            Job::COL_ID
        );
    }
}
