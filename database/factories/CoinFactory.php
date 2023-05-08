<?php

namespace Database\Factories;

use App\Models\Coin;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoinFactory extends Factory
{
    protected $model = Coin::class;

    public function definition(): array {
        return [
            'slug' => $this->faker->slug(),
            'symbol' => $this->faker->word(),
            'name' => $this->faker->name(),
        ];
    }
}
