<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->name(),
            'description' => $this->faker->sentence(100),
            'image' => "3AvWdINXG9aOIyRF5J4KBw67Xo7OsrQuZBD9O7xe.jpg", //$this->faker->imageUrl(640, 480, null, true, null, false),
            'prix' => $this->faker->randomDigit(),
            'user_id' => 1
        ];
    }
}
