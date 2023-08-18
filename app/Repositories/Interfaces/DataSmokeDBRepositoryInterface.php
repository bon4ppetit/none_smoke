<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface DataSmokeDBRepositoryInterface
{
    public static function getDataSmokeDBVapeTypeRepository(User $user);

    public static function getDataSmokeDBCigaretteTypeRepository(User $user);
}
