<?php

namespace App\Http\Controllers\Profile\Goal;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalRequest;
use Illuminate\Http\Request;

class AddGoalController extends GoalController
{
    public function __invoke(GoalRequest $data)
    {
        return $this->service->addGoal($data->validated());
    }

}
