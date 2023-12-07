<?php

namespace App\Repositories;

use App\Models\Goal;
use App\Repositories\Interfaces\GoalRepositoryInterface;

class GoalRepository implements GoalRepositoryInterface
{
    public static function getAllGoalsRepository()
    {
        return Goal::where('user_id', auth()->user()->id)->get();
    }

    public static function getOneGoalRepository(int $idGoal)
    {
        return Goal::find($idGoal);
    }
}