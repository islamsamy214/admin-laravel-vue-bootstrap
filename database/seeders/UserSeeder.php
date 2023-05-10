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

<<<<<<< HEAD
        User::factory(30)->create();

=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        User::create([
            'name'=>'super admin',
            'email'=>'super_admin@app.com',
            'image' => $faker->imageUrl(300, 300, 'people', true, 'Faker'),
            'email_verified_at' => now(),
            'password'=>bcrypt('12345678'),
<<<<<<< HEAD
            'type'=>'admin',
        ]);
=======
        ]);
        User::factory(50)->create();
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    }
}
