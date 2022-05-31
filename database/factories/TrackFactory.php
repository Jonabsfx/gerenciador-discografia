<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Track;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    protected $model = Track::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->title(),
            'duration' => $this->faker->numberBetween(30, 360),
            'feat' => $this->faker->name(),
        ];
    }
}
