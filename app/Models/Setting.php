<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    use HasFactory;

    const COL_SALARY_HOUR = 'salary_hour';
    const COL_UNIT = 'unit';
    const COL_USER_ID = 'user_id';
    const COL_ID = 'id';

    protected $fillable = [
        self::COL_SALARY_HOUR,
        self::COL_UNIT,
        self::COL_USER_ID
    ];

    protected $casts = [
        self::COL_SALARY_HOUR => 'float'
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
