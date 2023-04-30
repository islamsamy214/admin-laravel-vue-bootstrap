<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Factory::create();

        User::factory(18)->create();

        User::create([
            'name'=>'super admin',
            'email'=>'super_admin@app.com',
            'image' => $faker->imageUrl(300, 300, 'people', true, 'Faker'),
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
            'type'=>'admin',
        ]);
    }
}
