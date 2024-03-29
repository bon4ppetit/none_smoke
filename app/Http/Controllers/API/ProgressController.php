<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statistic\StoreProfileRequest;
use App\Models\User;
use App\Services\DiaryService;
use App\Services\Statistic\StatisticService;
use Illuminate\Http\JsonResponse;

/**
 * Work with user's progress
 */
class ProgressController extends Controller
{

    /**
     * @var StatisticService
     */
    public StatisticService $service;
    public function __construct(StatisticService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSmokeProgress(StoreProfileRequest $request)
    {
        $response = [
            'status' => 'error',
            'message' => 'Данные невалидны!'
        ];

        if ($request->validated())
            $response = [
                'status' => 'error',
                'message' => 'Ошибка при записи статистики'
            ];

            if ($this->service->storeStatistic($request->validated(), $request->validated()['type_smoke']))
                $response = [
                    'status' => 'success',
                    'message' => 'Статистика добавлена успешно!'
                ];

        return response()->json($response);
    }


    /**
     * Controller's Method: Return result Reset User's Progress
     *
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        $diary = new DiaryService();
        $diary->addDiary([
            'wish_vape' => 1,
            'text' => 'Вы закурили и не сдержались'
        ]);

        return response()->json(User::resetProgress());
    }
}
