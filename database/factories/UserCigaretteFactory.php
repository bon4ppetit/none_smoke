<?php

namespace Database\Factories;

use App\Models\UserCigarette;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserCigaretteFactory extends Factory
{
    protected $model = UserCigarette::class;

    public function definition(): array
    {
        return [
            'how_long_smoke' => $this->faker->randomNumber(),
            'money_on_pack_cigarette' => $this->faker->randomNumber(),
            'count_cigarettes_in_pack' => $this->faker->randomNumber(),
            'count_smoke_cigarettes_a_day' => $this->faker->randomNumber(),
            'nicotine_in_cigarette' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
