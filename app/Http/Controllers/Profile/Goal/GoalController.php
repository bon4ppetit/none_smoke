<?php

namespace App\Http\Controllers\Profile\Goal;

use App\Http\Controllers\Controller;
use App\Services\GoalService;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public GoalService $service;

    public function __construct(GoalService $service)
    {
        $this->service = $service;
    }
}
