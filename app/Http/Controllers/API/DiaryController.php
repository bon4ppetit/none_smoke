<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiaryRequest;
use App\Models\Diary;
use App\Repositories\DiaryRepository;
use App\Services\DiaryService;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

/**
 *  Controller of diary content
 */
class DiaryController extends Controller
{
    protected DiaryService $service;

    public function __construct(DiaryService $service)
    {
        $this->service = $service;
    }

    /**
     * Adding new mask for user
     *
     * @param DiaryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(DiaryRequest $request)
    {
        $result = $this->service->addDiary($request->validated());

        return response()->json($result);
    }

    /**
     * Get all masks, for one user
     *
     * @return Collection
     */
    public static function getMasks()
    {
        return DiaryRepository::getAllUserMasks();
    }
}
