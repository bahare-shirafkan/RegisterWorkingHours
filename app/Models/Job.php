<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    const COL_ID = 'id';
    const COL_USER_ID = 'user_id';
    const COL_HOUR_SALARY = 'hour_salary';
    const COL_PHONE = 'phone';
    const COL_ADDRESS = 'address';
    const COL_TITLE = 'title';
    const COL_DESC = 'desc';
    const COL_START_TIME = 'start_time';
    const COL_END_TIME = 'end_time';
    const COL_CURRENCY = 'currency';
    const COL_IMG='img';

    protected $fillable = [
        self::COL_TITLE,
        self::COL_USER_ID,
        self::COL_HOUR_SALARY,
        self::COL_PHONE,
        self::COL_ADDRESS,
        self::COL_DESC,
        self::COL_CURRENCY,
        self::COL_IMG
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            self::COL_USER_ID,
            User::COL_ID
        );
    }
}
