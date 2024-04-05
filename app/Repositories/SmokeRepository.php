<?php

namespace App\Repositories;

use App\Models\UserCigarette;
use App\Repositories\Interfaces\SmokeRepositoryInterface;

class SmokeRepository implements SmokeRepositoryInterface
{
    public static function getDataSmokeDBRepository()
    {
        return UserCigarette::where('user_id', auth()->user()->id)->get();
    }
}
