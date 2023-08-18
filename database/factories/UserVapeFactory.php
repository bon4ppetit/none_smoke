<?php

namespace Database\Factories;

use App\Models\UserVape;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserVapeFactory extends Factory
{
    protected $model = UserVape::class;

    public function definition(): array
    {
        return [
            'how_long_smoke' => $this->faker->randomNumber(),
            'price_jar' => $this->faker->randomNumber(),
            'count_jar_a_month' => $this->faker->randomNumber(),
            'price_vape_vaporizer' => $this->faker->randomNumber(),
            'count_vape_vaporizer_a_month' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
