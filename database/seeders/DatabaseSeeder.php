<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
<<<<<<< HEAD
            SettingSeeder::class,
            SeoSeeder::class,
            TeamSeeder::class,
            RoundSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
=======
            UserSeeder::class,
            SettingSeeder::class,
            SeoSeeder::class,
            HomePageSeeder::class,
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        ]);
    }
}
