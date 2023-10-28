<?php

namespace App\Repositories\Interfaces;

interface DataGoalDBRepositoryInterface
{
    public static function getUserAllGoalsDBRepository();

    public static function getOneGoalDBRepository(int $idGoal);

}