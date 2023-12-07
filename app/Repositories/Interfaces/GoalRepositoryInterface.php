<?php

namespace App\Repositories\Interfaces;

interface GoalRepositoryInterface
{
    public static function getAllGoalsRepository();

    public static function getOneGoalRepository(int $idGoal);

}