<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * User then smoke vape
 *
 * @mixin Builder
 */
class UserVape extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'user_type_vape';

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
     * Get the user's saving money for type vape
     * @return float
     */
    protected function getMoneySavingVape(): float
    {
        $dataUser = User::getDataSmokeDBUser();
        $spendMoneyInMonth = ($dataUser->count_jar_a_month * $dataUser->price_jar) + ($dataUser->price_vape_vaporizer * $dataUser->count_vape_vaporizer_a_month);

        return round(($spendMoneyInMonth / 30) * User::getDayDontSmoke());
    }

    /**
     * Get the user's spend money for type vape
     * @return float|int
     */
    protected function getMoneySpendVape(): float|int
    {
        $dataUser = User::getDataSmokeDBUser();
        $spendMoneyInMonth = ($dataUser->count_jar_a_month * $dataUser->price_jar) + ($dataUser->price_vape_vaporizer * $dataUser->count_vape_vaporizer_a_month);

        return round($spendMoneyInMonth);
    }
}
