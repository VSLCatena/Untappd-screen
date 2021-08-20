<?php

namespace Database\Factories;

use App\Models\Brewery;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreweryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brewery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->realText(),
            'type' => $this->faker->word(),
            'label_image' => $this->faker->imageUrl(),
            'beer_count' => $this->faker->numberBetween(5, 150),
            'location_country' => $this->faker->country(),
            'location_address' => $this->faker->streetAddress(),
            'location_city' => $this->faker->city(),
            'location_state' => $this->faker->boolean() ? $this->faker->city() : '',
            'location_latitude' => $this->faker->latitude(),
            'location_longitude' => $this->faker->longitude(),
            'rating_count' => $this->faker->numberBetween(5, 9999),
            'rating_score' => $this->faker->randomFloat(1, 0.1, 4.9)
        ];
    }
}

