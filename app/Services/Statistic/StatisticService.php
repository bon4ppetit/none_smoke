<?php

namespace App\Services\Statistic;

use App\Models\UserCigarette;
use App\Services\Profile\ProfileService;

class StatisticService
{
    /**
     *  Store the user's profile statistic
     * @param $data
     * @param string $type
     * @return false|UserCigarette
     */
    public function storeStatistic($data, string $type)
    {
        $data['user_id'] = auth()->user()->id;
        ProfileService::changeTypeSmoke($type);

        unset($data['type_smoke']);

        return UserCigarette::create($data);
    }
}