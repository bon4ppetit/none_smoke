<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     * Get the user's saving money for type cigarette
     * @return float|int
     */
    protected function getMoneySavingCigarette(): float|int
    {
        $dataUser = User::getDataSmokeDBUser();
        $spendMoneyInMonth = (30 / ($dataUser->count_cigarettes_in_pack / $dataUser->count_smoke_cigarettes_a_day)) * $dataUser->money_on_pack_cigarette;

        return round(($spendMoneyInMonth / 30) * User::getDayDontSmoke());
    }

    /**
     * Get the user's spend money for type cigarette
     * @return float|int
     */
    protected function getMoneySpendCigarette(): float|int
    {
        $dataUser = User::getDataSmokeDBUser();
        $spendMoneyInMonth = (30 / ($dataUser->count_cigarettes_in_pack / $dataUser->count_smoke_cigarettes_a_day)) * $dataUser->money_on_pack_cigarette;

        return round($spendMoneyInMonth);
    }
}
