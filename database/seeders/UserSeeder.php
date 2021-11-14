<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'image' => "https://via.placeholder.com/640x480.png/00dd22?text=amet",
            'isAdmin' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$oySJ3gI.OoCvwRig5TwMYeP0NVYJnP.0ZO0RAHUIUiHUbOdoxXZiK', // admin
            'remember_token' => Str::random(10)
        ]);

        User::factory()->count(9)->create();
    }
}
