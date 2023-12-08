<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Goal\GoalCreateRequest;
use App\Http\Requests\Goal\GoalDestroyRequest;
use App\Services\GoalService;

class GoalController extends Controller
{
    public GoalService $service;

    public function __construct(GoalService $service)
    {
        $this->service = $service;
    }

    public function add(GoalCreateRequest $request)
    {
        return $this->service->addGoal($request->validated());
    }

    public function destroy(GoalDestroyRequest $request)
    {
        return $this->service->destroyGoal($request->validated());
    }
}
