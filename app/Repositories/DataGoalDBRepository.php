<?php

namespace App\Repositories;

use App\Models\Goal;
use App\Repositories\Interfaces\DataGoalDBRepositoryInterface;

class DataGoalDBRepository implements DataGoalDBRepositoryInterface
{
    public static function getUserAllGoalsDBRepository()
    {
        return Goal::where('user_id', auth()->user()->id)->get();
    }

    public static function getOneGoalDBRepository(int $idGoal)
    {
        return Goal::find($idGoal);
    }
}