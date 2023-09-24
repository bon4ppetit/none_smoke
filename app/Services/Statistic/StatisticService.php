<?php

namespace App\Services\Statistic;

use App\Models\UserCigarette;
use App\Models\UserVape;
use App\Services\Profile\ProfileService;

class StatisticService
{
    /**
     *  Store the user's profile statistic
     * @param $data
     * @param string $type
     * @return false|UserCigarette|UserVape
     */
    public function storeStatistic($data, string $type)
    {
        $data['user_id'] = auth()->user()->id;
        ProfileService::changeTypeSmoke($type);

        unset($data['type_smoke']);

        if ($type === 'cigarette') return UserCigarette::create($data);
        elseif ($type === 'vape') return UserVape::create($data);
        else return false;
    }
}