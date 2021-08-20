<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $socials = [
            'facebook',
            'instagram',
            'Youtube',
            'Twitter',
            'LinkedIn'
        ];

        return [
            'key' => $this->faker->randomElement($socials),
            'value' => $this->faker->url()
        ];
    }
}
