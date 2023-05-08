<?php

namespace Database\Factories;

use App\Models\Coin;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatformFactory extends Factory
{
    protected $model = Platform::class;

    public function definition(): array {
        return [
            'coin_id' => Coin::factory(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'slug' => $this->faker->slug(),
        ];
    }
}
