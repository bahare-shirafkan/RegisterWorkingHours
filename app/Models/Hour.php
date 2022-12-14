<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hour extends Model
{
    use HasFactory, SoftDeletes;

    const COL_ID = 'id';
    const COL_USER_ID = 'user_id';
    const COL_DATE = 'date';
    const COL_FROM_TIME = 'from_time';
    const COL_TO_TIME = 'to_time';
    const COL_CREATED_BY = 'created_by';

    protected $fillable = [
        self::COL_USER_ID,
        self::COL_DATE,
        self::COL_DATE,
        self::COL_FROM_TIME,
        self::COL_TO_TIME,
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