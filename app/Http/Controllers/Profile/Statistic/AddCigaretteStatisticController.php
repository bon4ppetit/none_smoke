<?php

namespace App\Http\Controllers\Profile\Statistic;

use App\Http\Controllers\ProfileController;
use App\Http\Requests\Profile\CigaretteStructureRequest;

class AddCigaretteStatisticController extends ProfileController
{
    public function __invoke(CigaretteStructureRequest $request)
    {
        return $this->service->storeStatistic($request->validated(), 'cigarette');
    }
}
