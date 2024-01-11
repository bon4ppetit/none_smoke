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
class Diary extends Model
{
    use SoftDeletes;

    protected $table = 'diary';
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
        $record = self::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')->first();

        return $record;
    }

    public static function getDiffCurrentDateAndLastRecordDate(): ?int
    {
        $lastRecordDate = self::getLastRecord()?->created_at;

        if ($lastRecordDate !== null) {
            $now = time();
            $your_date = strtotime($lastRecordDate);
            $datediff = $now - $your_date;

            return floor($datediff / (60 * 60 * 24));
        }

        return null;
    }
}
