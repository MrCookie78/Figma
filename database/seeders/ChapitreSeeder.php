<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Database\Seeder;

class ChapitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chapitre::factory()->count(30)->create();
    }
}
