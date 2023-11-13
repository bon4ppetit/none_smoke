<?php

namespace App\Repositories;

use App\Models\UserCigarette;
use App\Models\UserVape;
use App\Repositories\Interfaces\SmokeRepositoryInterface;

class SmokeRepository implements SmokeRepositoryInterface
{

    public static function getDataSmokeDBVapeTypeRepository()
    {
        return UserVape::where('user_id', auth()->user()->id)->get()[0];
    }

    public static function getDataSmokeDBCigaretteTypeRepository()
    {
        return UserCigarette::where('user_id', auth()->user()->id)->get()[0];
    }
}
