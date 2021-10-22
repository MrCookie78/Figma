<?php

namespace Database\Seeders;

use App\Models\FormationCategorie;
use Illuminate\Database\Seeder;

class FormationCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormationCategorie::factory()->count(12)->create();
    }
}
