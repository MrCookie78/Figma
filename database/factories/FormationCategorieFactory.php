<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Formation;
use App\Models\FormationCategorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationCategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationCategorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formation_id' => Formation::all()->random()->id,
            'categorie_id' => Categorie::all()->random()->id
        ];
    }
}
