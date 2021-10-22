<?php

namespace Database\Factories;

use App\Models\Formation;
use App\Models\FormationType;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formation_id' => Formation::all()->random()->id,
            'type_id' => Type::all()->random()->id
        ];
    }
}
