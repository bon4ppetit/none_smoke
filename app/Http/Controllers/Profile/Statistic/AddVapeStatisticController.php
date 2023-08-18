<?php

namespace App\Http\Controllers\Profile\Statistic;

use App\Http\Controllers\ProfileController;
use App\Http\Requests\Profile\VapeStructureRequest;

class AddVapeStatisticController extends ProfileController
{
    public function __invoke(VapeStructureRequest $request)
    {
        return $this->service->storeStatistic($request->validated(), 'vape');
    }
}
