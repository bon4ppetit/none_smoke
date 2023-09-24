<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statistic\StoreProfileRequest;
use App\Models\User;
use App\Services\Statistic\StatisticService;
use Illuminate\Http\JsonResponse;

class ProgressController extends Controller
{

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

        return response()->json($this->service->storeStatistic($request->validated(), $request->validated()['type_smoke']));
    }


    /**
     * Controller's Method: Return result Reset User's Progress
     *
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        return response()->json(User::resetProgress());
    }
}
