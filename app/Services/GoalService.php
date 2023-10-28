<?php

namespace App\Services;

use App\Models\Goal;

class GoalService
{
    public function addGoal($data)
    {
        $data['user_id'] = auth()->user()->id;

        return Goal::create($data);
    }
}