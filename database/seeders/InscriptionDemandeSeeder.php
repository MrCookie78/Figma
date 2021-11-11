<?php

namespace Database\Seeders;

use App\Models\InscriptionDemande;
use Illuminate\Database\Seeder;

class InscriptionDemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InscriptionDemande::factory()->count(3)->create();
    }
}
