<?php

namespace Database\Factories;

use App\Models\Beer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName().' '.$this->faker->firstName(),
            'description' => $this->faker->realText(),
            'label_image' => '',
            'style' => $this->faker->word(),
            'abv' => $this->faker->randomFloat(1, 2, 15),
            'ibu' => $this->faker->numberBetween(1, 100),
            'date_created' => $this->faker->date(),
            'rating_count' => $this->faker->numberBetween(5, 99999),
            'rating_score' => $this->faker->randomFloat(1, 0.1, 4.9)
        ];
    }
}
