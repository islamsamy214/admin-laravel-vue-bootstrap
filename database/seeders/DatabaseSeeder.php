<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        User::factory(30)->create();

        User::create([
            'name' => 'super admin',
            'email' => 'super_admin@app.com',
            'image' => $faker->imageUrl(300, 300, 'people', true, 'Faker'),
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role' => 'super_admin',
        ]);
    }
}
