<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Diary
 *
 * @mixin Builder
*/
class DiaryWishVape extends Model
{
    use SoftDeletes;

    protected $table = 'diary_wish_vape';
    protected $guarded = false;

    protected $fillable = [
        'text',
        'wish_vape',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'date'
    ];


    /**
     * Return last record
     *
     * @return mixed
     */
    public static function getLastRecord(): mixed
    {
        return self::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')->first();
    }

    public static function getDiffCurrentDateAndLastRecordDate()
    {
        $lastRecordDate = self::getLastRecord()?->created_at;
        return $lastRecordDate === null ? null : abs(floor((time() - strtotime($lastRecordDate)) / (60 * 60 * 24)));
    }
}
