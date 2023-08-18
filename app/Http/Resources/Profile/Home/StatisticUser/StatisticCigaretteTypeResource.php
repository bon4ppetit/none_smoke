<?php

namespace App\Http\Resources\Profile\Home\StatisticUser;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticCigaretteTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'updated_at' => $this->updated_at,
        ];
    }
}
