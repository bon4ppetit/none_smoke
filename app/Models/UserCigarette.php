<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * A user who smokes regular cigarettes
 *
 * @mixin Builder
 */
class UserCigarette extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'user_type_cigarette';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @var string[]
     */
    protected $hidden = [
        'id',
        'user_id',
        'deleted_at',
    ];

    /**
     * Get the user's saving money during day not smoking - type cigarette
     * @return float|int
     */
    protected function getMoneySavingCigarette(): float|int
    {
        $dataUser = User::getDataSmokeDBUser()[0];

        return round(self::getCountCigaretteDontSmoke() / $dataUser->count_cigarettes_in_pack) * $dataUser->money_on_pack_cigarette;
    }

    /**
     * Get the user's spend money during day smoking - type cigarette
     * @return float|int
     */
    protected function getMoneySpendCigarette(): float|int
    {
        $dataUser = User::getDataSmokeDBUser()[0];
        $spendMoneyInMonth = (30 / ($dataUser->count_cigarettes_in_pack / $dataUser->count_smoke_cigarettes_a_day)) * $dataUser->money_on_pack_cigarette;

        return round($spendMoneyInMonth);
    }

    /**
     * Get the number of cigarettes that the user has not smoked during the non-smoking period
     * @return int
     */
    protected function getCountCigaretteDontSmoke(): int
    {
        $dataUser = User::getDataSmokeDBUser()[0];
        $countCigarette = User::getDayDontSmoke() * $dataUser->count_smoke_cigarettes_a_day;

        return round($countCigarette);
    }
}
