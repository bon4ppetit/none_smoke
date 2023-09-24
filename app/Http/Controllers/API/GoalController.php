<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalRequest;
use App\Services\GoalService;

class GoalController extends Controller
{
    public GoalService $service;

    public function __construct(GoalService $service)
    {
        $this->service = $service;
    }

    public function add(GoalRequest $request)
    {
        return $this->service->addGoal($request->validated());
    }
}
