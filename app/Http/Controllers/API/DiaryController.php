<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\DiaryService;
use Inertia\Inertia;

class DiaryController extends Controller
{
    protected DiaryService $service;

    public function __construct(DiaryService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        return Inertia::render('Pages/DiaryLayout');
    }

    public function add()
    {

    }
}
