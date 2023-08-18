<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserCigarette;
use App\Models\UserVape;
use App\Repositories\Interfaces\DataSmokeDBRepositoryInterface;

class DataSmokeDBRepository implements DataSmokeDBRepositoryInterface
{

    public static function getDataSmokeDBVapeTypeRepository(User $user)
    {
        return UserVape::where('user_id', $user->id)->get()[0];
    }

    public static function getDataSmokeDBCigaretteTypeRepository(User $user)
    {
        return UserCigarette::where('user_id', $user->id)->get()[0];
    }
}
