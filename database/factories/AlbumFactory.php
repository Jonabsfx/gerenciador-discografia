<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->title(),
            'year' => $this->faker->numberBetween(1900, 2100),
        ];
    }
}
