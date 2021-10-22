<?php

namespace Database\Factories;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapitreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapitre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3),
            'contenu' => $this->faker->randomHtml(2,3),
            'duree' => $this->faker->time('H:i:s'),
            'formation_id' => Formation::all()->random()->id
        ];
    }
}
