<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FormationSeeder::class,
            ChapitreSeeder::class,
            CategorieSeeder::class,
            TypeSeeder::class,
            FormationCategorieSeeder::class,
            FormationTypeSeeder::class,
            InscriptionDemandeSeeder::class
        ]);
    }
}
